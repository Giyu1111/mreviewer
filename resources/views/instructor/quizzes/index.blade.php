<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f8fafc">
    <title>Manage Quiz | Mobile Reviewer</title>

    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Inter', sans-serif; background: #f8fafc; color: #172033; line-height: 1.6; }
        .navbar { background: white; border-bottom: 1px solid #e2e8f0; }
        .nav-inner { width: min(1000px, calc(100% - 32px)); min-height: 66px; margin: auto; display: flex; align-items: center; }
        .back { color: #4f46e5; font-weight: 800; text-decoration: none; }
        .container { width: min(1000px, calc(100% - 32px)); margin: 28px auto; }
        .header, .card { margin-bottom: 20px; padding: 24px; background: white; border: 1px solid #e2e8f0; border-radius: 15px; }
        .header { background: linear-gradient(135deg, #eef2ff, white); border-color: #e0e7ff; }
        .code, .count { display: inline-block; padding: 5px 10px; border-radius: 7px; font-size: 12px; font-weight: 800; }
        .code { background: #e0e7ff; color: #3730a3; }
        .count { background: #f1f5f9; color: #475569; }
        h1 { margin: 10px 0 4px; font-size: 28px; }
        h2 { margin-top: 0; font-size: 20px; }
        .muted { color: #64748b; font-size: 14px; }
        .success, .error-list { margin-bottom: 20px; padding: 13px 16px; border-radius: 10px; font-size: 14px; }
        .success { border: 1px solid #a7f3d0; background: #ecfdf5; color: #065f46; }
        .error-list { border: 1px solid #fecaca; background: #fef2f2; color: #b91c1c; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
        .full { grid-column: 1 / -1; }
        label { display: block; margin-bottom: 7px; font-size: 13px; font-weight: 700; }
        input, textarea, select { width: 100%; padding: 11px 12px; border: 1px solid #cbd5e1; border-radius: 9px; background: white; color: #172033; font: inherit; font-size: 14px; }
        textarea { min-height: 105px; resize: vertical; }
        input:focus, textarea:focus, select:focus { outline: 2px solid #c7d2fe; border-color: #4f46e5; }
        .options { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; }
        .option { padding: 14px; border: 1px solid #e2e8f0; border-radius: 10px; }
        .correct { display: flex; align-items: center; gap: 8px; margin-top: 10px; font-size: 13px; font-weight: 700; }
        .correct input { width: auto; accent-color: #4f46e5; }
        .button { display: inline-flex; align-items: center; justify-content: center; min-height: 44px; padding: 11px 17px; border: 0; border-radius: 9px; background: #4f46e5; color: white; font-size: 14px; font-weight: 700; cursor: pointer; text-decoration: none; }
        .button:hover { background: #3730a3; }
        .button-danger { background: #dc2626; }
        .button-danger:hover { background: #b91c1c; }
        .question { padding: 18px 0; border-top: 1px solid #e2e8f0; }
        .question:first-of-type { border-top: 0; padding-top: 0; }
        .question-title { margin: 0 0 8px; font-weight: 800; }
        .option-list { margin: 0; padding-left: 22px; font-size: 14px; }
        .option-list .correct-answer { color: #047857; font-weight: 700; }
        .question-actions { margin-top: 12px; }

/* Question Management Modal */
dialog.modal {
    width: min(1000px, calc(100% - 32px));
    max-width: 1000px;
    max-height: 85vh;
    padding: 0;
    border: 0;
    border-radius: 16px;
    background: white;
    color: #172033;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
    overflow: hidden;
}

dialog.modal::backdrop {
    background: rgba(15, 23, 42, 0.65);
    backdrop-filter: blur(3px);
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 20px 24px;
    border-bottom: 1px solid #e2e8f0;
}

.modal-header h2 {
    margin: 0;
}

.modal-body {
    padding: 20px 24px;
    max-height: calc(85vh - 85px);
    overflow: auto;
}

.modal-close {
    width: 36px;
    height: 36px;
    border: 0;
    border-radius: 8px;
    background: #f1f5f9;
    color: #172033;
    font-size: 22px;
    cursor: pointer;
}

.table-wrap {
    width: 100%;
    overflow-x: auto;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
}

.question-table {
    width: 100%;
    min-width: 650px;
    border-collapse: collapse;
    text-align: left;
}

.question-table th,
.question-table td {
    padding: 13px 15px;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: middle;
    font-size: 13px;
}

.question-table th {
    background: #f8fafc;
    color: #475569;
    font-weight: 800;
}

.question-table tbody tr:hover {
    background: #f8fafc;
}

.question-table tbody tr:last-child td {
    border-bottom: 0;
}

.table-question {
    max-width: 380px;
    overflow-wrap: anywhere;
    font-weight: 700;
}

.table-actions {
    display: flex;
    align-items: center;
    gap: 8px;
}

.button-small {
    min-height: 34px;
    padding: 7px 11px;
    font-size: 12px;
}

.button-secondary {
    background: #e2e8f0;
    color: #334155;
}

.button-secondary:hover {
    background: #cbd5e1;
}

@media (max-width: 600px) {
    .modal-header,
    .modal-body {
        padding: 16px;
    }

    dialog.modal {
        max-height: 90vh;
    }

    .table-actions {
        flex-direction: column;
        align-items: stretch;
    }
}

        @media (max-width: 600px) { .container, .nav-inner { width: calc(100% - 24px); } .header, .card { padding: 18px; } .form-grid, .options { grid-template-columns: 1fr; } .button { width: 100%; } }

/* GLOBAL MODAL FONT: INTER */
dialog,
dialog *,
[role="dialog"],
[role="dialog"] *,
.modal,
.modal * {
    font-family: 'Inter', sans-serif !important;
}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style id="global-inter-font">
html,
body {
    font-family: 'Inter', sans-serif !important;
}

button,
input,
select,
textarea {
    font-family: 'Inter', sans-serif !important;
}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;500;600;700&family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style id="mreviewer-comfortaa-nunito-fonts">

/* Main typography */
html,
body {
    font-family: 'Nunito', sans-serif !important;
}

body,
body *,
dialog,
dialog *,
button,
input,
select,
textarea {
    font-family: 'Nunito', sans-serif !important;
}

/* Rounded geometric headings */
h1,
h2,
h3,
h4,
h5,
h6,
.header h1,
.welcome h1,
.welcome h2,
.section-heading h2,
.subject-card h3,
.question-title,
.modal-header h2,
.review-dialog-header h2,
.logout-dialog h2,
.review-empty h3,
.brand,
.logo {
    font-family: 'Comfortaa', sans-serif !important;
    font-weight: 700 !important;
}

/* Keep form controls readable */
input,
textarea,
select,
button {
    font-size: inherit;
    font-family: 'Nunito', sans-serif !important;
}

/* Modal content remains comfortable to read */
dialog,
dialog p,
dialog label,
dialog button,
dialog input,
dialog select,
dialog textarea,
.modal,
.modal * {
    font-family: 'Nunito', sans-serif !important;
}

/* Preserve Comfortaa on modal headings */
dialog h1,
dialog h2,
dialog h3,
.modal h1,
.modal h2,
.modal h3 {
    font-family: 'Comfortaa', sans-serif !important;
    font-weight: 700 !important;
}

</style>

<style id="mr-standard-page-header">
    .mr-page-navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        width: 100%;
        background: rgba(255, 255, 255, 0.96);
        border-bottom: 1px solid #e8edf5;
        box-shadow: 0 3px 15px rgba(15, 23, 42, 0.035);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
    }

    .mr-page-nav-inner {
        width: 100%;
        max-width: 1180px;
        min-height: 72px;
        margin: 0 auto;
        padding: 13px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .mr-page-brand {
        display: inline-flex;
        align-items: center;
        flex-shrink: 0;
        color: #4338ca !important;
        font-family: 'Comfortaa', cursive !important;
        font-size: 22px !important;
        line-height: 1.2;
        font-weight: 800 !important;
        letter-spacing: -0.8px;
        text-decoration: none !important;
        white-space: nowrap;
    }

    .mr-page-brand:hover {
        color: #3730a3 !important;
    }

    .mr-page-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        min-height: 42px;
        padding: 10px 16px;
        border: 1px solid #e0e7ff;
        border-radius: 10px;
        background: #eef2ff;
        color: #4f46e5 !important;
        font-family: 'Nunito', sans-serif !important;
        font-size: 14px !important;
        font-weight: 800 !important;
        line-height: 1.2;
        text-decoration: none !important;
        white-space: nowrap;
        transition: all 0.2s ease;
    }

    .mr-page-back:hover {
        background: #e0e7ff;
        border-color: #c7d2fe;
        color: #3730a3 !important;
    }

    @media (max-width: 600px) {
        .mr-page-nav-inner {
            min-height: 64px;
            padding: 11px 16px;
            gap: 10px;
        }

        .mr-page-brand {
            font-size: 19px !important;
        }

        .mr-page-back {
            min-height: 40px;
            padding: 9px 12px;
            font-size: 13px !important;
        }
    }
</style>
<link rel="icon" type="image/svg+xml" href="{{ asset('mr-mark.svg') }}">
<link rel="stylesheet" href="{{ asset('theme.css') }}">
<script defer src="{{ asset('theme.js') }}"></script>
</head>
<body>
<header class="mr-page-navbar">
    <nav class="mr-page-nav-inner" aria-label="Page navigation">
        <a class="mr-page-brand" href="{{ route('instructor.dashboard') }}">MobileReviewer.</a>
        <a class="mr-page-back" href="{{ route('instructor.subjects.lessons.index', $lesson->subject) }}">← Back to Manage Lessons</a>
    </nav>
</header>



    <main class="container">
        <header class="header">
            <span class="code">{{ $lesson->subject->code }} · LESSON {{ $lesson->lesson_number }}</span>
            <h1>Manage Lesson Quiz</h1>
            <p><strong>{{ $lesson->title }}</strong></p>
            <p class="muted">Create reviewer questions for students. Each question needs four choices and one correct answer.</p>
            <span class="count">{{ $questions->count() }} questions created</span>
            <div style="margin-top: 15px;">
    <button
        type="button"
        class="button"
        id="openQuestionManager"
    >
        Manage Questions
    </button>
</div>
        </header>

        @if (session('success'))
            <div class="success" role="status">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-list" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

<dialog class="modal" id="questionManagerModal">
    <div class="modal-header">
        <div>
            <h2 id="questionManagerTitle">Question Management</h2>
            <p class="muted">
                Review and manage questions created for this lesson.
            </p>
        </div>

        <button
            type="button"
            class="modal-close"
            id="closeQuestionManager"
            aria-label="Close question manager"
        >
            &times;
        </button>
    </div>

    <div class="modal-body">
        @if ($questions->isNotEmpty())
            <div class="table-wrap">
                <table class="question-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Question</th>
                            <th>Difficulty</th>
                            <th>Correct Answer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($questions as $question)
                            @php
                                $correctOption = $question->options
                                    ->firstWhere('is_correct', true);
                            @endphp

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <div class="table-question">
                                        {{ $question->question_text }}
                                    </div>
                                </td>

                                <td>
                                    {{ ucfirst($question->difficulty) }}
                                </td>

                                <td>
                                    {{ $correctOption?->option_text ?? 'Not set' }}
                                </td>

                                <td>
                                    <div class="table-actions">
                                        <button
    type="button"
   class="button button-secondary button-small open-edit-modal"
    data-modal="editQuestionModal-{{ $question->id }}"
>
    Edit
</button>
                                        <button
    type="button"
    class="button button-danger button-small open-delete-modal"
    data-modal="deleteQuestionModal-{{ $question->id }}"
>
    Delete
</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="muted">
                No questions have been created for this lesson yet.
            </p>
        @endif
    </div>
</dialog>

{{-- Edit Question Modals --}}
@foreach ($questions as $question)
    @php
        $orderedOptions = $question->options
            ->sortBy('sort_order')
            ->values();

        $correctIndex = $orderedOptions->search(
            fn ($option) => $option->is_correct
        );

        $correctIndex = $correctIndex === false ? 0 : $correctIndex;
    @endphp

    <dialog
        class="modal"
        id="editQuestionModal-{{ $question->id }}"
    >
        <div class="modal-header">
            <div>
                <h2>Edit Question</h2>
                <p class="muted">
                    Update the question and its answer choices.
                </p>
            </div>

            <button
                type="button"
                class="modal-close close-edit-modal"
                data-modal="editQuestionModal-{{ $question->id }}"
                aria-label="Close edit modal"
            >
                &times;
            </button>
        </div>

        <div class="modal-body">
            <form
                method="POST"
                action="{{ route('instructor.lessons.quiz.update', [
                    'lesson' => $lesson,
                    'question' => $question
                ]) }}"
            >
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="full">
                        <label>Question</label>
                        <textarea
                            name="question_text"
                            required
                        >{{ $question->question_text }}</textarea>
                    </div>

                    <div>
                        <label>Difficulty</label>
                        <select name="difficulty" required>
                            @foreach (['easy', 'medium', 'hard'] as $difficulty)
                                <option
                                    value="{{ $difficulty }}"
                                    @selected($question->difficulty === $difficulty)
                                >
                                    {{ ucfirst($difficulty) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Explanation (optional)</label>
                        <input
                            type="text"
                            name="explanation"
                            value="{{ $question->explanation }}"
                        >
                    </div>

                    <div class="full options">
                        @foreach ($orderedOptions as $index => $option)
                            <div class="option">
                                <label>
                                    Option {{ chr(65 + $index) }}
                                </label>

                                <input
                                    type="text"
                                    name="options[{{ $index }}][text]"
                                    value="{{ $option->option_text }}"
                                    required
                                >

                                <label class="correct">
                                    <input
                                        type="radio"
                                        name="correct_option"
                                        value="{{ $index }}"
                                        @checked($correctIndex === $index)
                                        required
                                    >
                                    Correct answer
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div style="display:flex; gap:10px; margin-top:20px; flex-wrap:wrap;">
                    <button
                        type="submit"
                        class="button"
                    >
                        Save Changes
                    </button>

                    <button
                        type="button"
                        class="button button-secondary close-edit-modal"
                        data-modal="editQuestionModal-{{ $question->id }}"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </dialog>
@endforeach

{{-- Delete Confirmation Modals --}}
@foreach ($questions as $question)
    <dialog
        class="modal"
        id="deleteQuestionModal-{{ $question->id }}"
    >
        <div class="modal-header">
            <div>
                <h2>Delete Question</h2>
                <p class="muted">
                    Please confirm this action.
                </p>
            </div>

            <button
                type="button"
                class="modal-close close-delete-modal"
                data-modal="deleteQuestionModal-{{ $question->id }}"
                aria-label="Close delete modal"
            >
                &times;
            </button>
        </div>

        <div class="modal-body">
            <p>
                Are you sure you want to delete this question?
            </p>

            <div class="notice">
                <strong>{{ $question->question_text }}</strong>
            </div>

            <p class="muted">
                This action cannot be undone. Questions with existing
                student reviewer records cannot be deleted.
            </p>

            <div style="display:flex; gap:10px; margin-top:20px;">
                <form
                    method="POST"
                    action="{{ route('instructor.lessons.quiz.destroy', [
                        'lesson' => $lesson,
                        'question' => $question
                    ]) }}"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="button button-danger"
                    >
                        Yes, Delete
                    </button>
                </form>

                <button
                    type="button"
                    class="button button-secondary close-delete-modal"
                    data-modal="deleteQuestionModal-{{ $question->id }}"
                >
                    Cancel
                </button>
            </div>
        </div>
    </dialog>
@endforeach

        <section class="card">
            <h2>Add New Question</h2>
                <form method="POST" action="{{ route('instructor.lessons.quiz.store', $lesson) }}">
                    @csrf
                    <div class="form-grid">
                        <div class="full">
                            <label for="question_text">Question</label>
                            <textarea id="question_text" name="question_text" required>{{ old('question_text') }}</textarea>
                        </div>
                        <div>
                            <label for="difficulty">Difficulty</label>
                            <select id="difficulty" name="difficulty" required>
                                @foreach (['easy' => 'Easy', 'medium' => 'Medium', 'hard' => 'Hard'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('difficulty', 'medium') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="explanation">Explanation (optional)</label>
                            <input id="explanation" type="text" name="explanation" value="{{ old('explanation') }}">
                        </div>
                        <div class="full options">
                            @foreach (range(0, 3) as $index)
                                <div class="option">
                                    <label for="option_{{ $index }}">Option {{ chr(65 + $index) }}</label>
                                    <input id="option_{{ $index }}" type="text" name="options[{{ $index }}][text]" value="{{ old('options.' . $index . '.text') }}" required>
                                    <label class="correct" for="correct_{{ $index }}">
                                        <input id="correct_{{ $index }}" type="radio" name="correct_option" value="{{ $index }}" @checked((string) old('correct_option', '0') === (string) $index) required>
                                        Correct answer
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="button" type="submit">Save Question</button>
                </form>
            </section>


    </main>

<script>
    const questionManager = document.getElementById(
        'questionManagerModal'
    );

    const openManagerButton = document.getElementById(
        'openQuestionManager'
    );

    const closeManagerButton = document.getElementById(
        'closeQuestionManager'
    );

    if (questionManager && openManagerButton && closeManagerButton) {
        openManagerButton.addEventListener('click', () => {
            questionManager.showModal();
        });

        closeManagerButton.addEventListener('click', () => {
            questionManager.close();
        });

        questionManager.addEventListener('click', (event) => {
            if (event.target === questionManager) {
                questionManager.close();
            }
        });
    }
</script>


<script>
    // Open the corresponding Edit Question modal.
    document.querySelectorAll('.open-edit-modal').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.dataset.modal;
            const modal = document.getElementById(modalId);

            if (modal) {
                modal.showModal();
            }
        });
    });

    // Close Edit Question modals.
    document.querySelectorAll('.close-edit-modal').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.dataset.modal;
            const modal = document.getElementById(modalId);

            if (modal) {
                modal.close();
            }
        });
    });

    // Close an Edit Question modal when clicking its backdrop.
    document.querySelectorAll('dialog[id^="editQuestionModal-"]').forEach(modal => {
        modal.addEventListener('click', event => {
            if (event.target === modal) {
                modal.close();
            }
        });
    });
</script>

<script>
    // Open the corresponding Delete Confirmation modal.
    document.querySelectorAll('.open-delete-modal').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.dataset.modal;
            const modal = document.getElementById(modalId);

            if (modal) {
                modal.showModal();
            }
        });
    });

    // Close Delete Confirmation modals.
    document.querySelectorAll('.close-delete-modal').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.dataset.modal;
            const modal = document.getElementById(modalId);

            if (modal) {
                modal.close();
            }
        });
    });

    // Close when clicking outside the modal content.
    document.querySelectorAll('dialog[id^="deleteQuestionModal-"]').forEach(modal => {
        modal.addEventListener('click', event => {
            if (event.target === modal) {
                modal.close();
            }
        });
    });
</script>


</body>
</html>
