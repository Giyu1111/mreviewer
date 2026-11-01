
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject->name }} Quiz | Mobile Reviewer</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f8fafc;
            color: #172033;
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        a { text-decoration: none; }

        header {
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .nav {
            max-width: 850px;
            margin: auto;
            padding: 18px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .brand { color: #4f46e5; font-weight: 800; font-size: 20px; }
        .back { color: #4f46e5; font-weight: 700; font-size: 14px; }

        main {
            width: min(800px, calc(100% - 28px));
            margin: 30px auto 50px;
        }

        .intro, .question, .empty {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
        }

        .intro { margin-bottom: 20px; }
        .eyebrow { color: #4f46e5; font-weight: 800; font-size: 12px; }
        h1 { font-size: clamp(26px, 5vw, 34px); margin: 8px 0; }
        .muted { color: #64748b; }

        .question { margin-bottom: 16px; }

        .number {
            color: #4f46e5;
            font-weight: 800;
            font-size: 13px;
        }

        h2 { font-size: 18px; margin: 8px 0 18px; }

        .option {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 13px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            margin-top: 10px;
            cursor: pointer;
        }

        .option:hover { background: #eef2ff; border-color: #a5b4fc; }
        .option input { margin-top: 5px; accent-color: #4f46e5; }
        .option span { overflow-wrap: anywhere; }

        .button {
            display: inline-block;
            border: 0;
            border-radius: 10px;
            background: #4f46e5;
            color: white;
            padding: 14px 20px;
            font-weight: 800;
            font-size: 15px;
            cursor: pointer;
        }

        .button:hover { background: #3730a3; }
        .actions { margin-top: 24px; display: flex; gap: 12px; flex-wrap: wrap; }
        .empty p { color: #64748b; }

        @media (max-width: 480px) {
            .nav { padding: 15px; }
            .brand { font-size: 18px; }
            main { margin-top: 18px; }
            .intro, .question, .empty { padding: 18px; }
            .button { width: 100%; text-align: center; }
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
        <a class="mr-page-back" href="{{ route('subjects.show', $subject->slug) }}">← Back</a>
    </nav>
</header>



<main>
    <section class="intro">
        <div class="eyebrow">PRACTICE QUIZ</div>
        <h1>{{ $subject->name }}</h1>
        <p class="muted">
            Answer each question and submit your work to see your score
            and explanations. Unanswered questions count as incorrect.
        </p>
        <strong>{{ $questions->count() }} questions</strong>
    </section>

    @if ($questions->isEmpty())
        <section class="empty">
            <h2>No questions available yet</h2>
            <p>This subject does not have any active questions.</p>
            <a class="button" href="{{ route('subjects.show', $subject->slug) }}">
                Return to Subject
            </a>
        </section>
    @else
        <form method="POST" action="{{ route('quiz.submit', $subject->slug) }}">
            @csrf

            @foreach ($questions as $index => $question)
                <section class="question">
                    <div class="number">QUESTION {{ $index + 1 }}</div>

                    <h2>{{ $question->question_text }}</h2>

                    @foreach ($question->options as $option)
                        <label class="option">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}"
                            >

                            <span>{{ $option->option_text }}</span>
                        </label>
                    @endforeach
                </section>
            @endforeach

            <div class="actions">
                <button type="submit" class="button">Submit Answers</button>
            </div>
        </form>
    @endif
</main>
</body>
</html>
