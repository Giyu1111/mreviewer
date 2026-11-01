
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f8fafc">
    <title>{{ $lesson->title }} | Mobile Reviewer</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #172033;
            line-height: 1.7;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .nav-inner {
            max-width: 900px;
            min-height: 65px;
            margin: auto;
            padding: 12px 20px;
            display: flex;
            align-items: center;
        }

        .back {
            color: #4f46e5;
            font-weight: 800;
            text-decoration: none;
        }

        .container {
            width: min(850px, calc(100% - 32px));
            margin: 30px auto;
        }

        .lesson-card {
            padding: 28px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
        }

        .code {
            display: inline-block;
            padding: 5px 10px;
            background: #e0e7ff;
            color: #3730a3;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 800;
        }

        h1 {
            font-size: clamp(25px, 5vw, 34px);
            line-height: 1.3;
            margin: 14px 0 8px;
        }

        h2 {
            font-size: 19px;
            margin-top: 28px;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
        }

        .content {
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .file-box {
            padding: 18px;
            margin-top: 18px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow-wrap: anywhere;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 44px;
            margin-top: 10px;
            padding: 11px 16px;
            border-radius: 9px;
            background: #4f46e5;
            color: white;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }

        .button:hover { background: #3730a3; }

        .notice {
            padding: 14px;
            background: #eef2ff;
            border-radius: 10px;
            color: #3730a3;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .nav-inner { padding: 12px 16px; }
            .container { margin-top: 18px; }
            .lesson-card { padding: 20px; }
        }

.file-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 16px;
}

.file-actions .button {
    margin-top: 0;
}
@media (max-width: 600px) {
    .file-actions .button {
        flex: 1 1 100%;
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

<!-- Modern typography -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

<style id="student-lesson-premium-design">

    /* =========================================
       GLOBAL PAGE DESIGN
    ========================================= */

    html {
        scroll-behavior: smooth;
    }

    body {
        min-height: 100vh;
        font-family: 'DM Sans', sans-serif !important;
        color: #172033;
        background:
            radial-gradient(
                ellipse at 8% 12%,
                rgba(129, 140, 248, 0.15),
                transparent 32%
            ),
            radial-gradient(
                ellipse at 92% 38%,
                rgba(167, 139, 250, 0.13),
                transparent 34%
            ),
            radial-gradient(
                ellipse at 48% 95%,
                rgba(96, 165, 250, 0.10),
                transparent 35%
            ),
            linear-gradient(
                135deg,
                #f8faff 0%,
                #eef2ff 38%,
                #f5f3ff 72%,
                #f8fafc 100%
            );
        background-attachment: fixed;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    h1,
    h2,
    h3,
    .code,
    .back {
        font-family: 'Space Grotesk', sans-serif !important;
    }

    /* =========================================
       NAVIGATION
    ========================================= */

    .navbar {
        position: sticky;
        top: 0;
        z-index: 100;
        background: rgba(255, 255, 255, 0.92);
        border-bottom: 1px solid #e8edf5;
        box-shadow: 0 3px 16px rgba(15, 23, 42, 0.04);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
    }

    .nav-inner {
        max-width: 1050px;
        min-height: 70px;
    }

    .back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #4f46e5;
        font-size: 13px;
        font-weight: 700;
        transition: color 0.2s ease, transform 0.2s ease;
    }

    .back:hover {
        color: #312e81;
        transform: translateX(-3px);
    }

    /* =========================================
       MAIN LESSON CONTAINER
    ========================================= */

    .container {
        width: min(900px, calc(100% - 40px));
        margin: 42px auto;
    }

    .lesson-card {
        position: relative;
        overflow: hidden;
        padding: 36px;
        background: rgba(255, 255, 255, 0.96);
        border: 1px solid #dfe6f5;
        border-radius: 22px;
        box-shadow:
            0 12px 35px rgba(49, 46, 129, 0.065),
            0 2px 5px rgba(15, 23, 42, 0.025);
    }

    .lesson-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(
            90deg,
            #4f46e5,
            #6366f1,
            #818cf8,
            #60a5fa
        );
    }

    /* =========================================
       LESSON IDENTIFICATION
    ========================================= */

    .code {
        display: inline-flex;
        align-items: center;
        padding: 8px 13px;
        border: 1px solid #c7d2fe;
        border-radius: 9px;
        background: linear-gradient(
            135deg,
            #e0e7ff,
            #eef2ff
        );
        color: #4338ca;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.55px;
    }

    h1 {
        margin: 18px 0 9px;
        color: #172554;
        font-size: clamp(27px, 5vw, 36px);
        font-weight: 700;
        line-height: 1.3;
        letter-spacing: -1.2px;
        overflow-wrap: anywhere;
    }

    .muted {
        color: #64748b;
        font-size: 14px;
        line-height: 1.8;
    }

    /* =========================================
       REVIEWER NOTES
    ========================================= */

    .lesson-card > h2 {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 32px;
        margin-bottom: 14px;
        padding-bottom: 12px;
        border-bottom: 1px solid #e8edf5;
        color: #283b70;
        font-size: 19px;
        font-weight: 700;
    }

    .content {
        padding: 23px;
        border: 1px solid #dbeafe;
        border-radius: 14px;
        background: linear-gradient(
            145deg,
            #eff6ff 0%,
            #f8faff 70%,
            #ffffff 100%
        );
        color: #334155;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 14px;
        line-height: 1.95;
        white-space: pre-wrap;
        overflow-wrap: anywhere;
    }

    /* =========================================
       LESSON MATERIAL PANEL
    ========================================= */

    .file-box {
        position: relative;
        overflow: hidden;
        margin-top: 30px;
        padding: 25px;
        border: 1px solid #c7d2fe;
        border-radius: 16px;
        background:
            radial-gradient(
                circle at 95% 5%,
                rgba(129, 140, 248, 0.18),
                transparent 40%
            ),
            linear-gradient(
                135deg,
                #eaf1ff,
                #f4f6ff 60%,
                #ffffff
            );
    }

    .file-box h2 {
        margin: 0 0 12px;
        color: #283b70;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: 19px;
        font-weight: 700;
    }

    .file-box p {
        color: #52647d;
        font-size: 13px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    /* =========================================
       FILE AND QUIZ ACTIONS
    ========================================= */

    .file-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
        margin-top: 22px;
    }

    .button {
        position: relative;
        isolation: isolate;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 9px;
        min-height: 47px;
        margin-top: 10px;
        padding: 12px 21px;
        overflow: hidden;
        border: 1px solid #4f46e5;
        border-radius: 11px;
        background: linear-gradient(
            135deg,
            #4f46e5,
            #6366f1
        );
        color: #ffffff;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        font-weight: 800;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 5px 13px rgba(79, 70, 229, 0.17);
        transition:
            transform 0.23s ease,
            box-shadow 0.23s ease,
            background 0.23s ease,
            border-color 0.23s ease;
    }

    .button:hover {
        transform: translateY(-3px);
        border-color: #3730a3;
        background: linear-gradient(
            135deg,
            #4338ca,
            #4f46e5
        );
        color: #ffffff;
        box-shadow:
            0 12px 23px rgba(79, 70, 229, 0.24),
            0 3px 8px rgba(79, 70, 229, 0.12);
    }

    .button:active {
        transform: translateY(-1px) scale(0.98);
        box-shadow: 0 3px 8px rgba(79, 70, 229, 0.16);
    }

    .file-actions .button {
        margin-top: 0;
        flex: 0 1 auto;
    }

    /* Quiz action forms */

    .lesson-card form {
        margin-top: 25px;
    }

    .lesson-card form button,
    .lesson-card form .button {
        min-height: 49px;
        padding: 13px 23px;
    }

    /* =========================================
       NOTICE PANEL
    ========================================= */

    .notice {
        margin-top: 25px;
        padding: 17px 19px;
        border: 1px solid #c7d2fe;
        border-radius: 12px;
        background: linear-gradient(
            135deg,
            #eef2ff,
            #f8faff
        );
        color: #3730a3;
        font-size: 13px;
        line-height: 1.7;
    }

    /* =========================================
       FOCUS AND ACCESSIBILITY
    ========================================= */

    .button:focus-visible,
    .back:focus-visible {
        outline: 3px solid #a5b4fc;
        outline-offset: 4px;
    }

    /* =========================================
       RESPONSIVE DESIGN
    ========================================= */

    @media (max-width: 700px) {
        body {
            background-attachment: scroll;
        }

        .container {
            width: calc(100% - 30px);
            margin: 24px auto;
        }

        .lesson-card {
            padding: 25px 20px;
            border-radius: 17px;
        }

        .file-box {
            padding: 20px 17px;
        }

        .content {
            padding: 17px;
            font-size: 13px;
        }

        .file-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .file-actions .button {
            width: 100%;
        }

        .lesson-card form button,
        .lesson-card form .button {
            width: 100%;
        }
    }

    /* Reduced motion accessibility */

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            scroll-behavior: auto !important;
            transition-duration: 0.01ms !important;
        }

        .button:hover {
            transform: none;
        }
    }

