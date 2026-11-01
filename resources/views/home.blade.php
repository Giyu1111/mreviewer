
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f8fafc">

    <title>Mobile Reviewer | Learn Smarter</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --text: #172033;
            --muted: #64748b;
            --background: #f8fafc;
            --border: #e2e8f0;
            --white: #ffffff;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        /* Navigation */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(12px);
        }

        .nav-inner {
            max-width: 1100px;
            min-height: 72px;
            margin: auto;
            padding: 14px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .brand {
            font-size: 21px;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links > a:not(.button):hover {
            color: var(--primary);
        }

        .logout-form {
            margin: 0;
        }


.logout-dialog {
    position: fixed;
    inset: 0;
    margin: auto;

    width: min(400px, calc(100% - 32px));
    height: fit-content;
    max-height: calc(100vh - 32px);
    overflow-y: auto;

    padding: 0;
    border: 0;
    border-radius: 16px;
    box-shadow: 0 24px 60px rgba(15, 23, 42, 0.24);
}


        .logout-dialog::backdrop {
            background: rgba(15, 23, 42, 0.5);
        }

        .logout-dialog-content { padding: 26px; }
        .logout-dialog h2 { margin-bottom: 8px; font-size: 22px; }
        .logout-dialog p { color: var(--muted); font-size: 14px; }
        .logout-dialog-actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 24px; }
        .button-danger { background: #dc2626; }
        .button-danger:hover { background: #b91c1c; }

        /* Buttons */

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 44px;
            padding: 11px 20px;
            border: 1px solid transparent;
            border-radius: 10px;
            background: var(--primary);
            color: var(--white);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }

        .button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .button-outline {
            background: var(--white);
            color: var(--primary);
            border-color: var(--border);
        }

        .button-outline:hover {
            background: #eef2ff;
            color: var(--primary-dark);
        }

        /* General Layout */

        .container {
            width: min(1100px, calc(100% - 40px));
            margin: 0 auto;
        }

        /* Hero */

        .hero {
            padding: 76px 0 60px;
            background: linear-gradient(
                135deg,
                #eef2ff 0%,
                #f8fafc 70%
            );
        }

        .hero-content {
            max-width: 720px;
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 20px;
            padding: 6px 12px;
            border-radius: 999px;
            background: #e0e7ff;
            color: var(--primary-dark);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .hero h1 {
            margin-bottom: 20px;
            font-size: clamp(36px, 6vw, 58px);
            line-height: 1.12;
            letter-spacing: -1.5px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            max-width: 560px;
            margin-bottom: 28px;
            color: var(--muted);
            font-size: 17px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        /* Sections */

        .section {
            padding: 52px 0;
        }

        .section-heading {
            margin-bottom: 26px;
        }

        .section-heading h2 {
            font-size: 27px;
            line-height: 1.3;
            letter-spacing: -0.5px;
        }

        .section-heading p {
            margin-top: 6px;
            color: var(--muted);
            font-size: 14px;
        }

        /* Six Category Cards */

        .subject-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .subject-card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            min-height: 240px;
            padding: 24px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }

        .subject-card:hover {
            transform: translateY(-4px);
            border-color: #c7d2fe;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }

        .subject-card:focus-visible {
            outline: 3px solid #818cf8;
            outline-offset: 3px;
        }

        .subject-icon {
            display: grid;
            place-items: center;
            width: 52px;
            height: 52px;
            margin-bottom: 18px;
            border-radius: 14px;
            background: #eef2ff;
            font-size: 26px;
        }

        /* Subject icon image styling */
        /* Subject icon image styling */
        .subject-icon img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
.subject-card h3 {
            margin-bottom: 8px;
            font-size: 18px;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .subject-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .arrow {
            display: block;
            margin-top: auto;
            padding-top: 20px;
            color: var(--primary);
            font-size: 14px;
            font-weight: 800;
        }

        /* Practice Banner */

        .practice-banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            padding: 34px;
            border-radius: 20px;
            background: #1e1b4b;
            color: var(--white);
        }

        .practice-banner h2 {
            margin-bottom: 8px;
            font-size: 25px;
            line-height: 1.35;
        }

        .practice-banner p {
            max-width: 560px;
            color: #c7d2fe;
            font-size: 14px;
        }

        .practice-banner .button {
            flex-shrink: 0;
            background: var(--white);
            color: var(--primary-dark);
        }

        .practice-banner .button:hover {
            background: #e0e7ff;
        }

        /* Footer */

        .footer {
            margin-top: 28px;
            padding: 28px 20px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 13px;
            text-align: center;
        }

        /* Tablet and Mobile */

        @media (max-width: 800px) {
            .subject-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px;
            }

            .subject-card {
                min-height: 225px;
                padding: 20px;
            }

            .practice-banner {
                padding: 28px;
            }
        }

        @media (max-width: 600px) {
            .nav-inner {
                min-height: 64px;
                padding: 12px 16px;
            }

            .brand {
                font-size: 19px;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-links .optional-link {
                display: none;
            }

            .nav-links .button {
                min-height: 40px;
                padding: 9px 12px;
                font-size: 13px;
            }

            .container {
                width: calc(100% - 32px);
            }

            .hero {
                padding: 48px 0 40px;
            }

            .hero h1 {
                font-size: clamp(34px, 9vw, 46px);
                letter-spacing: -1px;
            }

            .hero p {
                font-size: 15px;
            }

            .section {
                padding: 36px 0;
            }

            .section-heading {
                margin-bottom: 20px;
            }

            .section-heading h2 {
                font-size: 23px;
            }

            .subject-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .subject-card {
                min-height: 220px;
                padding: 16px;
                border-radius: 14px;
            }

            .subject-icon {
                width: 44px;
                height: 44px;
                margin-bottom: 14px;
                border-radius: 12px;
                font-size: 23px;
            }

            .subject-card h3 {
                font-size: 15px;
            }

            .subject-card p {
                font-size: 13px;
            }

            .arrow {
                padding-top: 16px;
                font-size: 12px;
            }

            .practice-banner {
                flex-direction: column;
                align-items: stretch;
                padding: 24px;
                border-radius: 16px;
            }

            .practice-banner h2 {
                font-size: 22px;
            }

            .practice-banner .button {
                width: 100%;
            }

            .footer {
                margin-top: 12px;
            }
        }

        @media (max-width: 360px) {
            .brand {
                font-size: 17px;
            }

            .subject-grid {
                grid-template-columns: 1fr;
            }

            .subject-card {
                min-height: auto;
            }

            .arrow {
                padding-top: 18px;
            }

            .hero-actions {
                flex-direction: column;
            }

            .hero-actions .button {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition: none !important;
            }
        }

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

/* MOBILE REVIEWER HOMEPAGE REDESIGN */

        /* MOBILE REVIEWER HOMEPAGE REDESIGN */

        body {
            background: #f5f7fc;
            color: #172033;
        }

        /* Navigation */

        .navbar {
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid #e8edf5;
            box-shadow: 0 3px 15px rgba(15, 23, 42, 0.035);
        }

        .nav-inner {
            max-width: 1180px;
        }

        .brand {
            font-size: 22px;
            font-weight: 850;
            letter-spacing: -0.8px;
        }

        .nav-links {
            gap: 26px;
            color: #475569;
        }

        .nav-links > a:not(.button) {
            transition: color 0.2s ease;
        }

        .nav-links > a:not(.button):hover {
            color: #4f46e5;
        }

        /* Main buttons */

        .button {
            min-height: 46px;
            padding: 12px 21px;
            border-radius: 11px;
            font-size: 13px;
            font-weight: 750;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.14);
            transition: all 0.2s ease;
        }

        .button:hover {
            box-shadow: 0 7px 16px rgba(79, 70, 229, 0.2);
        }

        .button-outline {
            background: #ffffff;
            border: 1px solid #dfe5f0;
            box-shadow: none;
        }

        .button-outline:hover {
            border-color: #c7d2fe;
            background: #eef2ff;
        }

        /* Hero section */

        .hero {
            position: relative;
            overflow: hidden;
            padding: 88px 0 76px;
            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(129, 140, 248, 0.15),
                    transparent 34%
                ),
                linear-gradient(135deg, #eef2ff 0%, #f8fafc 65%, #ffffff 100%);
        }

        .hero-content {
            max-width: 760px;
        }

        .eyebrow {
            margin-bottom: 22px;
            padding: 8px 14px;
            border: 1px solid #dbe4ff;
            background: rgba(255, 255, 255, 0.75);
            color: #4338ca;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.8px;
        }

        .hero h1 {
            max-width: 720px;
            margin-bottom: 20px;
            color: #172033;
            font-size: clamp(38px, 6vw, 62px);
            font-weight: 850;
            line-height: 1.12;
            letter-spacing: -2px;
        }

        .hero h1 span {
            color: #4f46e5;
        }

        .hero p {
            max-width: 590px;
            color: #64748b;
            font-size: 16px;
            line-height: 1.8;
        }

        .hero-actions {
            gap: 13px;
        }

        /* Subject section */

        .section {
            padding: 64px 0;
        }

        .section-heading {
            margin-bottom: 32px;
        }

        .section-heading h2 {
            margin-bottom: 8px;
            color: #172033;
            font-size: clamp(24px, 3vw, 30px);
            font-weight: 850;
            letter-spacing: -0.8px;
        }

        .section-heading p {
            max-width: 650px;
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        /* Subject grid */

        .subject-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            align-items: stretch;
            gap: 22px;
        }

        /* Individual subject cards */

        .subject-card {
            position: relative;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            min-width: 0;
            min-height: 300px;
            padding: 25px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e8edf5;
            border-radius: 18px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.035);
            transition:
                transform 0.22s ease,
                box-shadow 0.22s ease,
                border-color 0.22s ease;
        }

        .subject-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #4f46e5, #818cf8);
            opacity: 0;
            transition: opacity 0.2s ease;
            z-index: -1;
        }

        .subject-card:hover {
            transform: translateY(-5px);
            border-color: #c7d2fe;
            box-shadow: 0 16px 36px rgba(49, 46, 129, 0.09);
        }

        .subject-card:hover::after {
            opacity: 1;
        }

        .subject-card:focus-visible {
            outline: 3px solid #818cf8;
            outline-offset: 4px;
        }

        /* Subject code */

        .subject-code {
            display: inline-flex;
            align-self: flex-start;
            align-items: center;
            min-height: 27px;
            margin-bottom: 18px;
            padding: 5px 10px;
            border: 1px solid #e0e7ff;
            border-radius: 7px;
            background: #eef2ff;
            color: #4338ca;
            font-size: 10px;
            font-weight: 850;
            letter-spacing: 0.65px;
        }

        /* Subject image */

        .subject-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 66px;
            height: 66px;
            margin-bottom: 20px;
            padding: 10px;
            overflow: hidden;
            border: 1px solid #e0e7ff;
            border-radius: 17px;
            background: linear-gradient(145deg, #eef2ff, #f8faff);
            color: #4f46e5;
            font-size: 30px;
            transition: transform 0.2s ease;
        }

        .subject-card:hover .subject-icon {
            transform: scale(1.06);
        }

        .subject-icon img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Subject title and description */

        .subject-card h3 {
            margin-bottom: 9px;
            color: #1e293b;
            font-size: 18px;
            font-weight: 800;
            line-height: 1.45;
            letter-spacing: -0.35px;
        }

        .subject-card > p {
            margin-bottom: 16px;
            color: #64748b;
            font-size: 13px;
            line-height: 1.75;
        }

        /* Subject information */

        .subject-details {
            display: flex;
            flex-direction: column;
            gap: 0;
            margin-top: 9px;
            padding: 12px 14px;
            border: 1px solid #edf0f6;
            border-radius: 12px;
            background: #f8fafc;
        }

        .subject-details p {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 5px;
            margin: 0;
            padding: 7px 0;
            border-bottom: 1px solid #e9eef5;
            color: #64748b;
            font-size: 11px;
            line-height: 1.5;
        }

        .subject-details p:last-child {
            border-bottom: 0;
        }

        .subject-details strong {
            color: #334155;
            font-weight: 750;
        }

        /* View lessons link */

        .arrow {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 19px;
            color: #4f46e5;
            font-size: 13px;
            font-weight: 800;
            transition: color 0.2s ease;
        }

        .subject-card:hover .arrow {
            color: #3730a3;
        }

        /* Practice banner */

        .practice-banner {
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 22px;
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(129, 140, 248, 0.3),
                    transparent 35%
                ),
                linear-gradient(125deg, #1e1b4b, #312e81);
            box-shadow: 0 15px 35px rgba(30, 27, 75, 0.12);
        }

        .practice-banner h2 {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.6px;
        }

        .practice-banner p {
            line-height: 1.8;
        }

        .practice-banner .button {
            border: 0;
            border-radius: 11px;
            box-shadow: none;
        }

        /* Footer */

        .footer {
            margin-top: 30px;
            padding: 32px 20px;
            border-top: 1px solid #e8edf5;
            background: #ffffff;
            color: #94a3b8;
            font-size: 12px;
        }

        /* Tablet */

        @media (max-width: 1000px) {
            .subject-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 17px;
            }

            .subject-card {
                min-height: 290px;
            }
        }

        /* Mobile */

        @media (max-width: 600px) {
            .hero {
                padding: 48px 0 42px;
            }

            .hero h1 {
                font-size: clamp(34px, 9vw, 45px);
                letter-spacing: -1.2px;
            }

            .hero p {
                font-size: 14px;
            }

            .section {
                padding: 40px 0;
            }

            .section-heading {
                margin-bottom: 22px;
            }

            .subject-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .subject-card {
                min-height: 275px;
                padding: 15px;
                border-radius: 14px;
            }

            .subject-code {
                margin-bottom: 14px;
                font-size: 9px;
            }

            .subject-icon {
                width: 52px;
                height: 52px;
                margin-bottom: 14px;
                padding: 8px;
                border-radius: 13px;
                font-size: 24px;
            }

            .subject-card h3 {
                font-size: 14px;
            }

            .subject-card > p {
                font-size: 12px;
            }

            .subject-details {
                padding: 9px;
            }

            .subject-details p {
                font-size: 10px;
            }

            .arrow {
                padding-top: 14px;
                font-size: 11px;
            }

            .practice-banner {
                padding: 24px 19px;
                border-radius: 17px;
            }
        }

        @media (max-width: 360px) {
            .subject-grid {
                grid-template-columns: 1fr;
            }

            .subject-card {
                min-height: auto;
                padding: 20px;
            }
        }

