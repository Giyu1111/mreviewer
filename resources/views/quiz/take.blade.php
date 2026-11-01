
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Reviewer | Mobile Reviewer</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 24px 16px;
            font-family: 'Inter', sans-serif;
            background: #f3f6f8;
            color: #263238;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 3px 12px rgba(0,0,0,.06);
        }

        h1 { color: #0b5231; margin-top: 0; }

        .muted {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .progress-track {
            height: 8px;
            background: #e2e8f0;
            border-radius: 20px;
            overflow: hidden;
            margin-top: 10px;
        }

        .progress-fill {
            height: 100%;
            background: #0b5231;
        }

        .question-number {
            color: #0b5231;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .question-text {
            margin: 18px 0;
            font-size: 20px;
            font-weight: bold;
            line-height: 1.6;
        }

        .options {
            display: grid;
            gap: 12px;
        }

        .option {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 15px;
            border: 1px solid #dce4df;
            border-radius: 10px;
            line-height: 1.6;
        }

        label.option { cursor: pointer; }

        label.option:hover {
            background: #f1f8f3;
            border-color: #0b5231;
        }

        .option input {
            margin-top: 5px;
            accent-color: #0b5231;
        }

        .option.correct {
            background: #e8f7ed;
            border: 2px solid #16a34a;
            color: #14532d;
        }

        .option.incorrect {
            background: #fef0f0;
            border: 2px solid #dc2626;
            color: #991b1b;
        }

        .option.locked { cursor: default; }

        .option-text { flex: 1; overflow-wrap: anywhere; }

        .feedback {
            margin-top: 22px;
            padding: 18px;
            border-radius: 10px;
            line-height: 1.6;
        }

        .feedback.correct {
            background: #e8f7ed;
            color: #14532d;
        }

        .feedback.incorrect {
            background: #fef0f0;
            color: #991b1b;
        }

        .correct-answer {
            padding: 12px;
            margin-top: 12px;
            background: white;
            border-radius: 8px;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 13px 22px;
            min-height: 46px;
            border: 0;
            border-radius: 9px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .primary {
            background: #0b5231;
            color: white;
        }

        .secondary {
            background: #e8eeea;
            color: #263238;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .notice {
            padding: 14px;
            margin-bottom: 15px;
            background: #fff4e5;
            color: #7a4b00;
            border-radius: 9px;
        }

        @media(max-width: 600px) {
            body { padding: 14px 10px; }
            .card { padding: 18px; }
            .question-text { font-size: 18px; }
            .button { width: 100%; }
            .actions { flex-direction: column; }
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

<!-- Modern quiz typography -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

<style id="mobile-reviewer-premium-quiz-design">

    /* =========================================
       GLOBAL QUIZ PAGE DESIGN
    ========================================= */

    :root {
        --quiz-primary: #4f46e5;
        --quiz-primary-dark: #3730a3;
        --quiz-blue: #2563eb;
        --quiz-text: #172033;
        --quiz-muted: #64748b;
        --quiz-border: #e2e8f0;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        min-height: 100vh;
        padding: 38px 18px;
        font-family: 'DM Sans', sans-serif !important;
        color: var(--quiz-text);
        background:
            radial-gradient(
                ellipse at 7% 8%,
                rgba(129, 140, 248, 0.17),
                transparent 33%
            ),
            radial-gradient(
                ellipse at 94% 28%,
                rgba(96, 165, 250, 0.14),
                transparent 34%
            ),
            radial-gradient(
                ellipse at 48% 100%,
                rgba(167, 139, 250, 0.12),
                transparent 35%
            ),
            linear-gradient(
                135deg,
                #f8faff 0%,
                #eef2ff 43%,
                #f5f3ff 75%,
                #f8fafc 100%
            );
        background-attachment: fixed;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    h1,
    h2,
    h3 {
        font-family: 'Space Grotesk', sans-serif !important;
    }

    /* =========================================
       MAIN LAYOUT
    ========================================= */

    .container {
        width: min(820px, 100%);
        max-width: 820px;
        margin: 0 auto;
    }

    .card {
        margin-bottom: 23px;
        padding: 30px;
        border: 1px solid rgba(221, 228, 245, 0.95);
        border-radius: 21px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow:
            0 12px 32px rgba(49, 46, 129, 0.055),
            0 3px 8px rgba(15, 23, 42, 0.025),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    /* =========================================
       QUIZ HEADER
    ========================================= */

    .container > section.card:first-of-type {
        position: relative;
        overflow: hidden;
        border-color: #dbe3ff;
        background:
            radial-gradient(
                ellipse at 95% 5%,
                rgba(129, 140, 248, 0.21),
                transparent 40%
            ),
            linear-gradient(
                135deg,
                #eaf0ff 0%,
                #ffffff 65%,
                #f5f3ff 100%
            );
        box-shadow:
            0 12px 30px rgba(79, 70, 229, 0.07),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    .container > section.card:first-of-type::before {
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

    h1 {
        margin: 0 0 15px;
        color: #172554;
        font-size: clamp(27px, 4vw, 34px);
        font-weight: 700;
        letter-spacing: -1.1px;
        line-height: 1.25;
    }

    .muted {
        color: #64748b;
        font-size: 13px;
        line-height: 1.8;
    }

    /* =========================================
       PROGRESS INDICATOR
    ========================================= */

    .progress-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-top: 25px;
        color: #475569;
        font-size: 12px;
        font-weight: 750;
    }

    .progress-info span:last-child {
        color: #4338ca;
        font-weight: 800;
    }

    .progress-track {
        height: 11px;
        margin-top: 12px;
        overflow: hidden;
        border: 1px solid #e0e7ff;
        border-radius: 999px;
        background: #e8edff;
        box-shadow: inset 0 2px 4px rgba(49, 46, 129, 0.06);
    }

    .progress-fill {
        min-width: 0;
        height: 100%;
        border-radius: inherit;
        background: linear-gradient(
            90deg,
            #4338ca,
            #4f46e5,
            #818cf8,
            #60a5fa
        );
        box-shadow: 0 0 10px rgba(99, 102, 241, 0.25);
        transition: width 0.5s ease;
    }

    /* =========================================
       QUESTION CARD
    ========================================= */

    .container > section.card:last-of-type {
        position: relative;
        overflow: hidden;
        border-color: #e0e7ff;
        background:
            radial-gradient(
                ellipse at 100% 0%,
                rgba(224, 231, 255, 0.23),
                transparent 36%
            ),
            #ffffff;
        box-shadow:
            0 17px 40px rgba(49, 46, 129, 0.065),
            0 4px 10px rgba(15, 23, 42, 0.025);
    }

    /* Question number */

    .question-number {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 13px;
        border: 1px solid #c7d2fe;
        border-radius: 999px;
        background: linear-gradient(
            135deg,
            #e0e7ff,
            #eef2ff
        );
        color: #4338ca;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 10px;
        font-weight: 850;
        letter-spacing: 0.8px;
    }

    .question-number::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
    }

    /* Question text */

    .question-text {
        margin: 25px 0 27px;
        color: #172554;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: clamp(20px, 3vw, 24px);
        font-weight: 650;
        line-height: 1.55;
        letter-spacing: -0.45px;
        overflow-wrap: anywhere;
    }

    /* =========================================
       ANSWER CHOICES
    ========================================= */

    .options {
        display: grid;
        gap: 13px;
    }

    .option {
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: 14px;
        min-width: 0;
        padding: 17px 18px;
        border: 1px solid #dfe5f0;
        border-radius: 13px;
        background: linear-gradient(
            135deg,
            #ffffff,
            #fafbff
        );
        color: #334155;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        font-weight: 550;
        line-height: 1.75;
        box-shadow: 0 2px 6px rgba(15, 23, 42, 0.025);
        transition:
            background 0.2s ease,
            border-color 0.2s ease,
            box-shadow 0.2s ease,
            transform 0.2s ease;
    }

    label.option {
        cursor: pointer;
    }

    label.option:hover {
        transform: translateY(-2px);
        border-color: #a5b4fc;
        background: linear-gradient(
            135deg,
            #eef2ff,
            #f8faff
        );
        box-shadow: 0 7px 16px rgba(79, 70, 229, 0.075);
    }

    /* Radio control */

    .option input {
        width: 17px;
        height: 17px;
        flex: 0 0 17px;
        margin: 4px 0 0;
        accent-color: #4f46e5;
        cursor: pointer;
    }

    .option input:focus-visible {
        outline: 3px solid rgba(99, 102, 241, 0.25);
        outline-offset: 3px;
    }

    /* Selected answer */

    label.option:has(input:checked) {
        border: 2px solid #6366f1;
        padding: 16px 17px;
        background: linear-gradient(
            135deg,
            #e0e7ff,
            #f0f4ff
        );
        color: #312e81;
        box-shadow:
            0 7px 17px rgba(79, 70, 229, 0.10),
            inset 0 0 0 1px rgba(129, 140, 248, 0.08);
    }

    .option-text {
        flex: 1;
        min-width: 0;
        overflow-wrap: anywhere;
    }

    /* =========================================
       LOCKED ANSWER STATES
    ========================================= */

    .option.locked {
        cursor: default;
        transform: none;
    }

    .option.correct {
        border: 1px solid #86d9a5;
        background: linear-gradient(
            135deg,
            #dcfce7,
            #f0fdf4
        );
        color: #166534;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.055);
    }

    .option.incorrect {
        border: 1px solid #f5aaaa;
        background: linear-gradient(
            135deg,
            #fee2e2,
            #fff1f2
        );
        color: #991b1b;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.05);
    }

    .option strong {
        flex: 0 0 auto;
        font-size: 11px;
        font-weight: 850;
        text-align: right;
    }

    /* =========================================
       FEEDBACK
    ========================================= */

    .feedback {
        margin-top: 26px;
        padding: 23px;
        border: 1px solid transparent;
        border-radius: 16px;
        line-height: 1.8;
        animation: quizFeedbackIn 0.3s ease both;
    }

    .feedback h3 {
        margin: 0 0 10px;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -0.4px;
    }

    .feedback p {
        margin: 8px 0;
        font-size: 13px;
    }

    .feedback.correct {
        border-color: #bbf7d0;
        background: linear-gradient(
            135deg,
            #dcfce7,
            #f0fdf4
        );
        color: #166534;
    }

    .feedback.incorrect {
        border-color: #fecaca;
        background: linear-gradient(
            135deg,
            #fee2e2,
            #fff7f7
        );
        color: #991b1b;
    }

    .correct-answer {
        margin-top: 17px;
        padding: 15px 17px;
        border: 1px solid rgba(134, 239, 172, 0.6);
        border-radius: 11px;
        background: rgba(255, 255, 255, 0.78);
        color: #14532d;
        font-size: 13px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    .feedback.incorrect .correct-answer {
        border-color: #fecaca;
        color: #7f1d1d;
    }

    /* =========================================
       ACTION BUTTONS
    ========================================= */

    .actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
        margin-top: 25px;
    }

    .button {
        position: relative;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 9px;
        min-height: 48px;
        padding: 13px 23px;
        overflow: hidden;
        border: 1px solid transparent;
        border-radius: 11px;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        cursor: pointer;
        transition:
            transform 0.23s ease,
            box-shadow 0.23s ease,
            background 0.23s ease,
            border-color 0.23s ease;
    }

    .primary {
        background: linear-gradient(
            120deg,
            #4338ca,
            #4f46e5,
            #6366f1
        );
        border-color: #4f46e5;
        color: #ffffff;
        box-shadow:
            0 6px 15px rgba(79, 70, 229, 0.19),
            inset 0 1px 0 rgba(255, 255, 255, 0.16);
    }

    .primary:hover {
        transform: translateY(-3px);
        background: linear-gradient(
            120deg,
            #3730a3,
            #4338ca,
            #4f46e5
        );
        color: #ffffff;
        box-shadow:
            0 13px 24px rgba(79, 70, 229, 0.24),
            0 4px 8px rgba(79, 70, 229, 0.10);
    }

    .primary:active {
        transform: translateY(-1px) scale(0.98);
    }

    .secondary {
        border: 1px solid #dbe3f2;
        background: linear-gradient(
            135deg,
            #ffffff,
            #f3f5ff
        );
        color: #475569;
        box-shadow: 0 3px 8px rgba(15, 23, 42, 0.035);
    }

    .secondary:hover {
        transform: translateY(-2px);
        border-color: #a5b4fc;
        background: linear-gradient(
            135deg,
            #eef2ff,
            #ffffff
        );
        color: #3730a3;
        box-shadow: 0 7px 16px rgba(79, 70, 229, 0.09);
    }

    /* =========================================
       VALIDATION NOTICE
    ========================================= */

    .notice {
        padding: 17px 19px;
        margin-bottom: 18px;
        border: 1px solid #fde68a;
        border-left: 4px solid #f59e0b;
        border-radius: 12px;
        background: linear-gradient(
            135deg,
            #fffbeb,
            #fff7ed
        );
        color: #92400e;
        font-size: 13px;
        line-height: 1.75;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.045);
    }

    /* =========================================
       FEEDBACK ANIMATION
    ========================================= */

    @keyframes quizFeedbackIn {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* =========================================
       FOCUS AND ACCESSIBILITY
    ========================================= */

    .button:focus-visible {
        outline: 3px solid #a5b4fc;
        outline-offset: 4px;
    }

    /* =========================================
       TABLET AND MOBILE
    ========================================= */

    @media (max-width: 700px) {
        body {
            padding: 23px 14px;
            background-attachment: scroll;
        }

        .card {
            padding: 23px;
            border-radius: 17px;
        }

        .question-text {
            font-size: 20px;
        }

        .option {
            padding: 15px;
            font-size: 13px;
        }

        .option.correct,
        .option.incorrect,
        label.option:has(input:checked) {
            padding: 14px;
        }

        .feedback {
            padding: 19px;
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 17px 11px;
        }

        .card {
            padding: 19px 16px;
        }

        h1 {
            font-size: 27px;
        }

        .progress-info {
            font-size: 11px;
        }

        .question-text {
            margin: 21px 0;
            font-size: 19px;
        }

        .option {
            gap: 10px;
            padding: 14px 12px;
            font-size: 12px;
        }

        .option.correct,
        .option.incorrect,
        label.option:has(input:checked) {
            padding: 13px 11px;
        }

        .option strong {
            font-size: 10px;
        }

        .actions {
            flex-direction: column;
            align-items: stretch;
        }

        .actions .button {
            width: 100%;
        }
    }

    /* Reduced motion */

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            transition-duration: 0.01ms !important;
        }

        .button:hover,
        label.option:hover {
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
        <a class="mr-page-back" href="{{ route('subjects.show', $attempt->lesson->subject->slug) }}">← Back to Lessons</a>
    </nav>
</header>

@php
    $isAnswered = $answer->answered_at !== null;

    $correctOption = $answer->question->options
        ->firstWhere('is_correct', true);

    // Restore the randomized option order saved for this attempt.
    $optionMap = $answer->question->options->keyBy('id');

    $displayOptions = collect($answer->option_order ?? [])
        ->map(fn ($id) => $optionMap->get($id))
        ->filter()
        ->values();

    $percentage = $totalQuestions > 0
        ? round(($answeredCount / $totalQuestions) * 100)
        : 0;
@endphp

<main class="container">

    <section class="card">
        <h1>Lesson Reviewer</h1>

        <p class="muted">
            {{ $attempt->lesson->subject->code }}
            — {{ $attempt->lesson->subject->name }}
        </p>

        <p class="muted">
            Lesson: {{ $attempt->lesson->title }}
        </p>

        <div class="progress-info">
            <span>
                Question {{ $answer->question_order }}
                of {{ $totalQuestions }}
            </span>

            <span>{{ $percentage }}% completed</span>
        </div>

        <div class="progress-track">
            <div class="progress-fill"
                 style="width: {{ $percentage }}%;">
            </div>
        </div>
    </section>

    @if ($errors->any())
        <div class="notice">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <section class="card">

        <div class="question-number">
            QUESTION {{ $answer->question_order }}
        </div>

        <div class="question-text">
            {{ $answer->question->question_text }}
        </div>

        @if (!$isAnswered)

            <form
                method="POST"
                action="{{ route('quiz.submit-answer', $attempt) }}"
            >
                @csrf

                <input type="hidden"
                       name="question_id"
                       value="{{ $answer->question_id }}">

                <div class="options">
                    @foreach ($displayOptions as $option)
                        <label class="option">
                            <input
                                type="radio"
                                name="selected_option_id"
                                value="{{ $option->id }}"
                                required
                            >

                            <span class="option-text">
                                {{ chr(65 + $loop->index) }}.
                                {{ $option->option_text }}
                            </span>
                        </label>
                    @endforeach
                </div>

                <div class="actions">
                    <button type="submit" class="button primary">
                        Submit Answer
                    </button>
                </div>
            </form>

        @else

            <div class="options">
                @foreach ($displayOptions as $option)
                    @php
                        $isSelected =
                            (int) $answer->selected_option_id
                            === (int) $option->id;

                        $isCorrectOption = (bool) $option->is_correct;
                    @endphp

                    <div class="option locked
                        {{ $isCorrectOption ? 'correct' : '' }}
                        {{ $isSelected && !$isCorrectOption ? 'incorrect' : '' }}">

                        <span class="option-text">
                            {{ chr(65 + $loop->index) }}.
                            {{ $option->option_text }}
                        </span>

                        @if ($isSelected && $isCorrectOption)
                            <strong>✓ Your answer</strong>
                        @elseif ($isSelected && !$isCorrectOption)
                            <strong>✕ Your answer</strong>
                        @elseif ($isCorrectOption)
                            <strong>✓ Correct answer</strong>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="feedback
                {{ $answer->is_correct ? 'correct' : 'incorrect' }}">

                @if ($answer->is_correct)
                    <h3>Correct Answer!</h3>
                    <p>Excellent! You selected the correct answer.</p>
                @else
                    <h3>Incorrect Answer</h3>
                    <p>Your selected answer is incorrect.</p>
                @endif

                @if ($correctOption)
                    <div class="correct-answer">
                        <strong>Correct Answer:</strong><br>
                        {{ $correctOption->option_text }}
                    </div>
                @endif

                @if ($answer->question->explanation)
                    <p>
                        <strong>Explanation:</strong><br>
                        {{ $answer->question->explanation }}
                    </p>
                @endif
            </div>

            <div class="actions">
                <a href="{{ route('quiz.take', $attempt) }}"
                   class="button primary">

                    @if ($answeredCount >= $totalQuestions)
                        View Final Results
                    @else
                        Next Question
                    @endif
                </a>
            </div>

        @endif
    </section>

    <div class="actions">
        <a href="{{ route('subjects.show', $attempt->lesson->subject->slug) }}"
           class="button secondary">
            Back to Lessons
        </a>
    </div>

</main>
</body>
</html>
