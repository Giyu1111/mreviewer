<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptAnswer;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class QuizController extends Controller
{


    /**
     * Start a student attempt using the instructor-authored lesson quiz.
     */
    public function start(
        Request $request,
        string $slug,
        int $lessonNumber
    ): RedirectResponse {
        abort_unless($request->user()->isStudent(), 403);

        $subject = Subject::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $lesson = $subject->lessons()
            ->where('lesson_number', $lessonNumber)
            ->where('is_published', true)
            ->firstOrFail();

        // Resume the latest unfinished attempt for this student and lesson.
        $existingAttempt = QuizAttempt::query()
            ->where('user_id', $request->user()->id)
            ->where('lesson_id', $lesson->id)
            ->whereNull('completed_at')
            ->latest('started_at')
            ->first();

        if ($existingAttempt) {
            return redirect()->route('quiz.take', $existingAttempt);
        }
        $questions = $lesson->questions()
            ->where('is_active', true)
            ->with('options')
            ->inRandomOrder()
            ->get();

        if ($questions->isEmpty()) {
            return back()->withErrors([
                'quiz' => 'This reviewer is not available until your instructor has added questions.',
            ]);
        }

        $attempt = DB::transaction(function () use ($request, $lesson, $questions) {
            $attempt = QuizAttempt::create([
                'user_id' => $request->user()->id,
                'lesson_id' => $lesson->id,
                'score' => 0,
                'total_questions' => $questions->count(),
                'started_at' => now(),
            ]);

            foreach ($questions->values() as $index => $question) {
                $optionIds = $question->options->pluck('id')->all();
                shuffle($optionIds);

                QuizAttemptAnswer::create([
                    'quiz_attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                    'selected_option_id' => null,
                    'option_order' => $optionIds,
                    'question_order' => $index + 1,
                    'is_correct' => null,
                    'answered_at' => null,
                ]);
            }

            return $attempt;
        });

        return redirect()->route('quiz.take', $attempt);
    }

    /**
     * Display an active quiz or its results.
     */

/**
 * Display the logged-in student's reviewer history.
 */
public function history(Request $request): View
{
    abort_unless($request->user()->isStudent(), 403);

    $attempts = QuizAttempt::query()
        ->where('user_id', $request->user()->id)
        ->with('lesson.subject')
        ->latest('created_at')
        ->get();

    return view('quiz.history', compact('attempts'));
}

/**
 * Display one question at a time with immediate feedback.
 */
public function show(
    Request $request,
    QuizAttempt $attempt
): View|RedirectResponse {
    abort_unless($request->user()->isStudent(), 403);

    abort_unless(
        (int) $attempt->user_id === (int) $request->user()->id,
        403
    );

    // Display the final result after all questions are answered.
    if ($attempt->completed_at !== null) {
        $answers = $attempt->answers()
            ->with(['question.options', 'selectedOption'])
            ->orderBy('question_order')
            ->get();

        return view('quiz.result', compact(
            'attempt',
            'answers'
        ));
    }

    // When returning from Submit Answer, show that answered question
    // so the student can see the feedback before moving forward.
    $answeredId = $request->query('answered');

    if ($answeredId !== null) {
        $answer = $attempt->answers()
            ->whereKey((int) $answeredId)
            ->whereNotNull('answered_at')
            ->with(['question.options', 'selectedOption'])
            ->firstOrFail();
    } else {
        // Otherwise, display the next unanswered question.
        $answer = $attempt->answers()
            ->whereNull('answered_at')
            ->with('question.options')
            ->orderBy('question_order')
            ->first();
    }

    // All questions have been answered.
    if (!$answer) {
        $attempt->update([
            'completed_at' => now(),
        ]);

        return redirect()->route('quiz.take', $attempt);
    }

    // Restore the randomized choice order for this attempt.
    $optionMap = $answer->question->options->keyBy('id');

    $displayOptions = collect($answer->option_order ?? [])
        ->map(fn ($id) => $optionMap->get((int) $id))
        ->filter()
        ->values();

    $answer->setRelation('displayOptions', $displayOptions);

    $answeredCount = $attempt->answers()
        ->whereNotNull('answered_at')
        ->count();

    $totalQuestions = $attempt->total_questions;

    return view('quiz.take', compact(
        'attempt',
        'answer',
        'answeredCount',
        'totalQuestions'
    ));
}


/**
 * Submit and immediately check one student's answer.
 */
public function submitAnswer(
    Request $request,
    QuizAttempt $attempt
): RedirectResponse {
    abort_unless($request->user()->isStudent(), 403);

    abort_unless(
        (int) $attempt->user_id === (int) $request->user()->id,
        403
    );

    if ($attempt->completed_at !== null) {
        return redirect()->route('quiz.take', $attempt);
    }

    $validated = $request->validate([
        'question_id' => ['required', 'integer'],
        'selected_option_id' => ['required', 'integer'],
    ]);

    $answer = DB::transaction(function () use (
        $attempt,
        $validated
    ) {
        $lockedAttempt = QuizAttempt::query()
            ->lockForUpdate()
            ->findOrFail($attempt->id);

        if ($lockedAttempt->completed_at !== null) {
            abort(403, 'This reviewer has already been completed.');
        }

        $answer = $lockedAttempt->answers()
            ->where('question_id', $validated['question_id'])
            ->lockForUpdate()
            ->firstOrFail();

        // Do not allow an answer to be submitted twice.
        if ($answer->answered_at !== null) {
            return $answer;
        }

        // Verify that the selected choice belongs to this question.
        $selectedOption = QuestionOption::query()
            ->where('id', $validated['selected_option_id'])
            ->where('question_id', $answer->question_id)
            ->firstOrFail();

        $isCorrect = (bool) $selectedOption->is_correct;

        $answer->update([
            'selected_option_id' => $selectedOption->id,
            'is_correct' => $isCorrect,
            'answered_at' => now(),
        ]);

        if ($isCorrect) {
            $lockedAttempt->increment('score');
        }

        return $answer;
    });

    return redirect()->route('quiz.take', [
        'attempt' => $attempt->id,
        'answered' => $answer->id,
    ]);
}



}
