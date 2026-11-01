<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InstructorReviewController extends Controller
{
    public function students(Request $request): JsonResponse
    {
        $instructor = $request->user();

        abort_unless($instructor && $instructor->isInstructor(), 403);

        $attempts = QuizAttempt::query()
            ->whereHas('student', function ($query) {
                $query->where('role', 'student');
            })
            ->whereHas('lesson.subject', function ($query) use ($instructor) {
                $query->where('instructor_id', $instructor->id);
            })
            ->with([
                'student:id,name,email',
                'lesson:id,subject_id,lesson_number,title',
                'lesson.subject:id,name,code',
            ])
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->get();

        $students = $attempts
            ->groupBy('user_id')
            ->map(function ($studentAttempts) {
                $latest = $studentAttempts->first();

                $latestCompleted = $studentAttempts->first(
                    fn ($attempt) => $attempt->completed_at !== null
                );

                $lesson = $latest->lesson;
                $subject = $lesson?->subject;

                return [
                    'student_name' => $latest->student?->name ?? 'Unknown Student',
                    'student_email' => $latest->student?->email ?? '',
                    'attempts_count' => $studentAttempts->count(),
                    'completed_attempts' => $studentAttempts
                        ->whereNotNull('completed_at')
                        ->count(),
                    'subject_name' => $subject?->name ?? 'Unavailable',
                    'subject_code' => $subject?->code ?? '',
                    'lesson_title' => $lesson?->title ?? 'Unavailable',
                    'latest_status' => $latest->completed_at
                        ? 'Completed'
                        : 'In progress',
                    'latest_score' => $latestCompleted?->score,
                    'latest_total_questions' => $latestCompleted?->total_questions,
                    'last_completed_at' => $latestCompleted?->completed_at
                        ?->format('M d, Y g:i A'),
                ];
            })
            ->values();

        return response()->json([
            'data' => $students,
        ]);
    }

    /**
     * Export student quiz performance for this instructor's assigned subjects.
     */
    public function export(Request $request): StreamedResponse
    {
        $instructor = $request->user();

        abort_unless($instructor && $instructor->isInstructor(), 403);

        $filename = 'student-reports-' . now()->format('Ymd-His') . '.csv';

        $callback = function () use ($instructor): void {
            $handle = fopen('php://output', 'w');

            if ($handle === false) {
                throw new \RuntimeException('Unable to create the CSV report.');
            }

            // UTF-8 BOM helps Microsoft Excel display special characters correctly.
            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'Student Name',
                'Email Address',
                'Subject Code',
                'Subject Name',
                'Lesson Number',
                'Lesson Title',
                'Quiz Score',
                'Total Questions',
                'Score Percentage',
                'Completion Status',
                'Started At',
                'Completed At',
            ]);

            // Protect spreadsheet users from CSV formula injection in text fields.
            $safeText = static function ($value): string {
                $value = (string) ($value ?? '');

                if (preg_match('/^[\t\r\n ]*[=+\-@]/', $value)) {
                    return "'" . $value;
                }

                return $value;
            };

            QuizAttempt::query()
                ->whereHas('student', function ($query) {
                    $query->where('role', 'student');
                })
                ->whereHas('lesson.subject', function ($query) use ($instructor) {
                    $query->where('instructor_id', $instructor->id);
                })
                ->with([
                    'student:id,name,email',
                    'lesson:id,subject_id,lesson_number,title',
                    'lesson.subject:id,name,code,instructor_id',
                ])
                ->orderBy('id')
                ->chunkById(500, function ($attempts) use ($handle, $safeText) {
                    foreach ($attempts as $attempt) {
                        $lesson = $attempt->lesson;
                        $subject = $lesson?->subject;
                        $student = $attempt->student;

                        $total = (int) $attempt->total_questions;
                        $score = (int) $attempt->score;

                        $percentage = $total > 0
                            ? round(($score / $total) * 100, 1)
                            : '';

                        $status = $attempt->completed_at !== null
                            ? 'Completed'
                            : 'In Progress';

                        fputcsv($handle, [
                            $safeText($student?->name ?? 'Unknown Student'),
                            $safeText($student?->email ?? ''),
                            $safeText($subject?->code ?? ''),
                            $safeText($subject?->name ?? 'Unavailable'),
                            $lesson?->lesson_number ?? '',
                            $safeText($lesson?->title ?? 'Unavailable'),
                            $score,
                            $total,
                            $percentage,
                            $status,
                            $attempt->started_at?->format('Y-m-d H:i:s') ?? '',
                            $attempt->completed_at?->format('Y-m-d H:i:s') ?? '',
                        ]);
                    }
                });

            fclose($handle);
        };

        return response()->streamDownload(
            $callback,
            $filename,
            [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Cache-Control' => 'no-store, private',
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }

}
