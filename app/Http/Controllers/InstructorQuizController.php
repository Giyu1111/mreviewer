<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\User;
use App\Notifications\StudentUpdateNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\QuizAttemptAnswer;

class InstructorQuizController extends Controller
{
    private function authorizeInstructor(Lesson $lesson): void
    {
        $user = auth()->user();

        abort_unless($user && $user->isInstructor(), 403);

        abort_unless(
            (int) $lesson->subject->instructor_id === (int) $user->id,
            403
        );
    }

    public function index(Lesson $lesson): View
    {
        $lesson->load('subject');
        $this->authorizeInstructor($lesson);

        $questions = $lesson->questions()
            ->where('is_active', true)
            ->with('options')
            ->latest()
            ->get();

        return view('instructor.quizzes.index', compact('lesson', 'questions'));
    }

    public function store(Request $request, Lesson $lesson): RedirectResponse
    {
        $lesson->load('subject');
        $this->authorizeInstructor($lesson);

        $data = $request->validate([
            'question_text' => ['required', 'string', 'max:5000'],
            'explanation' => ['nullable', 'string', 'max:5000'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'options' => ['required', 'array', 'size:4'],
            'options.*.text' => ['required', 'string', 'max:1000'],
            'correct_option' => ['required', 'integer', 'min:0', 'max:3'],
        ]);

        $hadActiveQuestions = $lesson->questions()
            ->where('is_active', true)
            ->exists();

        DB::transaction(function () use ($data, $lesson): void {
            $lockedLesson = Lesson::query()
                ->lockForUpdate()
                ->findOrFail($lesson->id);

            $question = $lockedLesson->questions()->create([
                'subject_id' => $lockedLesson->subject_id,
                'question_text' => $data['question_text'],
                'explanation' => $data['explanation'] ?? null,
                'difficulty' => $data['difficulty'],
                'is_active' => true,
            ]);

            foreach ($data['options'] as $index => $option) {
                $question->options()->create([
                    'option_text' => $option['text'],
                    'is_correct' => $index === (int) $data['correct_option'],
                    'sort_order' => $index + 1,
                ]);
            }
        });

        // Notify students when the first active quiz becomes available.
        if (!$hadActiveQuestions && $lesson->is_published && $lesson->subject->is_active) {
            $studentNotification = new StudentUpdateNotification(
                'new_quiz',
                'New Quiz Available',
                "{$lesson->subject->code}: A reviewer quiz is now available for {$lesson->title}.",
                route('subjects.lessons.show', [
                    'slug' => $lesson->subject->slug,
                    'lessonNumber' => $lesson->lesson_number,
                ]),
                (int) $lesson->subject_id,
                (int) $lesson->id
            );

            User::query()
                ->where('role', 'student')
                ->where('is_active', true)
                ->chunkById(100, function ($students) use ($studentNotification) {
                    Notification::send($students, $studentNotification);
                });
        }

        return back()->with('success', 'Quiz question saved successfully.');
    }

public function update(
    Request $request,
    Lesson $lesson,
    Question $question
): RedirectResponse {
    $lesson->load('subject');
    $this->authorizeInstructor($lesson);

    abort_unless(
        (int) $question->lesson_id === (int) $lesson->id,
        404
    );

    $data = $request->validate([
        'question_text' => ['required', 'string', 'max:5000'],
        'explanation' => ['nullable', 'string', 'max:5000'],
        'difficulty' => ['required', 'in:easy,medium,hard'],
        'options' => ['required', 'array', 'size:4'],
        'options.*.text' => ['required', 'string', 'max:1000'],
        'correct_option' => ['required', 'integer', 'min:0', 'max:3'],
    ]);

    $createdNewVersion = DB::transaction(function () use (
        $data,
        $lesson,
        $question
    ): bool {
        $lockedQuestion = Question::query()
            ->lockForUpdate()
            ->findOrFail($question->id);

        // Any existing attempt-answer row means the original
        // question must remain unchanged, even if unanswered.
        $hasStudentRecords = QuizAttemptAnswer::query()
            ->where('question_id', $lockedQuestion->id)
            ->exists();

        if ($hasStudentRecords) {
            // Archive the original version.
            $lockedQuestion->update([
                'is_active' => false,
            ]);

            // Create the updated version for future quizzes.
            $targetQuestion = $lesson->questions()->create([
                'subject_id' => $lockedQuestion->subject_id,
                'question_text' => $data['question_text'],
                'explanation' => $data['explanation'] ?? null,
                'difficulty' => $data['difficulty'],
                'is_active' => true,
            ]);
        } else {
            // Update in place when no student attempt uses it.
            $lockedQuestion->update([
                'question_text' => $data['question_text'],
                'explanation' => $data['explanation'] ?? null,
                'difficulty' => $data['difficulty'],
            ]);

            $lockedQuestion->options()->delete();

            $targetQuestion = $lockedQuestion;
        }

        foreach ($data['options'] as $index => $option) {
            $targetQuestion->options()->create([
                'option_text' => $option['text'],
                'is_correct' => $index === (int) $data['correct_option'],
                'sort_order' => $index + 1,
            ]);
        }

        return $hasStudentRecords;
    });

    return back()->with(
        'success',
        $createdNewVersion
            ? 'Updated question saved for future quizzes. Previous student attempts remain unchanged.'
            : 'Question updated successfully.'
    );
}

public function destroy(
    Lesson $lesson,
    Question $question
): RedirectResponse {
    $lesson->load('subject');
    $this->authorizeInstructor($lesson);

    abort_unless(
        (int) $question->lesson_id === (int) $lesson->id,
        404
    );

    $archived = DB::transaction(function () use ($question): bool {
        $lockedQuestion = Question::query()
            ->lockForUpdate()
            ->findOrFail($question->id);

        $hasStudentRecords = QuizAttemptAnswer::query()
            ->where('question_id', $lockedQuestion->id)
            ->exists();

        if ($hasStudentRecords) {
            // Preserve all historical answers and options.
            $lockedQuestion->update([
                'is_active' => false,
            ]);
        } else {
            // Permanent deletion is safe when no attempt references it.
            $lockedQuestion->delete();
        }

        return $hasStudentRecords;
    });

    return back()->with(
        'success',
        $archived
            ? 'Question archived. Previous student answers and scores were preserved.'
            : 'Question deleted successfully.'
    );
}
}