</style>


<style id="student-lesson-premium-upgrade">

    /* =========================================
       PREMIUM STUDY WORKSPACE
    ========================================= */

    :root {
        --study-primary: #4f46e5;
        --study-primary-dark: #3730a3;
        --study-blue: #2563eb;
        --study-text: #172033;
        --study-muted: #64748b;
        --study-border: #e3e9f5;
    }

    body {
        background:
            radial-gradient(
                circle at 5% 12%,
                rgba(99, 102, 241, 0.16),
                transparent 29%
            ),
            radial-gradient(
                circle at 96% 25%,
                rgba(59, 130, 246, 0.13),
                transparent 31%
            ),
            radial-gradient(
                circle at 50% 100%,
                rgba(167, 139, 250, 0.12),
                transparent 36%
            ),
            linear-gradient(
                135deg,
                #f5f7ff 0%,
                #edf2ff 45%,
                #f8faff 100%
            );
        background-attachment: fixed;
    }

    /* =========================================
       NAVIGATION POLISH
    ========================================= */

    .navbar {
        background: rgba(255, 255, 255, 0.82);
        border-bottom: 1px solid rgba(226, 232, 240, 0.85);
        box-shadow: 0 5px 20px rgba(30, 41, 59, 0.045);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
    }

    .nav-inner {
        min-height: 72px;
    }

    .back {
        padding: 9px 13px;
        border: 1px solid #e0e7ff;
        border-radius: 10px;
        background: rgba(238, 242, 255, 0.8);
        transition: all 0.22s ease;
    }

    .back:hover {
        background: #e0e7ff;
        border-color: #c7d2fe;
        box-shadow: 0 5px 13px rgba(79, 70, 229, 0.09);
    }

    /* =========================================
       READING PANEL
    ========================================= */

    .container {
        width: min(920px, calc(100% - 40px));
        margin: 45px auto;
    }

    .lesson-card {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        padding: clamp(25px, 5vw, 42px);
        border: 1px solid rgba(219, 226, 245, 0.95);
        border-radius: 24px;
        background: rgba(255, 255, 255, 0.90);
        box-shadow:
            0 20px 55px rgba(49, 46, 129, 0.075),
            0 5px 15px rgba(15, 23, 42, 0.035),
            inset 0 1px 0 rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .lesson-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        z-index: -1;
        background: linear-gradient(
            90deg,
            #3730a3 0%,
            #4f46e5 35%,
            #818cf8 70%,
            #60a5fa 100%
        );
    }

    /* =========================================
       LESSON TITLE AREA
    ========================================= */

    .code {
        gap: 7px;
        padding: 8px 14px;
        border: 1px solid #c7d2fe;
        border-radius: 999px;
        background: linear-gradient(
            135deg,
            #e0e7ff,
            #f0f4ff
        );
        color: #3730a3;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.65px;
        box-shadow: 0 3px 8px rgba(79, 70, 229, 0.055);
    }

    .lesson-card > h1 {
        max-width: 760px;
        margin: 21px 0 11px;
        color: #172554;
        font-size: clamp(29px, 5vw, 40px);
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1.5px;
    }

    .lesson-card > .muted {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 3px;
        padding: 8px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        background: #f8fafc;
        color: #64748b;
        font-size: 12px;
        font-weight: 650;
    }

    /* =========================================
       REVIEWER NOTES HEADING
    ========================================= */

    .lesson-card > h2 {
        position: relative;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 37px;
        margin-bottom: 17px;
        padding: 0 0 14px;
        border-bottom: 1px solid #e8edf5;
        color: #25366b;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .lesson-card > h2::before {
        content: "";
        display: block;
        width: 5px;
        height: 25px;
        flex: 0 0 5px;
        border-radius: 10px;
        background: linear-gradient(
            180deg,
            #4f46e5,
            #60a5fa
        );
        box-shadow: 0 3px 8px rgba(79, 70, 229, 0.18);
    }

    /* =========================================
       READING CONTENT
    ========================================= */

    .content {
        position: relative;
        padding: clamp(20px, 3vw, 30px);
        border: 1px solid #dce7fb;
        border-radius: 17px;
        background:
            radial-gradient(
                circle at 100% 0%,
                rgba(191, 219, 254, 0.30),
                transparent 38%
            ),
            linear-gradient(
                145deg,
                #f0f6ff 0%,
                #f8faff 65%,
                #ffffff 100%
            );
        color: #334155;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 14px;
        line-height: 2;
        white-space: pre-wrap;
        overflow-wrap: anywhere;
        box-shadow: inset 0 1px 2px rgba(37, 99, 235, 0.025);
    }

    /* =========================================
       MATERIAL CARD
    ========================================= */

    .file-box {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        margin-top: 34px;
        padding: 28px;
        border: 1px solid #c7d7fc;
        border-radius: 19px;
        background:
            radial-gradient(
                circle at 92% 10%,
                rgba(129, 140, 248, 0.28),
                transparent 37%
            ),
            linear-gradient(
                130deg,
                #e5edff 0%,
                #eef2ff 52%,
                #f8faff 100%
            );
        box-shadow:
            0 9px 24px rgba(79, 70, 229, 0.065),
            inset 0 1px 0 rgba(255, 255, 255, 0.85);
    }

    .file-box::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 4px;
        background: linear-gradient(
            180deg,
            #4f46e5,
            #60a5fa
        );
        z-index: -1;
    }

    .file-box h2 {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 0 0 12px;
        color: #283b70;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .file-box h2::before {
        content: "";
        display: inline-flex;
        width: 38px;
        height: 38px;
        flex: 0 0 38px;
        border: 1px solid #c7d2fe;
        border-radius: 11px;
        background:
            linear-gradient(
                135deg,
                #ffffff,
                #dbeafe
            );
        box-shadow: 0 4px 10px rgba(79, 70, 229, 0.09);
    }

    .file-box p {
        color: #52647d;
        font-size: 13px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    /* =========================================
       BUTTON DESIGN
    ========================================= */

    .button {
        position: relative;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 9px;
        min-height: 49px;
        padding: 13px 22px;
        overflow: hidden;
        border: 1px solid #4f46e5;
        border-radius: 12px;
        background: linear-gradient(
            120deg,
            #4338ca,
            #4f46e5 55%,
            #6366f1
        );
        color: #ffffff;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        cursor: pointer;
        box-shadow:
            0 6px 15px rgba(79, 70, 229, 0.17),
            inset 0 1px 0 rgba(255, 255, 255, 0.16);
        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease,
            filter 0.25s ease;
    }

    .button::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -85%;
        width: 45%;
        height: 200%;
        transform: rotate(24deg);
        background: rgba(255, 255, 255, 0.18);
        transition: left 0.45s ease;
        pointer-events: none;
    }

    .button:hover::before {
        left: 140%;
    }

    .button:hover {
        transform: translateY(-3px);
        filter: brightness(1.07);
        color: #ffffff;
        box-shadow:
            0 13px 25px rgba(79, 70, 229, 0.24),
            0 4px 10px rgba(79, 70, 229, 0.12);
    }

    .button:active {
        transform: translateY(-1px) scale(0.98);
        box-shadow: 0 4px 10px rgba(79, 70, 229, 0.16);
    }

    .file-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 13px;
        margin-top: 23px;
    }

    .file-actions .button {
        margin-top: 0;
        min-width: 145px;
    }

    /* =========================================
       GENERATE QUIZ ACTION
    ========================================= */

    .lesson-card > form {
        margin-top: 25px;
        padding: 20px 21px;
        border: 1px solid #e0e7ff;
        border-radius: 15px;
        background: linear-gradient(
            135deg,
            #f0f4ff 0%,
            #f8faff 65%,
            #ffffff 100%
        );
    }

    .lesson-card > form button,
    .lesson-card > form .button {
        min-height: 49px;
        padding: 13px 22px;
        border-radius: 12px;
        background: linear-gradient(
            120deg,
            #3730a3,
            #4f46e5,
            #6366f1
        );
        color: #ffffff;
    }

    .lesson-card > form button:hover,
    .lesson-card > form .button:hover {
        background: linear-gradient(
            120deg,
            #312e81,
            #4338ca,
            #4f46e5
        );
        color: #ffffff;
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(79, 70, 229, 0.22);
    }

    /* =========================================
       EMPTY CONTENT NOTICE
    ========================================= */

    .notice {
        margin-top: 25px;
        padding: 18px 20px;
        border: 1px solid #c7d2fe;
        border-left: 4px solid #6366f1;
        border-radius: 13px;
        background: linear-gradient(
            120deg,
            #eef2ff,
            #f8faff
        );
        color: #3730a3;
        font-size: 13px;
        line-height: 1.8;
    }

    /* =========================================
       RESPONSIVE DESIGN
    ========================================= */

    @media (max-width: 700px) {
        body {
            background-attachment: scroll;
        }

        .container {
            width: calc(100% - 28px);
            margin: 24px auto;
        }

        .lesson-card {
            padding: 24px 19px;
            border-radius: 18px;
        }

        .lesson-card > h1 {
            font-size: 29px;
            letter-spacing: -0.9px;
        }

        .lesson-card > h2 {
            margin-top: 29px;
            font-size: 18px;
        }

        .content {
            padding: 19px;
            font-size: 13px;
            line-height: 1.9;
        }

        .file-box {
            padding: 23px 18px;
            border-radius: 15px;
        }

        .file-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .file-actions .button,
        .lesson-card > form button,
        .lesson-card > form .button {
            width: 100%;
        }

        .lesson-card > form {
            padding: 17px;
        }
    }

    /* Accessibility */

    .button:focus-visible {
        outline: 3px solid #a5b4fc;
        outline-offset: 4px;
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            transition-duration: 0.01ms !important;
        }

        .button:hover {
            transform: none;
        }
    }