</style>

<style id="homepage-gradient-hover-upgrade">

    /* =========================================
       PAGE BACKGROUND GRADIENT
    ========================================= */

    html {
        scroll-behavior: smooth;
    }

    body {
        min-height: 100vh;
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
    }

    /* Make the subject section blend with the page */
    #subjects {
        background: transparent;
    }

    /* =========================================
       PREMIUM BUTTON HOVER EFFECTS
    ========================================= */

    .button {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        transform: translateY(0) scale(1);
        box-shadow:
            0 4px 10px rgba(79, 70, 229, 0.14),
            0 1px 3px rgba(15, 23, 42, 0.05);
        transition:
            transform 0.25s cubic-bezier(0.2, 0.8, 0.2, 1),
            box-shadow 0.25s ease,
            background 0.25s ease,
            border-color 0.25s ease,
            color 0.25s ease;
    }

    .button:hover {
        transform: translateY(-3px) scale(1.025);
        box-shadow:
            0 12px 24px rgba(79, 70, 229, 0.23),
            0 4px 9px rgba(79, 70, 229, 0.12);
        filter: brightness(1.06);
    }

    .button:active {
        transform: translateY(-1px) scale(0.98);
        box-shadow:
            0 3px 8px rgba(79, 70, 229, 0.15);
    }

    .button-outline {
        box-shadow: 0 3px 9px rgba(15, 23, 42, 0.035);
    }

    .button-outline:hover {
        transform: translateY(-3px) scale(1.025);
        border-color: #a5b4fc;
        background: linear-gradient(
            135deg,
            #eef2ff,
            #ffffff
        );
        color: #3730a3;
        box-shadow:
            0 10px 22px rgba(79, 70, 229, 0.11),
            0 3px 8px rgba(15, 23, 42, 0.04);
    }

    /* Navigation button */
    .nav-links .button:hover {
        transform: translateY(-2px) scale(1.035);
    }

    /* =========================================
       SUBJECT CARD HOVER EFFECTS
    ========================================= */

    .subject-card {
        transition:
            transform 0.3s cubic-bezier(0.2, 0.8, 0.2, 1),
            box-shadow 0.3s ease,
            border-color 0.3s ease,
            background 0.3s ease;
    }

    .subject-card:hover {
        transform: translateY(-7px) scale(1.012);
        border-color: #a5b4fc;
        background: linear-gradient(
            145deg,
            #ffffff 0%,
            #fbfaff 100%
        );
        box-shadow:
            0 20px 42px rgba(79, 70, 229, 0.12),
            0 7px 15px rgba(15, 23, 42, 0.045);
    }

    .subject-icon {
        transition:
            transform 0.3s cubic-bezier(0.2, 0.8, 0.2, 1),
            background 0.3s ease,
            box-shadow 0.3s ease;
    }

    .subject-card:hover .subject-icon {
        transform: translateY(-3px) scale(1.09);
        background: linear-gradient(
            135deg,
            #e0e7ff,
            #f5f3ff
        );
        box-shadow: 0 7px 17px rgba(79, 70, 229, 0.10);
    }

    .subject-card:hover .subject-icon img {
        transform: scale(1.04);
    }

    .subject-icon img {
        transition: transform 0.3s ease;
    }

    .arrow {
        transition:
            color 0.25s ease,
            transform 0.25s ease;
    }

    .subject-card:hover .arrow {
        color: #4338ca;
        transform: translateX(4px);
    }

    /* =========================================
       PRACTICE BANNER BUTTON
    ========================================= */

    .practice-banner .button {
        background: linear-gradient(
            135deg,
            #ffffff,
            #eef2ff
        );
        color: #3730a3;
        box-shadow: 0 5px 14px rgba(15, 23, 42, 0.12);
    }

    .practice-banner .button:hover {
        background: linear-gradient(
            135deg,
            #e0e7ff,
            #ffffff
        );
        color: #312e81;
        transform: translateY(-3px) scale(1.025);
        box-shadow: 0 12px 23px rgba(15, 23, 42, 0.18);
    }

    /* =========================================
       ACCESSIBILITY
    ========================================= */

    .button:focus-visible,
    .subject-card:focus-visible {
        outline: 3px solid #818cf8;
        outline-offset: 4px;
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            scroll-behavior: auto !important;
            animation-duration: 0.01ms !important;
            transition-duration: 0.01ms !important;
        }

        .subject-card:hover,
        .button:hover {
            transform: none;
        }
    }

    @media (max-width: 600px) {
        body {
            background-attachment: scroll;
        }

        .subject-card:hover {
            transform: translateY(-3px);
        }

        .button:hover {
            transform: translateY(-2px);
        }
    }

