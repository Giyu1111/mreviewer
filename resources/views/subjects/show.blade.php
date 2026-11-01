
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f8fafc">
    <title>{{ $subject->code }} | Mobile Reviewer</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #172033;
            line-height: 1.6;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .nav-inner {
            max-width: 1000px;
            min-height: 65px;
            padding: 12px 20px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .brand, .back {
            color: #4f46e5;
            font-weight: 800;
            text-decoration: none;
        }

        .container {
            width: min(900px, calc(100% - 32px));
            margin: 30px auto;
        }

        .header {
            padding: 26px;
            margin-bottom: 26px;
            background: linear-gradient(135deg, #eef2ff, white);
            border: 1px solid #e0e7ff;
            border-radius: 16px;
        }

        .code {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 7px;
            background: #e0e7ff;
            color: #3730a3;
            font-size: 12px;
            font-weight: 800;
        }

        h1 { font-size: 28px; margin: 12px 0 6px; }
        h2 { font-size: 18px; margin: 0 0 8px; }
        .muted { color: #64748b; font-size: 14px; }

        .lesson-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .lesson-card {
            display: flex;
            flex-direction: column;
            min-height: 190px;
            padding: 22px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
        }

        .lesson-number {
            color: #4f46e5;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .status {
            display: inline-block;
            align-self: flex-start;
            margin-top: 12px;
            padding: 5px 9px;
            border-radius: 7px;
            background: #ecfdf5;
            color: #047857;
            font-size: 12px;
            font-weight: 700;
        }

        .draft {
            background: #fef3c7;
            color: #92400e;
        }

        .lesson-link {
            display: inline-block;
            margin-top: auto;
            padding-top: 18px;
            color: #4f46e5;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
        }

        .empty {
            padding: 26px;
            grid-column: 1 / -1;
            background: white;
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            text-align: center;
        }

        @media (max-width: 600px) {
            .nav-inner { padding: 12px 16px; }
            .container { margin-top: 20px; }
            .header { padding: 20px; }
            h1 { font-size: 24px; }
            .lesson-list { grid-template-columns: 1fr; }
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

<!-- Student subject page modern fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

<style id="student-subject-premium-design">

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
                ellipse at 5% 10%,
                rgba(129, 140, 248, 0.15),
                transparent 34%
            ),
            radial-gradient(
                ellipse at 95% 45%,
                rgba(167, 139, 250, 0.13),
                transparent 36%
            ),
            linear-gradient(
                135deg,
                #f8faff 0%,
                #eef2ff 45%,
                #f5f3ff 100%
            );
        background-attachment: fixed;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    h1,
    h2,
    h3,
    .brand,
    .code,
    .lesson-number {
        font-family: 'Space Grotesk', sans-serif !important;
    }

    /* =========================================
       NAVIGATION
    ========================================= */

    .navbar {
        position: sticky;
        top: 0;
        z-index: 100;
        background: rgba(255, 255, 255, 0.88);
        border-bottom: 1px solid rgba(226, 232, 240, 0.85);
        box-shadow: 0 3px 18px rgba(15, 23, 42, 0.035);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }

    .nav-inner {
        max-width: 1100px;
        min-height: 70px;
        padding: 13px 24px;
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

    .back {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #4f46e5;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        font-weight: 750;
        transition:
            color 0.2s ease,
            transform 0.2s ease;
    }

    .back:hover {
        color: #312e81;
        transform: translateX(-3px);
    }

    /* =========================================
       PAGE CONTAINER
    ========================================= */

    .container {
        width: min(1050px, calc(100% - 40px));
        margin: 38px auto;
    }

    /* =========================================
       SUBJECT HEADER
    ========================================= */

    .header {
        position: relative;
        overflow: hidden;
        padding: 34px;
        margin-bottom: 30px;
        border: 1px solid #dfe5ff;
        border-radius: 22px;
        background:
            radial-gradient(
                circle at 90% 0%,
                rgba(129, 140, 248, 0.2),
                transparent 38%
            ),
            linear-gradient(
                135deg,
                #eef2ff 0%,
                #ffffff 65%,
                #f5f3ff 100%
            );
        box-shadow: 0 10px 30px rgba(49, 46, 129, 0.055);
    }

    .code {
        display: inline-flex;
        align-items: center;
        padding: 7px 12px;
        border: 1px solid #dbe4ff;
        border-radius: 8px;
        background: #e0e7ff;
        color: #4338ca;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.6px;
    }

    h1 {
        margin: 14px 0 7px;
        color: #172033;
        font-size: clamp(25px, 4vw, 34px);
        font-weight: 700;
        line-height: 1.25;
        letter-spacing: -1px;
    }

    h2 {
        color: #1e293b;
        font-size: 18px;
        font-weight: 700;
        letter-spacing: -0.35px;
    }

    .muted {
        color: #64748b;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        line-height: 1.8;
    }

    /* =========================================
       LESSON GRID
    ========================================= */

    .lesson-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        align-items: stretch;
        gap: 20px;
    }

    /* =========================================
       LESSON CARDS
    ========================================= */

    .lesson-card {
        position: relative;
        isolation: isolate;
        display: flex;
        flex-direction: column;
        min-width: 0;
        min-height: 220px;
        overflow: hidden;
        padding: 25px;
        background: rgba(255, 255, 255, 0.94);
        border: 1px solid #e6eaf3;
        border-radius: 18px;
        box-shadow: 0 6px 20px rgba(15, 23, 42, 0.04);
        transition:
            transform 0.3s cubic-bezier(0.2, 0.8, 0.2, 1),
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .lesson-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(
            90deg,
            #4f46e5,
            #818cf8,
            #a78bfa
        );
        opacity: 0;
        transition: opacity 0.25s ease;
        z-index: -1;
    }

    .lesson-card:hover {
        transform: translateY(-6px);
        border-color: #c7d2fe;
        box-shadow:
            0 18px 38px rgba(79, 70, 229, 0.105),
            0 5px 12px rgba(15, 23, 42, 0.035);
    }

    .lesson-card:hover::before {
        opacity: 1;
    }

    .lesson-number {
        align-self: flex-start;
        margin-bottom: 11px;
        padding: 6px 11px;
        border: 1px solid #e0e7ff;
        border-radius: 8px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.4px;
    }

    .lesson-card h2 {
        margin: 0 0 9px;
        color: #1e293b;
        font-size: 17px;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .lesson-card p {
        color: #64748b;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        line-height: 1.75;
    }

    /* =========================================
       LESSON STATUS
    ========================================= */

    .status {
        display: inline-flex;
        align-items: center;
        align-self: flex-start;
        gap: 7px;
        margin-top: 15px;
        padding: 7px 11px;
        border: 1px solid #bbf7d0;
        border-radius: 999px;
        background: #ecfdf3;
        color: #15803d;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 11px;
        font-weight: 800;
    }

    .status:not(.draft)::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #22c55e;
    }

    .draft {
        border-color: #fde68a;
        background: #fffbeb;
        color: #92400e;
    }

    .draft::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #f59e0b;
    }

    /* =========================================
       OPEN LESSON LINK
    ========================================= */

    .lesson-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-top: auto;
        padding-top: 21px;
        color: #4f46e5;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        transition:
            color 0.2s ease,
            transform 0.2s ease;
    }

    .lesson-link::after {
        content: "→";
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 29px;
        height: 29px;
        flex: 0 0 29px;
        border: 1px solid #e0e7ff;
        border-radius: 9px;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 17px;
        transition:
            transform 0.2s ease,
            background 0.2s ease,
            color 0.2s ease;
    }

    .lesson-link:hover {
        color: #312e81;
    }

    .lesson-link:hover::after {
        transform: translateX(4px);
        background: #4f46e5;
        color: #ffffff;
    }

    .lesson-link:focus-visible,
    .back:focus-visible,
    .brand:focus-visible {
        outline: 3px solid #818cf8;
        outline-offset: 4px;
        border-radius: 5px;
    }

    /* =========================================
       EMPTY LESSON STATE
    ========================================= */

    .empty {
        grid-column: 1 / -1;
        padding: 42px 25px;
        border: 1px dashed #c7d2fe;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.8);
        color: #64748b;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 14px;
        line-height: 1.8;
        text-align: center;
    }

    /* =========================================
       TABLET
    ========================================= */

    @media (max-width: 800px) {
        .container {
            width: calc(100% - 36px);
        }

        .lesson-list {
            gap: 15px;
        }

        .lesson-card {
            padding: 21px;
        }
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media (max-width: 600px) {
        body {
            background-attachment: scroll;
        }

        .nav-inner {
            min-height: 62px;
            padding: 11px 16px;
        }

        .brand {
            font-size: 19px;
        }

        .container {
            width: calc(100% - 30px);
            margin: 22px auto;
        }

        .header {
            padding: 23px 19px;
            margin-bottom: 23px;
            border-radius: 17px;
        }

        h1 {
            font-size: 25px;
        }

        .lesson-list {
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .lesson-card {
            min-height: 195px;
            padding: 21px;
            border-radius: 15px;
        }

        .lesson-card:hover {
            transform: translateY(-3px);
        }

        .lesson-link {
            padding-top: 17px;
        }
    }

    /* Respect reduced-motion preferences */

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            scroll-behavior: auto !important;
            animation-duration: 0.01ms !important;
            transition-duration: 0.01ms !important;
        }

        .lesson-card:hover,
        .back:hover {
            transform: none;
        }
    }

</style>



<style id="student-subject-home-palette">

    /* =========================================
       MATCHING HOMEPAGE COLOR PALETTE
    ========================================= */

    :root {
        --subject-primary: #4f46e5;
        --subject-primary-dark: #3730a3;
        --subject-text: #172033;
        --subject-muted: #64748b;
        --subject-border: #e8edf5;
    }

    /* Page background */

    body {
        background-color: #f8faff;
        background-image:
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
    }

    /* Navigation */

    .navbar {
        background: rgba(255, 255, 255, 0.96);
        border-bottom: 1px solid #e8edf5;
        box-shadow: 0 3px 15px rgba(15, 23, 42, 0.035);
    }

    .brand,
    .back {
        color: #4f46e5;
    }

    .brand:hover,
    .back:hover {
        color: #3730a3;
    }

    /* Subject header */

    .header {
        border: 1px solid #dfe5ff;
        background:
            radial-gradient(
                circle at 90% 10%,
                rgba(129, 140, 248, 0.18),
                transparent 38%
            ),
            linear-gradient(
                135deg,
                #eef2ff 0%,
                #ffffff 65%,
                #f5f3ff 100%
            );
        box-shadow:
            0 12px 30px rgba(49, 46, 129, 0.055),
            inset 0 1px 0 rgba(255, 255, 255, 0.85);
    }

    .code {
        background: #e0e7ff;
        border-color: #dbe4ff;
        color: #4338ca;
    }

    h1,
    h2 {
        color: #172033;
    }

    /* Lesson cards */

    .lesson-card {
        background: rgba(255, 255, 255, 0.95);
        border-color: #e8edf5;
        box-shadow:
            0 6px 20px rgba(15, 23, 42, 0.04),
            0 1px 3px rgba(15, 23, 42, 0.025);
    }

    .lesson-card::before {
        background: linear-gradient(
            90deg,
            #4f46e5,
            #818cf8,
            #a78bfa
        );
    }

    .lesson-card:hover {
        border-color: #c7d2fe;
        background: #ffffff;
        box-shadow:
            0 18px 38px rgba(79, 70, 229, 0.105),
            0 5px 12px rgba(15, 23, 42, 0.035);
    }

    .lesson-number {
        background: #eef2ff;
        border-color: #e0e7ff;
        color: #4338ca;
    }

    .lesson-card h2 {
        color: #1e293b;
    }

    .lesson-card p {
        color: #64748b;
    }

    /* Published badge */

    .status {
        background: #ecfdf3;
        border-color: #bbf7d0;
        color: #15803d;
    }

    .status:not(.draft)::before {
        background: #22c55e;
    }

    /* Draft badge */

    .status.draft {
        background: #fffbeb;
        border-color: #fde68a;
        color: #92400e;
    }

    .status.draft::before {
        background: #f59e0b;
    }

    /* Open lesson link */

    .lesson-link {
        color: #4f46e5;
    }

    .lesson-link:hover {
        color: #3730a3;
    }

    .lesson-link::after {
        background: #eef2ff;
        border-color: #e0e7ff;
        color: #4f46e5;
    }

    .lesson-link:hover::after {
        background: #4f46e5;
        border-color: #4f46e5;
        color: #ffffff;
        box-shadow: 0 5px 12px rgba(79, 70, 229, 0.20);
    }

    /* Empty state */

    .empty {
        border-color: #cbd5e1;
        background: rgba(255, 255, 255, 0.85);
        color: #64748b;
    }

    /* Text selection */

    ::selection {
        background: #c7d2fe;
        color: #312e81;
    }

    /* Mobile */

    @media (max-width: 600px) {
        body {
            background-attachment: scroll;
        }
    }

</style>


<style id="student-subject-blue-card-palette">

    /* =========================================
       BLUE AND INDIGO LESSON CARD PALETTE
    ========================================= */

    .lesson-card {
        background: linear-gradient(
            145deg,
            #eff6ff 0%,
            #f8fbff 64%,
            #eef4ff 100%
        );
        border: 1px solid #d7e6ff;
        box-shadow:
            0 7px 20px rgba(59, 130, 246, 0.055),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    /* Alternate complementary blue shades */

    .lesson-card:nth-child(4n + 1) {
        background: linear-gradient(
            145deg,
            #e6f1ff 0%,
            #f7fbff 62%,
            #eaf3ff 100%
        );
        border-color: #d2e3fc;
    }

    .lesson-card:nth-child(4n + 2) {
        background: linear-gradient(
            145deg,
            #e9edff 0%,
            #fafaff 64%,
            #f0edff 100%
        );
        border-color: #dcdfff;
    }

    .lesson-card:nth-child(4n + 3) {
        background: linear-gradient(
            145deg,
            #e1f3ff 0%,
            #f5fbff 64%,
            #e8f7ff 100%
        );
        border-color: #cce8fa;
    }

    .lesson-card:nth-child(4n + 4) {
        background: linear-gradient(
            145deg,
            #eeeaff 0%,
            #faf9ff 64%,
            #f4efff 100%
        );
        border-color: #e1d9ff;
    }

    /* Blue card accent */

    .lesson-card::before {
        background: linear-gradient(
            90deg,
            #2563eb,
            #6366f1,
            #a78bfa
        );
        height: 4px;
    }

    .lesson-card:hover {
        background: linear-gradient(
            135deg,
            #e4efff 0%,
            #f7faff 90%
        );
        border-color: #93b4f8;
        box-shadow:
            0 20px 42px rgba(37, 99, 235, 0.13),
            0 6px 14px rgba(79, 70, 229, 0.06);
    }

    /* Lesson number label */

    .lesson-number {
        background: linear-gradient(
            135deg,
            #dbeafe,
            #e0e7ff
        );
        border: 1px solid #bfdbfe;
        color: #1d4ed8;
        box-shadow: 0 2px 5px rgba(37, 99, 235, 0.05);
    }

    /* Lesson titles */

    .lesson-card h2 {
        color: #172b4d;
    }

    /* Lesson descriptions */

    .lesson-card p {
        color: #52647d;
    }

    /* Open lesson link */

    .lesson-link {
        color: #2563eb;
    }

    .lesson-link:hover {
        color: #3730a3;
    }

    .lesson-link::after {
        background: linear-gradient(
            135deg,
            #dbeafe,
            #e0e7ff
        );
        border-color: #bfdbfe;
        color: #2563eb;
    }

    .lesson-link:hover::after {
        background: linear-gradient(
            135deg,
            #2563eb,
            #4f46e5
        );
        border-color: #4f46e5;
        color: #ffffff;
        box-shadow: 0 5px 13px rgba(37, 99, 235, 0.22);
    }

    /* Empty state */

    .empty {
        background: linear-gradient(
            135deg,
            #eff6ff,
            #ffffff
        );
        border-color: #bfdbfe;
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
        <a class="mr-page-back" href="{{ route('student.dashboard') }}">← Back to Subjects</a>
    </nav>
</header>



    <main class="container">
        <header class="header">
            <span class="code">{{ $subject->code }}</span>

            <h1>{{ $subject->name }}</h1>

            <p class="muted">
                Section: {{ $subject->section }}
            </p>

            <p class="muted">
                Instructor: {{ $subject->instructor_name ?: 'Not assigned' }}
            </p>

            <p>Select a lesson to view its reviewer materials.</p>
        </header>

        <section class="lesson-list" aria-label="Subject lessons">
            @foreach ([1, 2, 3, 4] as $number)
                @php
                    $lesson = $lessons->get($number);
                @endphp

                <article class="lesson-card">
                    <span class="lesson-number">
                        LESSON {{ $number }}
                    </span>

                    @if ($lesson)
                        <h2>{{ $lesson->title }}</h2>

                        <p class="muted">
                            {{ $lesson->material_original_name
                                ? 'A lesson file is available.'
                                : 'Review the lesson notes.' }}
                        </p>

                        @if ($lesson->is_published)
                            <span class="status">Published</span>
                        @else
                            <span class="status draft">Draft · Instructor view</span>
                        @endif

                        <a
                            class="lesson-link"
                            href="{{ route('subjects.lessons.show', [
                                'slug' => $subject->slug,
                                'lessonNumber' => $number
                            ]) }}"
                        >
                            Open lesson →
                        </a>
                    @else
                        <h2>Lesson {{ $number }}</h2>

                        <p class="muted">
                            Lesson materials have not been published yet.
                        </p>

                        <span class="status draft">Coming soon</span>
                    @endif
                </article>
            @endforeach
        </section>
    </main>
</body>
</html>
