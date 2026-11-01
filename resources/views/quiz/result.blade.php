
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results | Mobile Reviewer</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 24px 16px;
            font-family: 'Inter', sans-serif;
            background: #f3f6f8;
            color: #263238;
        }

        .container {
            max-width: 850px;
            margin: auto;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 18px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        }

        .summary {
            border-top: 5px solid #0b5231;
            text-align: center;
        }

        h1, h2 {
            color: #0b5231;
        }

        .score {
            font-size: 42px;
            font-weight: bold;
            color: #0b5231;
            margin: 15px 0;
        }

        .muted {
            color: #65736d;
            line-height: 1.6;
        }

        .question-number {
            font-size: 13px;
            font-weight: bold;
            color: #0b5231;
            text-transform: uppercase;
        }

        .question-text {
            font-size: 17px;
            font-weight: bold;
            line-height: 1.6;
            margin: 12px 0;
        }

        .answer {
            padding: 12px;
            border-radius: 8px;
            margin: 10px 0;
            line-height: 1.5;
        }

        .correct {
            background: #e7f5eb;
            color: #176534;
        }

        .incorrect {
            background: #fff0ef;
            color: #a12622;
        }

        .neutral {
            background: #f1f3f4;
            color: #495057;
        }

        .button {
            display: inline-block;
            border: 0;
            border-radius: 8px;
            padding: 13px 22px;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            background: #0b5231;
            color: white;
        }

        .button:hover {
            background: #084126;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 24px;
        }

        @media (max-width: 500px) {
            body {
                padding: 14px 10px;
            }

            .card {
                padding: 16px;
            }

            .button {
                width: 100%;
                text-align: center;
            }
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
        <a class="mr-page-brand" href="{{ route('student.dashboard') }}">MobileReviewer.</a>
        <a class="mr-page-back" href="{{ route('subjects.show', $attempt->lesson->subject->slug) }}">← Back to Lessons</a>
    </nav>
</header>

    <main class="container">
        <section class="card summary">
            <h1>Quiz Results</h1>

            <p class="muted">
                {{ $attempt->lesson->subject->code }}
                — {{ $attempt->lesson->subject->name }}
            </p>

            <p class="muted">
                Lesson: {{ $attempt->lesson->title }}
            </p>

            <div class="score">
                {{ $attempt->score }} / {{ $attempt->total_questions }}
            </div>

            <p>
                @if ($attempt->total_questions > 0)
                    Score:
                    {{ round(($attempt->score / $attempt->total_questions) * 100, 1) }}%
                @else
                    No questions were recorded for this attempt.
                @endif
            </p>

            <p class="muted">
                Completed:
                {{ $attempt->completed_at?->format('M d, Y h:i A') ?? 'N/A' }}
            </p>
        </section>

        <h2>Answer Review</h2>

        @foreach ($answers as $answer)
            @php
                $correctOption = $answer->question->options
                    ->firstWhere('is_correct', true);
            @endphp

            <section class="card">
                <div class="question-number">
                    Question {{ $answer->question_order }}
                </div>

                <div class="question-text">
                    {{ $answer->question->question_text }}
                </div>

                @if ($answer->selectedOption)
                    <div class="answer {{ $answer->is_correct ? 'correct' : 'incorrect' }}">
                        <strong>Your answer:</strong>
                        {{ $answer->selectedOption->option_text }}

                        <div>
                            {{ $answer->is_correct ? 'Correct' : 'Incorrect' }}
                        </div>
                    </div>
                @else
                    <div class="answer neutral">
                        <strong>Your answer:</strong> Not answered
                    </div>
                @endif

                @if ($correctOption)
                    <div class="answer correct">
                        <strong>Correct answer:</strong>
                        {{ $correctOption->option_text }}
                    </div>
                @endif

                @if ($answer->question->explanation)
                    <p class="muted">
                        <strong>Explanation:</strong>
                        {{ $answer->question->explanation }}
                    </p>
                @endif
            </section>
        @endforeach

        <div class="actions">
            <a
                class="button"
                href="{{ route('subjects.show', $attempt->lesson->subject->slug) }}"
            >
                Back to Lessons
            </a>
        </div>
    </main>
</body>
</html>
