
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results | Mobile Reviewer</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f8fafc;
            color: #172033;
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        header { background: white; border-bottom: 1px solid #e2e8f0; }

        .nav {
            max-width: 800px;
            margin: auto;
            padding: 18px 20px;
        }

        .brand { color: #4f46e5; font-size: 20px; font-weight: 800; text-decoration: none; }

        main {
            width: min(760px, calc(100% - 28px));
            margin: 30px auto 50px;
        }

        .summary, .result {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
        }

        .summary { text-align: center; margin-bottom: 20px; }
        .label { color: #4f46e5; font-weight: 800; font-size: 12px; }
        h1 { font-size: clamp(26px, 5vw, 36px); margin: 8px 0; }
        .score { color: #4f46e5; font-size: 42px; font-weight: 800; margin: 8px 0; }
        .muted { color: #64748b; }

        .result { margin-bottom: 14px; }
        .result h2 { font-size: 17px; }
        .correct { color: #166534; font-weight: 800; }
        .incorrect { color: #b91c1c; font-weight: 800; }
        .explanation { background: #f1f5f9; padding: 13px; border-radius: 10px; margin-top: 12px; }

        .button {
            display: inline-block;
            margin-top: 10px;
            padding: 12px 18px;
            border-radius: 10px;
            background: #4f46e5;
            color: white;
            text-decoration: none;
            font-weight: 800;
        }

        @media (max-width: 480px) {
            main { margin-top: 18px; }
            .summary, .result { padding: 18px; }
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

<!-- Modern quiz results typography -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

<style id="mobile-reviewer-premium-results-design">

    /* =========================================
       GLOBAL PAGE DESIGN
    ========================================= */

    :root {
        --result-primary: #4f46e5;
        --result-primary-dark: #3730a3;
        --result-blue: #2563eb;
        --result-text: #172033;
        --result-muted: #64748b;
        --result-border: #e2e8f0;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        min-height: 100vh;
        font-family: 'DM Sans', sans-serif !important;
        color: var(--result-text);
        background:
            radial-gradient(
                ellipse at 7% 9%,
                rgba(129, 140, 248, 0.17),
                transparent 33%
            ),
            radial-gradient(
                ellipse at 94% 30%,
                rgba(96, 165, 250, 0.14),
                transparent 34%
            ),
            radial-gradient(
                ellipse at 50% 100%,
                rgba(167, 139, 250, 0.12),
                transparent 36%
            ),
            linear-gradient(
                135deg,
                #f8faff 0%,
                #eef2ff 42%,
                #f5f3ff 76%,
                #f8fafc 100%
            );
        background-attachment: fixed;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    h1,
    h2,
    h3,
    .brand {
        font-family: 'Space Grotesk', sans-serif !important;
    }

    /* =========================================
       NAVIGATION
    ========================================= */

    header {
        position: sticky;
        top: 0;
        z-index: 100;
        background: rgba(255, 255, 255, 0.88);
        border-bottom: 1px solid rgba(226, 232, 240, 0.9);
        box-shadow: 0 3px 16px rgba(15, 23, 42, 0.035);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }

    .nav {
        max-width: 900px;
        padding: 17px 22px;
    }

    .brand {
        color: #4338ca;
        font-size: 21px;
        font-weight: 700;
        letter-spacing: -0.8px;
        transition: color 0.2s ease;
    }

    .brand:hover {
        color: #6366f1;
    }

    /* =========================================
       MAIN LAYOUT
    ========================================= */

    main {
        width: min(820px, calc(100% - 36px));
        margin: 38px auto 60px;
    }

    /* =========================================
       SUMMARY / SCORE CARD
    ========================================= */

    .summary {
        position: relative;
        overflow: hidden;
        margin-bottom: 27px;
        padding: clamp(28px, 5vw, 44px);
        border: 1px solid #dbe3ff;
        border-radius: 24px;
        background:
            radial-gradient(
                ellipse at 95% 3%,
                rgba(129, 140, 248, 0.25),
                transparent 39%
            ),
            radial-gradient(
                ellipse at 0% 100%,
                rgba(96, 165, 250, 0.12),
                transparent 40%
            ),
            linear-gradient(
                135deg,
                #eaf0ff 0%,
                #ffffff 60%,
                #f5f3ff 100%
            );
        box-shadow:
            0 18px 42px rgba(49, 46, 129, 0.075),
            0 4px 12px rgba(15, 23, 42, 0.025);
    }

    .summary::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(
            90deg,
            #3730a3,
            #4f46e5,
            #818cf8,
            #60a5fa
        );
    }

    .label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 13px;
        border: 1px solid #c7d2fe;
        border-radius: 999px;
        background: #e0e7ff;
        color: #4338ca;
        font-size: 10px;
        font-weight: 850;
        letter-spacing: 1px;
    }

    .label::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.13);
    }

    .summary h1 {
        margin: 18px 0 10px;
        color: #172554;
        font-size: clamp(27px, 5vw, 36px);
        font-weight: 700;
        line-height: 1.25;
        letter-spacing: -1.2px;
        overflow-wrap: anywhere;
    }

    .score {
        display: inline-block;
        margin: 10px 0;
        padding: 7px 20px;
        border: 1px solid rgba(199, 210, 254, 0.85);
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.75);
        color: #4f46e5;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: clamp(38px, 7vw, 53px);
        font-weight: 700;
        line-height: 1.25;
        letter-spacing: -2px;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.055);
    }

    .summary .muted {
        max-width: 510px;
        margin: 12px auto 18px;
        color: #586780;
        font-size: 13px;
        line-height: 1.8;
    }

    /* =========================================
       BUTTONS
    ========================================= */

    .button {
        position: relative;
        isolation: isolate;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        min-height: 47px;
        margin: 10px 5px 0;
        padding: 12px 21px;
        overflow: hidden;
        border: 1px solid #4f46e5;
        border-radius: 11px;
        background: linear-gradient(
            120deg,
            #4338ca,
            #4f46e5,
            #6366f1
        );
        color: #ffffff;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        box-shadow:
            0 6px 14px rgba(79, 70, 229, 0.17),
            inset 0 1px 0 rgba(255, 255, 255, 0.14);
        transition:
            transform 0.23s ease,
            box-shadow 0.23s ease,
            background 0.23s ease;
    }

    .button:hover {
        transform: translateY(-3px);
        border-color: #3730a3;
        background: linear-gradient(
            120deg,
            #3730a3,
            #4338ca,
            #4f46e5
        );
        color: #ffffff;
        box-shadow:
            0 13px 23px rgba(79, 70, 229, 0.23),
            0 4px 9px rgba(79, 70, 229, 0.10);
    }

    .button:active {
        transform: translateY(-1px) scale(0.98);
    }

    /* =========================================
       INDIVIDUAL QUESTION RESULTS
    ========================================= */

    .result {
        position: relative;
        overflow: hidden;
        margin-bottom: 17px;
        padding: 25px;
        border: 1px solid #dce5f8;
        border-radius: 18px;
        background:
            radial-gradient(
                ellipse at 100% 0%,
                rgba(224, 231, 255, 0.22),
                transparent 40%
            ),
            rgba(255, 255, 255, 0.95);
        box-shadow:
            0 7px 21px rgba(49, 46, 129, 0.045),
            0 2px 6px rgba(15, 23, 42, 0.02);
        transition:
            transform 0.22s ease,
            box-shadow 0.22s ease,
            border-color 0.22s ease;
    }

    .result:hover {
        transform: translateY(-2px);
        border-color: #c7d2fe;
        box-shadow:
            0 13px 27px rgba(79, 70, 229, 0.075),
            0 3px 8px rgba(15, 23, 42, 0.025);
    }

    .result h2 {
        margin: 0 0 17px;
        color: #24345f;
        font-size: 17px;
        font-weight: 700;
        line-height: 1.65;
        letter-spacing: -0.35px;
        overflow-wrap: anywhere;
    }

    /* Correct and incorrect labels */

    .correct,
    .incorrect {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin: 0 0 15px;
        padding: 7px 11px;
        border: 1px solid transparent;
        border-radius: 999px;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 11px;
        font-weight: 850;
    }

    .correct {
        border-color: #bbf7d0;
        background: #ecfdf3;
        color: #15803d;
    }

    .incorrect {
        border-color: #fecaca;
        background: #fff1f2;
        color: #b91c1c;
    }

    /* Answer information */

    .result > p:not(.correct):not(.incorrect) {
        margin: 11px 0;
        padding: 13px 15px;
        border: 1px solid #e6eaf3;
        border-radius: 11px;
        background: #f8faff;
        color: #475569;
        font-size: 13px;
        line-height: 1.75;
        overflow-wrap: anywhere;
    }

    .result > p strong {
        color: #273b70;
        font-weight: 800;
    }

    /* Correct answer row */

    .result > p:nth-of-type(3) {
        border-color: #d6e9ff;
        background: linear-gradient(
            120deg,
            #eff6ff,
            #f8faff
        );
    }

    /* =========================================
       EXPLANATION PANEL
    ========================================= */

    .explanation {
        margin-top: 15px;
        padding: 17px 19px;
        border: 1px solid #dbe3ff;
        border-left: 4px solid #6366f1;
        border-radius: 12px;
        background: linear-gradient(
            135deg,
            #eef2ff,
            #f8faff
        );
        color: #475569;
        font-size: 13px;
        line-height: 1.85;
        overflow-wrap: anywhere;
    }

    .explanation strong {
        display: inline-block;
        margin-bottom: 3px;
        color: #3730a3;
        font-weight: 800;
    }

    /* =========================================
       RESPONSIVE LAYOUT
    ========================================= */

    @media (max-width: 600px) {
        body {
            background-attachment: scroll;
        }

        .nav {
            padding: 15px 17px;
        }

        .brand {
            font-size: 19px;
        }

        main {
            width: calc(100% - 26px);
            margin: 24px auto 40px;
        }

        .summary,
        .result {
            padding: 22px 18px;
            border-radius: 16px;
        }

        .summary {
            margin-bottom: 19px;
        }

        .result {
            margin-bottom: 14px;
        }

        .score {
            font-size: 40px;
        }

        .result h2 {
            font-size: 15px;
        }

        .button {
            width: 100%;
            margin: 9px 0 0;
        }
    }

    /* Accessibility */

    .button:focus-visible,
    .brand:focus-visible {
        outline: 3px solid #a5b4fc;
        outline-offset: 4px;
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            transition-duration: 0.01ms !important;
            animation-duration: 0.01ms !important;
        }

        .result:hover,
        .button:hover {
            transform: none;
        }
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
        <a class="mr-page-back" href="{{ route('student.dashboard') }}">← Back to Dashboard</a>
    </nav>
</header>



<main>
    <section class="summary">
        <div class="label">QUIZ COMPLETED</div>
        <h1>{{ $subject->name }} Results</h1>

        <div class="score">{{ $score }} / {{ $total }}</div>

        <p class="muted">
            You answered {{ $score }} out of {{ $total }} questions correctly.
            Your score is {{ $total > 0 ? round(($score / $total) * 100) : 0 }}%.
        </p>

        <a class="button" href="{{ route('quiz.show', $subject->slug) }}">
            Try Again
        </a>

        <a class="button" href="{{ route('home') }}">
            All Subjects
        </a>
    </section>

    @foreach ($results as $index => $item)
        <section class="result">
            <h2>
                Question {{ $index + 1 }}:
                {{ $item['question']->question_text }}
            </h2>

            @if ($item['isCorrect'])
                <p class="correct">✓ Correct answer</p>
            @else
                <p class="incorrect">✗ Incorrect or unanswered</p>
            @endif

            <p>
                <strong>Your answer:</strong>
                {{ $item['selectedOption']?->option_text ?? 'Not answered' }}
            </p>

            <p>
                <strong>Correct answer:</strong>
                {{ $item['correctOption']?->option_text ?? 'No correct answer configured' }}
            </p>

            @if ($item['question']->explanation)
                <div class="explanation">
                    <strong>Explanation:</strong>
                    {{ $item['question']->explanation }}
                </div>
            @endif
        </section>
    @endforeach
</main>
</body>
</html>