</style>


<style id="student-lesson-advanced-polish">

    /* =========================================
       ADVANCED STUDY WORKSPACE DESIGN
    ========================================= */

    :root {
        --lesson-indigo: #4f46e5;
        --lesson-blue: #2563eb;
        --lesson-dark: #172554;
        --lesson-text: #334155;
        --lesson-muted: #64748b;
    }

    /* Enhanced page atmosphere */

    body {
        background:
            radial-gradient(
                ellipse at 5% 5%,
                rgba(99, 102, 241, 0.18),
                transparent 34%
            ),
            radial-gradient(
                ellipse at 100% 25%,
                rgba(59, 130, 246, 0.15),
                transparent 32%
            ),
            radial-gradient(
                ellipse at 45% 100%,
                rgba(167, 139, 250, 0.14),
                transparent 38%
            ),
            linear-gradient(
                135deg,
                #f5f7ff 0%,
                #edf2ff 45%,
                #f8faff 100%
            );
    }

    /* =========================================
       READING PANEL
    ========================================= */

    .lesson-card {
        border: 1px solid rgba(203, 213, 245, 0.95);
        border-radius: 25px;
        background:
            radial-gradient(
                ellipse at 100% 0%,
                rgba(224, 231, 255, 0.24),
                transparent 35%
            ),
            rgba(255, 255, 255, 0.94);
        box-shadow:
            0 25px 65px rgba(49, 46, 129, 0.085),
            0 8px 20px rgba(15, 23, 42, 0.035),
            inset 0 1px 0 rgba(255, 255, 255, 0.95);
    }

    .lesson-card::before {
        height: 6px;
        background: linear-gradient(
            90deg,
            #312e81 0%,
            #4f46e5 30%,
            #818cf8 68%,
            #60a5fa 100%
        );
    }

    .lesson-card::after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 290px;
        height: 230px;
        z-index: -1;
        pointer-events: none;
        background: radial-gradient(
            ellipse at top right,
            rgba(129, 140, 248, 0.13),
            transparent 70%
        );
    }

    /* =========================================
       LESSON HEADING
    ========================================= */

    .lesson-card > .code {
        padding: 9px 15px;
        border: 1px solid #c7d2fe;
        border-radius: 999px;
        background: linear-gradient(
            110deg,
            #e0e7ff,
            #f0f4ff
        );
        color: #3730a3;
        font-size: 10px;
        letter-spacing: 0.9px;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.07);
    }

    .lesson-card > h1 {
        max-width: 720px;
        margin-top: 23px;
        margin-bottom: 12px;
        color: #172554;
        font-size: clamp(30px, 5vw, 42px);
        font-weight: 700;
        line-height: 1.18;
        letter-spacing: -1.7px;
    }

    .lesson-card > .muted {
        padding: 9px 13px;
        border-color: #e0e7ff;
        background: linear-gradient(
            120deg,
            #f1f5ff,
            #fafaff
        );
        color: #596b91;
        font-size: 12px;
    }

    /* =========================================
       REVIEWER NOTES
    ========================================= */

    .lesson-card > h2 {
        margin-top: 42px;
        margin-bottom: 19px;
        padding-bottom: 15px;
        border-bottom-color: #e4e9f5;
        color: #293b70;
        font-size: 21px;
        font-weight: 700;
        letter-spacing: -0.65px;
    }

    .lesson-card > h2::before {
        width: 5px;
        height: 29px;
        border-radius: 10px;
        background: linear-gradient(
            180deg,
            #4338ca,
            #60a5fa
        );
        box-shadow: 0 4px 10px rgba(79, 70, 229, 0.19);
    }

    .content {
        padding: clamp(23px, 4vw, 34px);
        border: 1px solid #dbe6fc;
        border-radius: 18px;
        background:
            radial-gradient(
                circle at 100% 0%,
                rgba(191, 219, 254, 0.26),
                transparent 40%
            ),
            linear-gradient(
                145deg,
                #edf4ff,
                #f7f9ff 65%,
                #ffffff
            );
        color: #334155;
        font-size: 14px;
        line-height: 2.05;
        box-shadow:
            0 5px 18px rgba(37, 99, 235, 0.035),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    /* =========================================
       LESSON MATERIAL SECTION
    ========================================= */

    .file-box {
        margin-top: 38px;
        padding: 30px;
        border: 1px solid #c7d2fe;
        border-radius: 21px;
        background:
            radial-gradient(
                ellipse at 95% 5%,
                rgba(129, 140, 248, 0.25),
                transparent 40%
            ),
            radial-gradient(
                ellipse at 0% 100%,
                rgba(96, 165, 250, 0.12),
                transparent 40%
            ),
            linear-gradient(
                130deg,
                #e6edff,
                #f0f3ff 60%,
                #ffffff
            );
        box-shadow:
            0 12px 28px rgba(79, 70, 229, 0.075),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    .file-box h2 {
        gap: 13px;
        margin-bottom: 15px;
        color: #283b70;
        font-size: 21px;
        font-weight: 700;
        letter-spacing: -0.6px;
    }

    .file-box h2::before {
        content: "▤";
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        flex: 0 0 44px;
        border: 1px solid #c7d2fe;
        border-radius: 13px;
        background: linear-gradient(
            145deg,
            #ffffff,
            #dbeafe
        );
        color: #4f46e5;
        font-family: 'DM Sans', sans-serif;
        font-size: 23px;
        box-shadow: 0 5px 12px rgba(79, 70, 229, 0.09);
    }

    .file-box p {
        color: #52647d;
        font-size: 13px;
        line-height: 1.85;
    }

    /* =========================================
       BUTTONS - GENERAL
    ========================================= */

    .button {
        min-height: 51px;
        padding: 13px 24px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 0.05px;
        box-shadow:
            0 6px 15px rgba(79, 70, 229, 0.17),
            inset 0 1px 0 rgba(255, 255, 255, 0.16);
    }

    .button:hover {
        transform: translateY(-4px);
        box-shadow:
            0 15px 28px rgba(79, 70, 229, 0.25),
            0 4px 10px rgba(79, 70, 229, 0.1);
    }

    .file-actions .button {
        flex: 0 1 auto;
        min-width: 165px;
    }

    /* Open File */

    .file-actions a.button {
        background: linear-gradient(
            120deg,
            #2563eb,
            #4f46e5
        );
        border-color: #2563eb;
    }

    .file-actions a.button:hover {
        background: linear-gradient(
            120deg,
            #1d4ed8,
            #4338ca
        );
        border-color: #1d4ed8;
    }

    .file-actions a.button::after {
        content: "↗";
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 23px;
        height: 23px;
        border-radius: 7px;
        background: rgba(255, 255, 255, 0.15);
        font-size: 15px;
        transition: transform 0.22s ease;
    }

    .file-actions a.button:hover::after {
        transform: translate(2px, -2px);
    }

    /* Generate Quiz */

    .lesson-card form button[type="submit"],
    .lesson-card form .button {
        background: linear-gradient(
            120deg,
            #4338ca,
            #6366f1,
            #7c3aed
        );
        border-color: #6366f1;
        box-shadow:
            0 7px 17px rgba(99, 102, 241, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.15);
    }

    .lesson-card form button[type="submit"]:hover,
    .lesson-card form .button:hover {
        background: linear-gradient(
            120deg,
            #3730a3,
            #4f46e5,
            #6d28d9
        );
        border-color: #4338ca;
        box-shadow: 0 14px 26px rgba(79, 70, 229, 0.26);
    }

    /* =========================================
       QUIZ ACTION CONTAINER
    ========================================= */

    .lesson-card > form {
        margin-top: 30px;
        padding: 24px;
        border: 1px solid #dbe3ff;
        border-radius: 17px;
        background:
            radial-gradient(
                ellipse at 100% 0%,
                rgba(196, 181, 253, 0.23),
                transparent 40%
            ),
            linear-gradient(
                135deg,
                #edf1ff,
                #f8faff 75%,
                #ffffff
            );
        box-shadow: 0 6px 18px rgba(79, 70, 229, 0.045);
    }

    /* =========================================
       NOTICE
    ========================================= */

    .notice {
        margin-top: 28px;
        padding: 20px 22px;
        border: 1px solid #c7d2fe;
        border-left: 5px solid #6366f1;
        border-radius: 14px;
        background: linear-gradient(
            125deg,
            #eef2ff,
            #f8faff
        );
        color: #3730a3;
        font-size: 13px;
        line-height: 1.8;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.04);
    }

    /* =========================================
       RESPONSIVE IMPROVEMENTS
    ========================================= */

    @media (max-width: 700px) {
        body {
            background-attachment: scroll;
        }

        .container {
            width: calc(100% - 26px);
            margin: 23px auto;
        }

        .lesson-card {
            padding: 24px 18px;
            border-radius: 19px;
        }

        .lesson-card > h1 {
            font-size: 30px;
            letter-spacing: -1px;
        }

        .lesson-card > h2 {
            margin-top: 32px;
            font-size: 19px;
        }

        .content {
            padding: 20px 17px;
            font-size: 13px;
            line-height: 1.9;
        }

        .file-box {
            padding: 23px 17px;
            border-radius: 17px;
        }

        .file-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .file-actions .button {
            width: 100%;
        }

        .lesson-card > form {
            padding: 19px 16px;
        }

        .lesson-card form button[type="submit"],
        .lesson-card form .button {
            width: 100%;
        }
    }

    @media (max-width: 380px) {
        .lesson-card > h1 {
            font-size: 26px;
        }

        .file-box h2 {
            font-size: 18px;
        }

        .button {
            padding: 12px 16px;
        }
    }

    /* Accessibility */

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            transition-duration: 0.01ms !important;
            animation-duration: 0.01ms !important;
        }

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
        <a class="mr-page-back" href="{{ route('subjects.show', ['slug' => $subject->slug]) }}">← Back to {{ $subject->code }} Lessons</a>
    </nav>
