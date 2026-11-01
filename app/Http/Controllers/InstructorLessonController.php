<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Subject;
use App\Models\User;
use App\Notifications\StudentUpdateNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InstructorLessonController extends Controller
{
    private function authorizeInstructor(Subject $subject): void
    {
        $user = auth()->user();

        abort_unless($user && $user->isInstructor(), 403);

        abort_unless(
            (int) $subject->instructor_id === (int) $user->id,
            403
        );
    }

    public function open(Lesson $lesson): StreamedResponse
    {
        $user = auth()->user();

        abort_unless($user, 403);

        $lesson->loadMissing('subject');

        // Instructors may open files only for their assigned subject.
        if ($user->isInstructor()) {
            $this->authorizeInstructor($lesson->subject);
        } elseif ($user->isStudent()) {
            // Students can open published lessons only.
            abort_unless($lesson->is_published, 404);
        } else {
            abort(403);
        }

        // Use the configured default disk: local in Laragon,
        // Laravel Cloud Object Storage when attached as default.
        $disk = Storage::disk();

        abort_unless(
            $lesson->material_path
            && $disk->exists($lesson->material_path),
            404
        );

        $filename = basename(
            $lesson->material_original_name ?: 'lesson-material'
        );

        return $disk->response(
            $lesson->material_path,
            $filename,
            [
                'Content-Type' => $lesson->material_mime_type
                    ?: 'application/octet-stream',
                'X-Content-Type-Options' => 'nosniff',
            ],
            'inline'
        );
    }

    public function index(Subject $subject): View
    {
        $this->authorizeInstructor($subject);

        $lessons = $subject->lessons()
            ->orderBy('lesson_number')
            ->get()
            ->keyBy('lesson_number');

        $nextLessonNumber = ((int) $lessons->keys()->max()) + 1;

        if (request()->boolean('add')) {
            $lessons->put(
                $nextLessonNumber,
                new Lesson([
                    'subject_id' => $subject->id,
                    'lesson_number' => $nextLessonNumber,
                ])
            );
        }

        return view('instructor.lessons.index', [
            'subject' => $subject,
            'lessons' => $lessons,
            'nextLessonNumber' => $nextLessonNumber,
        ]);
    }

    public function store(
        Request $request,
        Subject $subject,
        int $lessonNumber
    ): RedirectResponse {
        $this->authorizeInstructor($subject);

        abort_unless($lessonNumber >= 1, 404);

$lessonExists = $subject->lessons()
    ->where('lesson_number', $lessonNumber)
    ->exists();

if (! $lessonExists) {
    $nextLessonNumber = ((int) $subject->lessons()->max('lesson_number')) + 1;

    abort_unless($lessonNumber === $nextLessonNumber, 404);
}

        $data = $request->validateWithBag(
            'lesson_'.$lessonNumber,
            [
                'title' => ['required', 'string', 'max:255'],
                'content' => ['nullable', 'string', 'max:100000'],
                'material' => [
                    'nullable',
                    'file',
                    'mimes:pdf,doc,docx,ppt,pptx',
                    'max:20480',
                ],
                'is_published' => ['nullable', 'boolean'],
            ]
        );

        $lesson = $subject->lessons()->firstOrNew([
            'lesson_number' => $lessonNumber,
        ]);

        $wasPublished = $lesson->exists && (bool) $lesson->is_published;
        $oldMaterialPath = $lesson->material_path;
        $newMaterialPath = null;

        $lesson->title = $data['title'];
        $lesson->content = $data['content'] ?? null;
        $lesson->is_published = $request->boolean('is_published');

        if ($request->hasFile('material')) {
            $file = $request->file('material');

            $newMaterialPath = $file->store(
                "lesson-materials/{$subject->id}"
            );

            if (! $newMaterialPath) {
                return back()
                    ->withErrors([
                        'material' => 'The file could not be saved. Please try again.',
                    ], 'lesson_'.$lessonNumber)
                    ->withInput();
            }

            $lesson->material_path = $newMaterialPath;

            $lesson->material_original_name = mb_substr(
                $file->getClientOriginalName(),
                0,
                255
            );

            $lesson->material_mime_type = $file->getMimeType()
                ?: 'application/octet-stream';

            $lesson->material_size = $file->getSize();
        }

        $lesson->save();
// Notify active students when a lesson is published for the first time.
        if ($lesson->is_published && !$wasPublished && $subject->is_active) {
            $studentNotification = new StudentUpdateNotification(
                'new_lesson',
                'New Lesson Available',
                "{$subject->code}: {$lesson->title} is now available for reviewing.",
                route('subjects.lessons.show', [
                    'slug' => $subject->slug,
                    'lessonNumber' => $lesson->lesson_number,
                ]),
                (int) $subject->id,
                (int) $lesson->id
            );

            User::query()
                ->where('role', 'student')
                ->where('is_active', true)
                ->chunkById(100, function ($students) use ($studentNotification) {
                    Notification::send($students, $studentNotification);
                });
        }

        // Delete the previous file only after the new file and lesson are saved.
        if (
            $oldMaterialPath
            && $newMaterialPath
            && $oldMaterialPath !== $newMaterialPath
        ) {
            Storage::delete($oldMaterialPath);
        }

        return redirect()
            ->route('instructor.subjects.lessons.index', [
                'subject' => $subject->id,
            ])
            ->with('success', "Lesson {$lessonNumber} saved successfully.");
    }

    public function download(Lesson $lesson): StreamedResponse
    {
        $user = auth()->user();

        abort_unless($user, 403);

        $lesson->loadMissing('subject');

        if ($user->isInstructor()) {
            $this->authorizeInstructor($lesson->subject);
        } elseif ($user->isStudent()) {
            abort_unless($lesson->is_published, 403);
        } else {
            abort(403);
        }

        $disk = Storage::disk();

        abort_unless(
            $lesson->material_path
            && $disk->exists($lesson->material_path),
            404
        );

        return $disk->download(
            $lesson->material_path,
            $lesson->material_original_name ?: 'lesson-material',
            [
                'Content-Type' => $lesson->material_mime_type
                    ?: 'application/octet-stream',
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }
}