</style>

<!-- mobile-reviewer-modern-fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
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

<style id="mr-student-notification-badge">
    .mr-notification-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 19px;
        height: 19px;
        padding: 0 5px;
        border-radius: 20px;
        background: #ef4444;
        color: #ffffff;
        font: 900 10px 'Nunito', sans-serif;
        line-height: 1;
    }
</style>
<link rel="icon" type="image/svg+xml" href="{{ asset('mr-mark.svg') }}">
<link rel="stylesheet" href="{{ asset('theme.css') }}">
<script defer src="{{ asset('theme.js') }}"></script>

<style id="mr-continue-reviewing-styles">
    .mr-continue-section {
        width: min(1180px, calc(100% - 48px));
        margin: 0 auto 34px;
    }

    .mr-continue-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 17px;
    }

    .mr-continue-heading h2 {
        margin: 0 0 5px;
        color: #202344;
        font-family: 'Comfortaa', cursive;
        font-size: 21px;
        font-weight: 700;
    }

    .mr-continue-heading p {
        margin: 0;
        color: #777b98;
        font-size: 13px;
    }

    .mr-continue-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 30px;
        height: 30px;
        padding: 0 10px;
        border-radius: 20px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 12px;
        font-weight: 900;
    }

    .mr-continue-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .mr-continue-card {
        min-width: 0;
        padding: 20px;
        border: 1px solid #e0e7ff;
        border-radius: 16px;
        background: linear-gradient(135deg, #ffffff, #f8f9ff);
        box-shadow: 0 5px 20px rgba(42, 48, 105, .045);
    }

    .mr-continue-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 13px;
    }

    .mr-continue-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #4f46e5;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: .7px;
        text-transform: uppercase;
    }

    .mr-continue-subject {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 7px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 11px;
        font-weight: 900;
    }

    .mr-continue-card h3 {
        margin: 0 0 6px;
        color: #202344;
        font-family: 'Comfortaa', cursive;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.45;
        overflow-wrap: anywhere;
    }

    .mr-continue-card .mr-continue-subtitle {
        margin: 0 0 17px;
        color: #777b98;
        font-size: 12px;
    }

    .mr-continue-progress-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 8px;
        color: #656a86;
        font-size: 11px;
        font-weight: 800;
    }

    .mr-continue-progress-track {
        width: 100%;
        height: 8px;
        overflow: hidden;
        border-radius: 20px;
        background: #e8eaf5;
    }

    .mr-continue-progress-fill {
        height: 100%;
        border-radius: inherit;
        background: linear-gradient(90deg, #6366f1, #4338ca);
        transition: width .25s ease;
    }

    .mr-continue-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 18px;
    }

    .mr-continue-started {
        color: #9295aa;
        font-size: 10px;
        font-weight: 800;
    }

    .mr-resume-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 39px;
        padding: 9px 15px;
        border: 0;
        border-radius: 9px;
        background: #4f46e5;
        color: white;
        font: 900 12px 'Nunito', sans-serif;
        text-decoration: none;
        transition: background .2s, transform .2s;
    }

    .mr-resume-button:hover {
        background: #3730a3;
        color: white;
        transform: translateY(-1px);
    }

    @media (max-width: 750px) {
        .mr-continue-list {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .mr-continue-section {
            width: calc(100% - 32px);
            margin-bottom: 26px;
        }

        .mr-continue-heading h2 {
            font-size: 18px;
        }

        .mr-continue-card {
            padding: 17px;
        }

        .mr-continue-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .mr-resume-button {
            width: 100%;
        }
    }
</style>
</head>

<body>
    <header class="navbar">
        <nav class="nav-inner" aria-label="Main navigation">
            <a class="brand" href="{{ route('student.dashboard') }}">
                MobileReviewer.
            </a>

            <div class="nav-links">
                <a class="optional-link" href="#home">Home</a>
                <a class="optional-link" href="#subjects">Categories</a>
                <a
    class="optional-link"
    href="{{ route('student.reviewer-history') }}"
>
    Review History
</a>
                <a class="optional-link" href="{{ route('account.settings') }}">Account</a>
<a class="optional-link" href="{{ route('student.notifications.index') }}">
    <span aria-hidden="true">🔔</span>
    Notifications
    @if (auth()->user()->unreadNotifications()->count() > 0)
        <span class="mr-notification-count">
            {{ auth()->user()->unreadNotifications()->count() }}
        </span>
    @endif
</a>

                <a class="button" href="#subjects">
                    Start Reviewing
                </a>

<button class="button button-outline" type="button" data-open-logout-dialog>
                    Log Out
                </button>
            </div>
        </nav>
    </header>

    <main>
        <!-- Welcome Banner -->
        <section class="hero" id="home">
            <div class="container hero-content">
                <span class="eyebrow">
                    YOUR LEARNING COMPANION
                </span>

                <h1>
                    Prepare today.<br>
                    <span>Succeed tomorrow.</span>
                </h1>

                <p>
                    Study at your own pace with organized review materials
                    and practice quizzes. Learn anywhere, right from your phone.
                </p>

                <div class="hero-actions">
                    <a class="button" href="#subjects">
                        Explore Categories
                    </a>

                    <a class="button button-outline" href="#practice">
                        Practice Smarter
                    </a>
                </div>
            </div>
        </section>




        <!-- Dynamic Subject Categories -->

<section class="section" id="subjects">
    <div class="container">
        <div class="section-heading">
            <h2>My BSIT 4D Subjects</h2>
            <p>
                Choose a subject to explore its lessons, learning materials, and quizzes.
            </p>
        </div>

@if (isset($unfinishedAttempts) && $unfinishedAttempts->isNotEmpty())
    <section class="mr-continue-section" id="continue-reviewing">
        <div class="mr-continue-heading">
            <div>
                <h2>Continue Reviewing</h2>
                <p>Pick up where you left off in your unfinished quizzes.</p>
            </div>

            <span class="mr-continue-count">
                {{ $unfinishedAttempts->count() }}
            </span>
        </div>

        <div class="mr-continue-list">
            @foreach ($unfinishedAttempts as $attempt)
                @php
                    $total = (int) $attempt->total_questions;
                    $answered = (int) $attempt->answered_questions_count;
                    $progress = $total > 0
                        ? (int) round(($answered / $total) * 100)
                        : 0;

                    $lesson = $attempt->lesson;
                    $subject = $lesson?->subject;
                @endphp

                @if ($lesson && $subject)
                    <article class="mr-continue-card">
                        <div class="mr-continue-top">
                            <span class="mr-continue-label">
                                ↗ Unfinished Reviewer
                            </span>

                            <span class="mr-continue-subject">
                                {{ $subject->code }}
                            </span>
                        </div>

                        <h3>{{ $lesson->title }}</h3>

                        <p class="mr-continue-subtitle">
                            {{ $subject->name }}
                            · Lesson {{ $lesson->lesson_number }}
                        </p>

                        <div class="mr-continue-progress-info">
                            <span>{{ $answered }} of {{ $total }} questions answered</span>
                            <span>{{ $progress }}%</span>
                        </div>

                        <div
                            class="mr-continue-progress-track"
                            role="progressbar"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            aria-valuenow="{{ $progress }}"
                            aria-label="Quiz completion progress"
                        >
                            <div
                                class="mr-continue-progress-fill"
                                style="width: {{ $progress }}%;"
                            ></div>
                        </div>

                        <div class="mr-continue-footer">
                            <span class="mr-continue-started">
                                Started {{ $attempt->started_at?->diffForHumans() ?? 'previously' }}
                            </span>

                            <a
                                class="mr-resume-button"
                                href="{{ route('quiz.take', $attempt->id) }}"
                            >
                                Resume Quiz →
                            </a>
                        </div>
                    </article>
                @endif
            @endforeach
        </div>
    </section>
@endif
        <div class="subject-grid">
            @forelse ($subjects as $subject)
                <a
                    class="subject-card"
                    href="{{ route('subjects.show', ['slug' => $subject->slug]) }}"
                >
                    <span class="subject-code">
                        {{ $subject->code }}
                    </span>

                    <div class="subject-icon">
    @php
        $subjectIconPath = 'images/subjects/' . $subject->slug . '.png';
    @endphp

    @if (file_exists(public_path($subjectIconPath)))
        <img
            src="{{ asset($subjectIconPath) }}"
            alt="{{ $subject->name }} icon"
        >
    @else
        {{ $subject->icon ?: '📚' }}
    @endif
</div>

                    <h3>{{ $subject->name }}</h3>

                    <p>{{ $subject->description }}</p>

                    <div class="subject-details">
                        <p>
                            <strong>Section:</strong>
                            {{ $subject->section }}
                        </p>

                        <p>
                            <strong>Instructor:</strong>
                            {{ $subject->instructor_name ?: 'Not assigned' }}
                        </p>

                        <p>
                            <strong>Lecture:</strong>
                            {{ number_format((float) $subject->lecture_hours, 1) }}
                            hours
                        </p>

                        <p>
                            <strong>Laboratory:</strong>
                            {{ number_format((float) $subject->lab_hours, 1) }}
                            hours
                        </p>

                        <p>
                            <strong>Units:</strong>
                            {{ number_format((float) $subject->units, 1) }}
                        </p>
                    </div>

                    <span class="arrow">View Lessons &rarr;</span>
                </a>
            @empty
                <p>No subjects are available yet.</p>
            @endforelse
        </div>
    </div>
</section>


        <!-- Practice Banner -->
        <section class="section" id="practice">
            <div class="container">
                <div class="practice-banner">
                    <div>
                        <h2>Ready to test your knowledge?</h2>

                        <p>
                            Choose a category, review its lessons, and prepare
                            for practice quizzes as materials become available.
                        </p>
                    </div>

                    <a class="button" href="#subjects">
                        Browse Categories
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>
            &copy; {{ date('Y') }} MobileReviewer.
            Learn at your own pace.
        </p>
    </footer>

    <dialog class="logout-dialog" id="logout-dialog" aria-labelledby="logout-dialog-title">
        <div class="logout-dialog-content">
            <h2 id="logout-dialog-title">Log out?</h2>
            <p>Are you sure you want to logout?</p>

            <div class="logout-dialog-actions">
                <form method="dialog">
                    <button class="button button-outline" type="submit">Cancel</button>
                </form>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="button button-danger" type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </dialog>

    <script>
        const logoutDialog = document.getElementById('logout-dialog');

        document.querySelector('[data-open-logout-dialog]').addEventListener('click', () => {
            logoutDialog.showModal();
        });

        logoutDialog.addEventListener('click', (event) => {
            if (event.target === logoutDialog) {
                logoutDialog.close();
            }
        });
    </script>
<style id="modern-typography-upgrade">

    /* Main font */
    html,
    body,
    button,
    input,
    textarea,
    select {
        font-family: 'DM Sans', sans-serif !important;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;
    }

    /* Modern geometric headings */
    h1,
    h2,
    h3,
    h4,
    .brand,
    .eyebrow,
    .subject-code,
    .badge,
    .section-heading h2 {
        font-family: 'Space Grotesk', sans-serif !important;
    }

    /* Main hero heading */
    .hero h1 {
        font-family: 'Space Grotesk', sans-serif !important;
        font-weight: 700;
        letter-spacing: -1.8px;
    }

    /* Subject titles */
    .subject-card h3 {
        font-family: 'Space Grotesk', sans-serif !important;
        font-weight: 700;
        letter-spacing: -0.4px;
    }

    /* Navigation and branding */
    .brand {
        font-weight: 700;
        letter-spacing: -0.8px;
    }

    .nav-links,
    .nav-links a {
        font-family: 'DM Sans', sans-serif !important;
        font-weight: 600;
    }

    /* Buttons */
    .button,
    .hero-actions a,
    .arrow {
        font-family: 'DM Sans', sans-serif !important;
        font-weight: 700;
        letter-spacing: -0.15px;
    }

    /* Descriptions and information */
    .hero p,
    .subject-card p,
    .subject-details,
    .section-heading p,
    .practice-banner p,
    .footer {
        font-family: 'DM Sans', sans-serif !important;
    }

</style>
</body>
</html>