</header>



    <main class="container">
        <article class="lesson-card">
            <span class="code">
                {{ $subject->code }} · LESSON {{ $lesson->lesson_number }}
            </span>

            <h1>{{ $lesson->title }}</h1>

            <p class="muted">
                {{ $subject->name }}
            </p>

            @if ($lesson->content)
                <h2>Reviewer Notes</h2>

                <div class="content">{{ $lesson->content }}</div>
            @endif


@if ($lesson->material_path)
    <section class="file-box">
        <h2 style="margin-top: 0;">Lesson Material</h2>

        <p>
            {{ $lesson->material_original_name ?: 'Lesson material' }}
        </p>

        <p class="muted">
            Open your instructor's uploaded file.
        </p>

        <div class="file-actions">
            <a
                class="button"
                href="{{ route('lesson-materials.open', [
                    'lesson' => $lesson->id
                ]) }}"
                target="_blank"
                rel="noopener"
            >
                Open File
            </a>

        </div>
    </section>



            @endif

            @unless ($lesson->content || $lesson->material_path)
                <p class="notice">
                    Your instructor has not added reviewer notes or a file yet.
                </p>
            @endunless

            <section>
                <h2>Practice Quiz</h2>

                @if ($errors->has('quiz'))
                    <p class="notice" role="alert">
                        {{ $errors->first('quiz') }}
                    </p>
                @elseif ($lesson->active_questions_count > 0)
                    <p class="muted">
    Your instructor has prepared
    {{ $lesson->active_questions_count }}
    reviewer questions for this lesson.
</p>

                    <form
                        method="POST"
                        action="{{ route('quiz.start', [
                            'slug' => $subject->slug,
                            'lessonNumber' => $lesson->lesson_number
                        ]) }}"
                    >
                        @csrf
                        <button class="button" type="submit">Start Quiz</button>
                    </form>
                @else
                    <p class="muted">
                        Your instructor is preparing this lesson's quiz.
                    </p>
                @endif
            </section>
        </article>
    </main>
</body>
</html>
