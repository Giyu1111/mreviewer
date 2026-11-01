
<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstructorLessonController;
use App\Http\Controllers\InstructorQuizController;
use App\Http\Controllers\InstructorReviewController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentNotificationController;
use App\Models\QuizAttempt;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

// Login page
Route::get('/', [AuthController::class, 'show'])
    ->name('login');

// Login and student registration
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register');
});

// Account Settings - authenticated users only
Route::middleware('auth')->group(function () {

    Route::get(
        '/account/settings',
        [AccountSettingsController::class, 'index']
    )->name('account.settings');

    Route::patch(
        '/account/settings/profile',
        [AccountSettingsController::class, 'updateProfile']
    )->name('account.settings.profile');

    Route::patch(
        '/account/settings/password',
        [AccountSettingsController::class, 'updatePassword']
    )->name('account.settings.password');

});
// Student Notifications - students only
Route::middleware('auth')->group(function () {
    Route::get(
        '/student/notifications',
        [StudentNotificationController::class, 'index']
    )->name('student.notifications.index');

    Route::patch(
        '/student/notifications/{notificationId}/read',
        [StudentNotificationController::class, 'markRead']
    )->name('student.notifications.read');

    Route::patch(
        '/student/notifications/read-all',
        [StudentNotificationController::class, 'markAllRead']
    )->name('student.notifications.read-all');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Redirect authenticated users to the correct dashboard
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->isInstructor()) {
        return redirect()->route('instructor.dashboard');
    }

    return redirect()->route('student.dashboard');
})->middleware('auth')->name('dashboard');

// Student dashboard
Route::get('/student/dashboard', function () {
    abort_unless(auth()->user()->isStudent(), 403);

    $subjects = Subject::where('is_active', true)
        ->orderBy('code')
        ->get();

    // Load this student's unfinished reviewer attempts.
    $unfinishedAttempts = QuizAttempt::query()
        ->where('user_id', auth()->id())
        ->whereNull('completed_at')
        ->with('lesson.subject')
        ->withCount([
            'answers as answered_questions_count' => function ($query) {
                $query->whereNotNull('answered_at');
            },
        ])
        ->latest('started_at')
        ->get()->unique('lesson_id')->values();

    return view('home', compact('subjects', 'unfinishedAttempts'));
})->middleware('auth')->name('student.dashboard');

// Instructor dashboard
Route::get('/instructor/dashboard', function () {
    abort_unless(auth()->user()->isInstructor(), 403);

    $subjects = auth()->user()
        ->subjects()
        ->where('is_active', true)
        ->withCount('lessons')
        ->orderBy('code')
        ->get();

    // =========================================
    // INSTRUCTOR STUDENT PERFORMANCE ANALYTICS
    // Only include records from assigned subjects.
    // =========================================

    // Restrict analytics to this instructor's active assigned subjects.
    $assignedSubjectIds = $subjects->modelKeys();
    $instructorId = auth()->id();

    $attemptsQuery = QuizAttempt::query()
        ->whereHas('lesson.subject', function ($query) use ($instructorId, $assignedSubjectIds) {
            $query->where('instructor_id', $instructorId)
                ->whereIn('subjects.id', $assignedSubjectIds);
        })
        ->whereHas('student', function ($query) {
            $query->where('role', 'student');
        });

    $totalAttempts = (clone $attemptsQuery)->count();

    $completedAttempts = (clone $attemptsQuery)
        ->whereNotNull('completed_at')
        ->count();

    $participatingStudents = (clone $attemptsQuery)
        ->distinct()
        ->count('user_id');

    $averageScore = (clone $attemptsQuery)
        ->whereNotNull('completed_at')
        ->where('total_questions', '>', 0)
        ->selectRaw(
            'AVG(score * 100.0 / total_questions) AS average_score'
        )
        ->value('average_score');

    $completionRate = $totalAttempts > 0
        ? round(($completedAttempts / $totalAttempts) * 100, 1)
        : 0;

    $analytics = [
        'participating_students' => $participatingStudents,
        'total_attempts' => $totalAttempts,
        'completed_attempts' => $completedAttempts,
        'average_score' => round((float) ($averageScore ?? 0), 1),
        'completion_rate' => $completionRate,
    ];

    // Calculate performance separately for each assigned subject.
    $performanceBySubject = $subjects->map(function ($subject) use ($instructorId) {

        $subjectAttempts = QuizAttempt::query()
            ->whereHas('lesson.subject', function ($query) use ($instructorId, $subject) {
                $query->where('instructor_id', $instructorId)
                    ->where('subjects.id', $subject->id);
            })
            ->whereHas('student', function ($query) {
                $query->where('role', 'student');
            });

        $attemptCount = (clone $subjectAttempts)->count();

        $completedCount = (clone $subjectAttempts)
            ->whereNotNull('completed_at')
            ->count();

        $studentCount = (clone $subjectAttempts)
            ->distinct()
            ->count('user_id');

        $subjectAverage = (clone $subjectAttempts)
            ->whereNotNull('completed_at')
            ->where('total_questions', '>', 0)
            ->selectRaw(
                'AVG(score * 100.0 / total_questions) AS average_score'
            )
            ->value('average_score');

        return [
            'subject_id' => $subject->id,
            'subject_code' => $subject->code,
            'subject_name' => $subject->name,
            'students' => $studentCount,
            'attempts' => $attemptCount,
            'completed' => $completedCount,
            'average_score' => round((float) ($subjectAverage ?? 0), 1),
            'completion_rate' => $attemptCount > 0
                ? round(($completedCount / $attemptCount) * 100, 1)
                : 0,
        ];
    })->values();

    return view('instructor.dashboard', compact('subjects', 'analytics', 'performanceBySubject'));
})->middleware('auth')->name('instructor.dashboard');

// Instructor Manage Review
Route::get(
    '/instructor/reviews/students',
    [InstructorReviewController::class, 'students']
)
    ->middleware('auth')
    ->name('instructor.reviews.students');

// Export student performance reports for the assigned instructor.
Route::get(
    '/instructor/reports/export',
    [InstructorReviewController::class, 'export']
)
    ->middleware('auth')
    ->name('instructor.reports.export');

// Subject lesson page

Route::get('/subjects/{slug}', function (string $slug) {
    $subject = Subject::where('slug', $slug)
        ->where('is_active', true)
        ->firstOrFail();

    $user = auth()->user();

    if ($user->isInstructor()) {
        abort_unless(
            $user->subjects()->whereKey($subject->id)->exists(),
            403
        );
    } elseif (! $user->isStudent()) {
        abort(403);
    }

    $query = $subject->lessons();

    // Students can only see published lessons.
    if ($user->isStudent()) {
        $query->where('is_published', true);
    }

    $lessons = $query
        ->orderBy('lesson_number')
        ->get()
        ->keyBy('lesson_number');

    return view('subjects.show', compact('subject', 'lessons'));
})->middleware('auth')->name('subjects.show');

Route::get(
    '/subjects/{slug}/lessons/{lessonNumber}',
    function (string $slug, string $lessonNumber) {
        abort_unless(ctype_digit($lessonNumber), 404);

        $number = (int) $lessonNumber;

        abort_unless($number >= 1, 404);

        $subject = Subject::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $user = auth()->user();

        if ($user->isInstructor()) {
            abort_unless(
                $user->subjects()->whereKey($subject->id)->exists(),
                403
            );
        } elseif (! $user->isStudent()) {
            abort(403);
        }

        $lesson = $subject->lessons()
            ->withCount([
                'questions as active_questions_count' => fn ($query) => $query
                    ->where('is_active', true),
            ])
            ->where('lesson_number', $number)
            ->firstOrFail();

        // Hide unpublished lessons from students.
        if ($user->isStudent() && ! $lesson->is_published) {
            abort(404);
        }

        return view('subjects.lesson', compact('subject', 'lesson'));
    }
)->middleware('auth')->name('subjects.lessons.show');

Route::middleware('auth')->group(function () {
    Route::get(
        '/instructor/subjects/{subject}/lessons',
        [InstructorLessonController::class, 'index']
    )
        ->name('instructor.subjects.lessons.index');

    Route::post(
        '/instructor/subjects/{subject}/lessons/{lessonNumber}',
        [InstructorLessonController::class, 'store']
    )
        ->whereNumber('lessonNumber')
        ->name('instructor.subjects.lessons.store');

    Route::get(
        '/instructor/lessons/{lesson}/quiz',
        [InstructorQuizController::class, 'index']
    )->name('instructor.lessons.quiz.index');

    Route::post(
        '/instructor/lessons/{lesson}/quiz',
        [InstructorQuizController::class, 'store']
    )->name('instructor.lessons.quiz.store');

    Route::put(
        '/instructor/lessons/{lesson}/quiz/{question}',
        [InstructorQuizController::class, 'update']
    )->name('instructor.lessons.quiz.update');

    Route::delete(
        '/instructor/lessons/{lesson}/quiz/{question}',
        [InstructorQuizController::class, 'destroy']
    )->name('instructor.lessons.quiz.destroy');

    Route::get(
        '/lesson-materials/{lesson}/download',
        [InstructorLessonController::class, 'download']
    )
        ->name('lesson-materials.download');

    Route::get(
        '/lesson-materials/{lesson}/open',
        [InstructorLessonController::class, 'open']
    )->name('lesson-materials.open');
    Route::post(
        '/subjects/{slug}/lessons/{lessonNumber}/quiz/start',
        [QuizController::class, 'start']
    )
        ->whereNumber('lessonNumber')
        ->name('quiz.start');

    // Display an active quiz or its results.
    Route::get(
        '/quiz/attempts/{attempt}',
        [QuizController::class, 'show']
    )
        ->name('quiz.take');

    // Submit one answer immediately.
    Route::post(
        '/quiz/attempts/{attempt}/answer',
        [QuizController::class, 'submitAnswer']
    )
        ->name('quiz.submit-answer');
    // Submit one answer immediately.

    Route::get(
        '/student/reviewer-history',
        [QuizController::class, 'history']
    )
        ->name('student.reviewer-history');
});
