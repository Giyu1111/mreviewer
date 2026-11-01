
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f8fafc">
    <title>Instructor Dashboard | Mobile Reviewer</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: #172033;
            background: #f8fafc;
            line-height: 1.6;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .nav-inner {
            max-width: 1100px;
            min-height: 68px;
            margin: auto;
            padding: 12px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .brand {
            color: #4f46e5;
            font-weight: 800;
            font-size: 20px;
            text-decoration: none;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 42px;
            padding: 10px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            background: white;
            color: #334155;
            font-weight: 700;
            cursor: pointer;
        }

        .button-outline {
            background: white;
            border-color: #cbd5e1;
            color: #334155;
        }

        .button-outline:hover { background: #f8fafc; }
        .button-danger { background: #dc2626; color: white; }
        .button-danger:hover { background: #b91c1c; }


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


        .logout-dialog::backdrop { background: rgba(15, 23, 42, 0.5); }
        .logout-dialog-content { padding: 26px; }
        .logout-dialog h2 { margin: 0 0 8px; font-size: 22px; }
        .logout-dialog p { margin: 0; color: #64748b; font-size: 14px; }
        .logout-dialog-actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 24px; }

        .container {
            width: min(1050px, calc(100% - 32px));
            margin: 34px auto;
        }

        .welcome {
            padding: 28px;
            border-radius: 18px;
            background: linear-gradient(135deg, #eef2ff, #ffffff);
            border: 1px solid #e0e7ff;
            margin-bottom: 30px;
        }

        .eyebrow {
            color: #4338ca;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.7px;
        }

        h1 {
            margin: 8px 0;
            font-size: clamp(26px, 4vw, 36px);
            line-height: 1.25;
        }

        .muted {
            color: #64748b;
        }

        .section-heading {
            margin-bottom: 20px;
        }

        .section-heading h2 {
            margin-bottom: 4px;
            font-size: 23px;
        }

        .subject-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .subject-card {
    position: relative;
    min-width: 0;
    overflow: hidden;
    padding: 27px;
    border: 1px solid #e5eaf3;
    border-radius: 20px;
    background: linear-gradient(180deg, #ffffff 0%, #fbfcff 100%);
    box-shadow: 0 8px 24px rgba(31, 45, 75, 0.06);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.subject-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 26px;
    right: 26px;
    height: 4px;
    border-radius: 0 0 8px 8px;
    background: linear-gradient(90deg, #3157d5, #83a2ff);
}

.subject-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 35px rgba(31, 45, 75, 0.11);
}

.subject-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 19px;
}

.subject-code {
    display: inline-flex;
    align-items: center;
    padding: 7px 11px;
    border-radius: 8px;
    background: #edf1ff;
    color: #3157d5;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.6px;
}

.subject-status {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 10px;
    border: 1px solid #d9f0e2;
    border-radius: 30px;
    background: #f0faf4;
    color: #23804b;
    font-size: 10px;
    font-weight: 700;
}

.subject-status-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #22a45a;
}

.subject-card h3 {
    margin: 0 0 21px;
    color: #17233b;
    font-size: 21px;
    font-weight: 750;
    line-height: 1.4;
    letter-spacing: -0.5px;
    overflow-wrap: anywhere;
}

.subject-meta {
    display: grid;
    grid-template-columns: 0.85fr 1.15fr;
    gap: 11px;
    margin-bottom: 17px;
}

.subject-meta-item {
    min-width: 0;
    padding: 13px;
    border: 1px solid #edf0f5;
    border-radius: 11px;
    background: #ffffff;
}

.subject-meta-label {
    display: block;
    margin-bottom: 7px;
    color: #8994a7;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 0.8px;
}

.subject-meta-value {
    display: block;
    color: #34425b;
    font-size: 12px;
    font-weight: 700;
    line-height: 1.5;
    overflow-wrap: anywhere;
}

.subject-stats {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;
    margin-bottom: 18px;
}

.subject-stat {
    padding: 16px;
    border: 1px solid #e9eef8;
    border-radius: 13px;
    background: #f6f8fd;
}

.subject-stat-label {
    display: block;
    margin-bottom: 8px;
    color: #8490a5;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 0.9px;
}

.subject-stat-value {
    display: block;
    color: #23365f;
    font-size: 27px;
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -1px;
}

.subject-stat-caption {
    display: block;
    margin-top: 6px;
    color: #8994a7;
    font-size: 11px;
}

.subject-card-description {
    margin: 0 0 19px;
    color: #758197;
    font-size: 12px;
    line-height: 1.7;
}

.subject-action {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    min-height: 48px;
    padding: 0 17px;
    border: 0;
    border-radius: 10px;
    background: #3157d5;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: background 0.2s ease, transform 0.2s ease;
}

.subject-action:hover {
    background: #2445b5;
    transform: translateY(-1px);
}

.subject-action-arrow {
    font-size: 19px;
}


        .empty-state {
            padding: 30px 22px;
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            background: white;
            text-align: center;
        }

        @media (max-width: 600px) {
            .nav-inner {
                padding: 12px 16px;
            }

            .brand {
                font-size: 18px;
            }

            .container {
                margin-top: 22px;
            }

            .welcome {
                padding: 22px;
            }

            .subject-grid {
                grid-template-columns: 1fr;
            }

            .subject-card {
                padding: 20px;
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
</style>

<!-- Modern instructor dashboard typography -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

<style id="mobile-reviewer-instructor-premium-design">

    /* =========================================
       GLOBAL DASHBOARD THEME
    ========================================= */

    :root {
        --instructor-primary: #4f46e5;
        --instructor-primary-dark: #3730a3;
        --instructor-blue: #2563eb;
        --instructor-text: #172033;
        --instructor-muted: #64748b;
        --instructor-border: #e2e8f0;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        min-height: 100vh;
        font-family: 'DM Sans', sans-serif !important;
        color: var(--instructor-text);
        background:
            radial-gradient(
                ellipse at 7% 10%,
                rgba(129, 140, 248, 0.17),
                transparent 33%
            ),
            radial-gradient(
                ellipse at 94% 30%,
                rgba(96, 165, 250, 0.13),
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
                #eef2ff 43%,
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
    .brand,
    .eyebrow,
    .subject-code,
    .subject-stat-value {
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
        border-bottom: 1px solid rgba(226, 232, 240, 0.9);
        box-shadow: 0 3px 17px rgba(15, 23, 42, 0.035);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }

    .nav-inner {
        max-width: 1180px;
        min-height: 72px;
        padding: 13px 24px;
    }

    .brand {
        color: #4338ca;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -0.9px;
        transition: color 0.2s ease;
    }

    .brand:hover {
        color: #6366f1;
    }

    /* =========================================
       BUTTONS
    ========================================= */

    .button {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        min-height: 44px;
        padding: 11px 19px;
        border: 1px solid #dbe3f2;
        border-radius: 11px;
        background: #ffffff;
        color: #334155;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        font-weight: 800;
        cursor: pointer;
        text-decoration: none;
        box-shadow: 0 3px 8px rgba(15, 23, 42, 0.035);
        transition:
            transform 0.23s ease,
            background 0.23s ease,
            border-color 0.23s ease,
            color 0.23s ease,
            box-shadow 0.23s ease;
    }

    .button:hover {
        transform: translateY(-2px);
        border-color: #a5b4fc;
        background: #eef2ff;
        color: #3730a3;
        box-shadow: 0 8px 17px rgba(79, 70, 229, 0.09);
    }

    .button-outline {
        background: #ffffff;
        border-color: #dbe3f2;
        color: #475569;
    }

    .button-outline:hover {
        background: #eef2ff;
        border-color: #a5b4fc;
        color: #3730a3;
    }

    .button-danger {
        background: linear-gradient(120deg, #dc2626, #ef4444);
        border-color: #dc2626;
        color: #ffffff;
        box-shadow: 0 5px 12px rgba(220, 38, 38, 0.15);
    }

    .button-danger:hover {
        background: linear-gradient(120deg, #b91c1c, #dc2626);
        border-color: #b91c1c;
        color: #ffffff;
        box-shadow: 0 9px 18px rgba(220, 38, 38, 0.2);
    }

    .nav-inner > .button {
        padding: 10px 17px;
    }

    /* =========================================
       LOGOUT DIALOG
    ========================================= */

    .logout-dialog {
        position: fixed;
        inset: 0;
        margin: auto;
        width: min(420px, calc(100% - 30px));
        height: fit-content;
        max-height: calc(100vh - 30px);
        overflow-y: auto;
        padding: 0;
        border: 1px solid #e2e8f0;
        border-radius: 19px;
        background: #ffffff;
        box-shadow: 0 25px 75px rgba(15, 23, 42, 0.23);
    }

    .logout-dialog::backdrop {
        background: rgba(15, 23, 42, 0.55);
        backdrop-filter: blur(4px);
    }

    .logout-dialog-content {
        padding: 29px;
    }

    .logout-dialog h2 {
        color: #172554;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: 23px;
        font-weight: 700;
    }

    .logout-dialog p {
        color: #64748b;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        line-height: 1.7;
    }

    .logout-dialog-actions {
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 24px;
    }

    .logout-dialog-actions form {
        margin: 0;
    }

    .logout-dialog *,
    .logout-dialog-content {
        font-family: 'DM Sans', sans-serif !important;
    }

    /* =========================================
       MAIN DASHBOARD CONTAINER
    ========================================= */

    .container {
        width: min(1120px, calc(100% - 36px));
        margin: 38px auto 60px;
    }

    /* =========================================
       WELCOME HEADER
    ========================================= */

    .welcome {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        padding: clamp(27px, 4vw, 38px);
        margin-bottom: 37px;
        border: 1px solid #dbe3ff;
        border-radius: 23px;
        background:
            radial-gradient(
                ellipse at 94% 5%,
                rgba(129, 140, 248, 0.25),
                transparent 39%
            ),
            radial-gradient(
                ellipse at 0% 100%,
                rgba(96, 165, 250, 0.13),
                transparent 40%
            ),
            linear-gradient(
                135deg,
                #eaf0ff 0%,
                #ffffff 62%,
                #f5f3ff 100%
            );
        box-shadow:
            0 15px 38px rgba(49, 46, 129, 0.07),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    .welcome::before {
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
        z-index: -1;
    }

    .eyebrow {
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
        letter-spacing: 0.9px;
    }

    .eyebrow::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
    }

    .welcome h1 {
        margin: 17px 0 10px;
        color: #172554;
        font-size: clamp(28px, 4vw, 38px);
        font-weight: 700;
        line-height: 1.25;
        letter-spacing: -1.3px;
        overflow-wrap: anywhere;
    }

    .welcome .muted {
        max-width: 650px;
        color: #5d6b83;
        font-size: 14px;
        line-height: 1.8;
    }

    /* =========================================
       SECTION HEADING
    ========================================= */

    .section-heading {
        margin-bottom: 24px;
    }

    .section-heading h2 {
        margin: 0 0 7px;
        color: #1e2b55;
        font-size: 25px;
        font-weight: 700;
        letter-spacing: -0.7px;
    }

    .section-heading .muted {
        color: #64748b;
        font-size: 13px;
        line-height: 1.75;
    }

    /* =========================================
       SUBJECT GRID
    ========================================= */

    .subject-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        align-items: stretch;
        gap: 22px;
    }

    /* =========================================
       SUBJECT CARDS
    ========================================= */

    .subject-card {
        position: relative;
        isolation: isolate;
        min-width: 0;
        overflow: hidden;
        padding: 27px;
        border: 1px solid #dce4f5;
        border-radius: 20px;
        background:
            radial-gradient(
                ellipse at 100% 0%,
                rgba(224, 231, 255, 0.34),
                transparent 40%
            ),
            linear-gradient(
                145deg,
                #ffffff 0%,
                #f8faff 75%,
                #f5f7ff 100%
            );
        box-shadow:
            0 8px 24px rgba(31, 45, 75, 0.045),
            0 2px 5px rgba(15, 23, 42, 0.02);
        transition:
            transform 0.28s cubic-bezier(0.2, 0.8, 0.2, 1),
            box-shadow 0.28s ease,
            border-color 0.28s ease;
    }

    .subject-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 24px;
        right: 24px;
        height: 4px;
        border-radius: 0 0 8px 8px;
        background: linear-gradient(
            90deg,
            #3730a3,
            #4f46e5,
            #818cf8,
            #60a5fa
        );
        opacity: 0.9;
        z-index: -1;
    }

    .subject-card::after {
        content: "";
        position: absolute;
        right: -65px;
        bottom: -90px;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: radial-gradient(
            circle,
            rgba(129, 140, 248, 0.11),
            transparent 70%
        );
        z-index: -1;
        pointer-events: none;
    }

    .subject-card:hover {
        transform: translateY(-6px);
        border-color: #a5b4fc;
        box-shadow:
            0 19px 40px rgba(49, 46, 129, 0.10),
            0 5px 12px rgba(15, 23, 42, 0.035);
    }

    /* Subject card header */

    .subject-card-header {
        margin-bottom: 21px;
    }

    .subject-code {
        padding: 8px 12px;
        border: 1px solid #c7d2fe;
        border-radius: 9px;
        background: linear-gradient(
            135deg,
            #e0e7ff,
            #eef2ff
        );
        color: #4338ca;
        font-size: 10px;
        font-weight: 850;
        letter-spacing: 0.7px;
    }

    .subject-status {
        padding: 7px 11px;
        border: 1px solid #bbf7d0;
        border-radius: 999px;
        background: #ecfdf3;
        color: #15803d;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 10px;
        font-weight: 800;
    }

    .subject-status-dot {
        background: #22c55e;
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.10);
    }

    .subject-card h3 {
        margin: 0 0 22px;
        color: #1e2b55;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: 21px;
        font-weight: 700;
        line-height: 1.45;
        letter-spacing: -0.55px;
        overflow-wrap: anywhere;
    }

    /* =========================================
       SUBJECT INFORMATION
    ========================================= */

    .subject-meta {
        gap: 12px;
        margin-bottom: 18px;
    }

    .subject-meta-item {
        padding: 14px;
        border: 1px solid #e4eaf5;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.8);
        transition:
            border-color 0.2s ease,
            background 0.2s ease;
    }

    .subject-card:hover .subject-meta-item {
        border-color: #d6def5;
        background: #ffffff;
    }

    .subject-meta-label {
        color: #8792a7;
        font-size: 9px;
        letter-spacing: 0.9px;
    }

    .subject-meta-value {
        color: #34425b;
        font-size: 12px;
        font-weight: 750;
        line-height: 1.6;
    }

    /* =========================================
       SUBJECT STATISTICS
    ========================================= */

    .subject-stats {
        gap: 12px;
        margin-bottom: 19px;
    }

    .subject-stat {
        padding: 17px;
        border: 1px solid #dce6fc;
        border-radius: 14px;
        background: linear-gradient(
            145deg,
            #edf3ff,
            #f7f9ff 70%,
            #ffffff
        );
        transition:
            transform 0.22s ease,
            border-color 0.22s ease,
            box-shadow 0.22s ease;
    }

    .subject-card:hover .subject-stat {
        transform: translateY(-2px);
        border-color: #c7d2fe;
        box-shadow: 0 5px 13px rgba(79, 70, 229, 0.045);
    }

    .subject-stat-label {
        color: #71809e;
        font-size: 9px;
        letter-spacing: 0.85px;
    }

    .subject-stat-value {
        color: #3730a3;
        font-size: 29px;
        font-weight: 700;
        letter-spacing: -1.1px;
    }

    .subject-stat-caption {
        color: #8793a9;
        font-size: 11px;
    }

    .subject-card-description {
        margin: 0 0 20px;
        color: #6b7890;
        font-size: 12px;
        line-height: 1.8;
    }

    /* =========================================
       MANAGE LESSONS BUTTON
    ========================================= */

    .subject-action {
        position: relative;
        isolation: isolate;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        width: 100%;
        min-height: 50px;
        padding: 0 18px;
        overflow: hidden;
        border: 1px solid #4f46e5;
        border-radius: 11px;
        background: linear-gradient(
            110deg,
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
            0 6px 14px rgba(79, 70, 229, 0.16),
            inset 0 1px 0 rgba(255, 255, 255, 0.15);
        transition:
            transform 0.23s ease,
            box-shadow 0.23s ease,
            background 0.23s ease;
    }

    .subject-action:hover {
        transform: translateY(-3px);
        background: linear-gradient(
            110deg,
            #3730a3,
            #4338ca,
            #4f46e5
        );
        color: #ffffff;
        box-shadow:
            0 12px 23px rgba(79, 70, 229, 0.24),
            0 4px 8px rgba(79, 70, 229, 0.1);
    }

    .subject-action-arrow {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.13);
        font-size: 18px;
        transition: transform 0.23s ease;
    }

    .subject-action:hover .subject-action-arrow {
        transform: translateX(4px);
    }

    /* =========================================
       EMPTY SUBJECT STATE
    ========================================= */

    .empty-state {
        padding: 38px 25px;
        border: 1px dashed #c7d2fe;
        border-radius: 17px;
        background: rgba(255, 255, 255, 0.82);
        text-align: center;
        box-shadow: 0 6px 18px rgba(49, 46, 129, 0.035);
    }

    .empty-state h3 {
        margin-bottom: 9px;
        color: #27366a;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: 18px;
        font-weight: 700;
    }

    .empty-state .muted {
        color: #64748b;
        font-size: 13px;
        line-height: 1.8;
    }

    /* =========================================
       RESPONSIVE DESIGN
    ========================================= */

    @media (max-width: 800px) {
        .container {
            width: calc(100% - 32px);
        }

        .subject-grid {
            gap: 16px;
        }

        .subject-card {
            padding: 22px;
        }
    }

    @media (max-width: 600px) {
        body {
            background-attachment: scroll;
        }

        .nav-inner {
            min-height: 64px;
            padding: 11px 16px;
            flex-wrap: wrap;
        }

        .brand {
            flex: 1 0 100%;
            font-size: 19px;
        }

        .nav-inner > .button {
            flex: 1 1 0;
            min-height: 40px;
            padding: 9px 13px;
            font-size: 12px;
        }

        .container {
            width: calc(100% - 28px);
            margin: 24px auto 42px;
        }

        .welcome {
            padding: 25px 19px;
            margin-bottom: 29px;
            border-radius: 17px;
        }

        .welcome h1 {
            font-size: 29px;
            letter-spacing: -0.8px;
        }

        .welcome .muted {
            font-size: 13px;
        }

        .section-heading h2 {
            font-size: 22px;
        }

        .subject-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .subject-card {
            padding: 21px 18px;
            border-radius: 16px;
        }

        .subject-card h3 {
            font-size: 19px;
        }

        .subject-meta-item {
            padding: 12px;
        }

        .subject-stat {
            padding: 14px;
        }

        .subject-stat-value {
            font-size: 25px;
        }

        .logout-dialog-content {
            padding: 23px 19px;
        }

        .logout-dialog-actions {
            flex-direction: column-reverse;
        }

        .logout-dialog-actions form,
        .logout-dialog-actions .button {
            width: 100%;
        }
    }

    @media (max-width: 380px) {
        .container {
            width: calc(100% - 24px);
        }

        .welcome,
        .subject-card {
            padding: 19px 16px;
        }

        .subject-meta,
        .subject-stats {
            grid-template-columns: 1fr;
        }
    }

    /* =========================================
       ACCESSIBILITY
    ========================================= */

    .button:focus-visible,
    .subject-action:focus-visible,
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

        .subject-card:hover,
        .subject-action:hover,
        .button:hover {
            transform: none;
        }
    }

</style>

<style id="mobile-reviewer-manage-review">

.review-open-button {
    display: inline-flex !important;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 12px;
    min-height: 46px;
    padding: 12px 21px;
    border: 0;
    border-radius: 12px;
    background: linear-gradient(135deg,#4f46e5,#2563eb);
    color: white;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(79,70,229,.2);
}

.review-open-button:hover {
    transform: translateY(-2px);
}

.review-dialog {
    width: min(1120px,calc(100% - 24px));
    max-width: 1120px;
    max-height: 88vh;
    margin: auto;
    padding: 0;
    overflow: hidden;
    border: 1px solid #dbe3ff;
    border-radius: 22px;
    background: #fff;
    color: #172554;
    box-shadow: 0 28px 85px rgba(30,27,75,.25);
}

.review-dialog::backdrop {
    background: rgba(30,27,75,.58);
    backdrop-filter: blur(7px);
}

.review-dialog-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 15px;
    padding: 24px 27px;
    border-bottom: 1px solid #e0e7ff;
    background: linear-gradient(125deg,#eef2ff,#eff6ff);
}

.review-eyebrow {
    color: #4f46e5;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1px;
}

.review-dialog-header h2 {
    margin: 7px 0 5px;
    color: #1e1b4b;
    font-family: 'Space Grotesk',sans-serif !important;
    font-size: 24px;
}

.review-dialog-header p {
    margin: 0;
    color: #64748b;
    font-size: 13px;
}

.review-close {
    width: 39px;
    height: 39px;
    border: 1px solid #dbe3ff;
    border-radius: 11px;
    background: white;
    color: #4338ca;
    font-size: 24px;
    cursor: pointer;
}

.review-dialog-body {
    max-height: calc(88vh - 100px);
    padding: 24px 27px;
    overflow-y: auto;
}

.review-summary {
    display: grid;
    grid-template-columns: repeat(2,minmax(0,1fr));
    gap: 14px;
    margin-bottom: 22px;
}

.review-summary-card {
    display: flex;
    flex-direction: column;
    gap: 7px;
    padding: 17px;
    border: 1px solid #c7d2fe;
    border-radius: 14px;
    background: linear-gradient(135deg,#eef2ff,#fff);
}

.review-summary-card span {
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
}

.review-summary-card strong {
    color: #3730a3;
    font-family: 'Space Grotesk',sans-serif !important;
    font-size: 27px;
}

.review-search-area {
    margin-bottom: 17px;
}

.review-search-area label {
    display: block;
    margin-bottom: 7px;
    color: #334155;
    font-size: 12px;
    font-weight: 800;
}

.review-search-area input {
    width: 100%;
    min-height: 45px;
    padding: 12px 14px;
    border: 1px solid #dbe3f3;
    border-radius: 11px;
    background: #fbfdff;
    font-family: 'DM Sans',sans-serif !important;
}

.review-loading,
.review-error,
.review-empty,
.review-no-results {
    padding: 25px 16px;
    border-radius: 13px;
    text-align: center;
    font-size: 13px;
}

.review-loading {
    color: #475569;
}

.review-error {
    border: 1px solid #fecaca;
    background: #fff1f2;
    color: #be123c;
}

.review-empty {
    border: 1px dashed #c7d2fe;
    background: #f8faff;
}

.review-empty-icon {
    color: #4338ca;
    font-size: 28px;
}

.review-empty h3 {
    color: #1e1b4b;
    font-family: 'Space Grotesk',sans-serif !important;
}

.review-empty p {
    color: #64748b;
}

.review-table-wrap {
    width: 100%;
    overflow-x: auto;
    border: 1px solid #e0e7ff;
    border-radius: 14px;
}

.review-table {
    width: 100%;
    min-width: 850px;
    border-collapse: collapse;
    text-align: left;
}

.review-table th {
    padding: 14px;
    background: #eef2ff;
    color: #3730a3;
    font-size: 10px;
    white-space: nowrap;
}

.review-table td {
    padding: 14px;
    border-bottom: 1px solid #edf0fb;
    color: #475569;
    font-size: 12px;
    vertical-align: middle;
}

.review-table tbody tr:hover {
    background: #f8faff;
}

.review-student-name,
.review-subject-name {
    display: block;
    color: #1e1b4b;
    font-weight: 800;
}

.review-student-email,
.review-lesson-name {
    display: block;
    margin-top: 4px;
    color: #8792a7;
    font-size: 11px;
    overflow-wrap: anywhere;
}

.review-status {
    display: inline-block;
    margin-top: 6px;
    padding: 4px 8px;
    border-radius: 20px;
    background: #eff6ff;
    color: #1d4ed8;
    font-size: 10px;
    font-weight: 800;
}

.review-status-completed {
    background: #ecfdf5;
    color: #047857;
}

.review-score {
    color: #047857 !important;
    font-weight: 800;
    white-space: nowrap;
}

.review-date {
    color: #64748b;
    font-size: 11px;
    white-space: nowrap;
}

.review-no-results {
    color: #64748b;
}

.review-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    margin-top: 16px;
    color: #8792a7;
    font-size: 11px;
}

.review-refresh-button {
    min-height: 36px;
    padding: 8px 13px;
    border: 1px solid #c7d2fe;
    border-radius: 9px;
    background: #eef2ff;
    color: #4338ca;
    font-weight: 800;
    cursor: pointer;
}

@media(max-width:650px) {
    .review-dialog {
        width: calc(100% - 14px);
        max-height: 94vh;
        border-radius: 17px;
    }

    .review-dialog-header,
    .review-dialog-body {
        padding: 17px;
    }

    .review-dialog-body {
        max-height: calc(94vh - 80px);
    }

    .review-summary {
        gap: 9px;
    }

    .review-summary-card {
        padding: 13px;
    }

    .review-summary-card strong {
        font-size: 23px;
    }
}

@media(max-width:380px) {
    .review-summary {
        grid-template-columns: 1fr;
    }

    .review-footer {
        align-items: flex-start;
        flex-direction: column;
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
<link rel="icon" type="image/svg+xml" href="{{ asset('mr-mark.svg') }}">
<link rel="stylesheet" href="{{ asset('theme.css') }}">
<script defer src="{{ asset('theme.js') }}"></script>

<style id="mr-instructor-analytics-styles">
    .mr-analytics-section {
        margin: 0 0 36px;
    }

    .mr-analytics-heading {
        margin-bottom: 18px;
    }

    .mr-analytics-heading h2 {
        margin: 0 0 6px;
        color: #1e2b55;
        font-family: 'Comfortaa', cursive;
        font-size: 23px;
        font-weight: 700;
    }

    .mr-analytics-heading p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.65;
    }

    .mr-analytics-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 22px;
    }

    .mr-analytics-card {
        min-width: 0;
        padding: 19px 17px;
        border: 1px solid #e5e7f3;
        border-radius: 15px;
        background: #ffffff;
        box-shadow: 0 5px 18px rgba(42, 48, 105, .035);
    }

    .mr-analytics-card-label {
        min-height: 34px;
        margin-bottom: 10px;
        color: #777b98;
        font-size: 11px;
        font-weight: 900;
        line-height: 1.5;
    }

    .mr-analytics-card-value {
        color: #4338ca;
        font-family: 'Comfortaa', cursive;
        font-size: clamp(22px, 2.4vw, 29px);
        font-weight: 700;
        line-height: 1.25;
        overflow-wrap: anywhere;
    }

    .mr-analytics-card-note {
        margin-top: 7px;
        color: #9295aa;
        font-size: 10px;
        line-height: 1.5;
    }

    .mr-analytics-table-card {
        overflow: hidden;
        border: 1px solid #e5e7f3;
        border-radius: 15px;
        background: #ffffff;
        box-shadow: 0 5px 18px rgba(42, 48, 105, .035);
    }

    .mr-analytics-table-header {
        padding: 19px 20px;
        border-bottom: 1px solid #edf0f7;
    }

    .mr-analytics-table-header h3 {
        margin: 0 0 5px;
        color: #1e2b55;
        font-family: 'Comfortaa', cursive;
        font-size: 16px;
        font-weight: 700;
    }

    .mr-analytics-table-header p {
        margin: 0;
        color: #777b98;
        font-size: 11px;
    }

    .mr-analytics-table-wrap {
        overflow-x: auto;
        width: 100%;
    }

    .mr-analytics-table {
        width: 100%;
        min-width: 650px;
        border-collapse: collapse;
        text-align: left;
    }

    .mr-analytics-table th {
        padding: 13px 16px;
        background: #f8f9ff;
        color: #777b98;
        font-size: 10px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .45px;
        white-space: nowrap;
    }

    .mr-analytics-table td {
        padding: 15px 16px;
        border-top: 1px solid #edf0f7;
        color: #414665;
        font-size: 12px;
        font-weight: 700;
        vertical-align: middle;
    }

    .mr-analytics-subject-code {
        display: inline-flex;
        padding: 5px 9px;
        border-radius: 7px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 10px;
        font-weight: 900;
        white-space: nowrap;
    }

    .mr-analytics-subject-name {
        color: #202344;
        font-weight: 900;
    }

    .mr-analytics-score {
        color: #4338ca;
        font-weight: 900;
    }

    .mr-analytics-empty {
        padding: 35px 20px;
        color: #8589a2;
        font-size: 13px;
        text-align: center;
    }

    .mr-analytics-footer {
        padding: 13px 18px;
        border-top: 1px solid #edf0f7;
        background: #fcfcff;
        color: #9295aa;
        font-size: 10px;
        line-height: 1.6;
    }

    @media (max-width: 1100px) {
        .mr-analytics-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 650px) {
        .mr-analytics-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .mr-analytics-card {
            padding: 16px 13px;
        }

        .mr-analytics-heading h2 {
            font-size: 20px;
        }

        .mr-analytics-card-label {
            font-size: 10px;
        }
    }
</style>
</head>

<body>
    <header class="navbar">
        <nav class="nav-inner" aria-label="Instructor navigation">
            <a class="brand" href="{{ route('dashboard') }}">
                MobileReviewer.
            </a>

            <a class="button" href="{{ route('account.settings') }}">Account</a>
<button class="button" type="button" data-open-logout-dialog>
                Log Out
            </button>
        </nav>
    </header>

    <main class="container">
        <section class="welcome">
            <span class="eyebrow">INSTRUCTOR WORKSPACE</span>

            <h1>
                Welcome, {{ auth()->user()->name }}!
            </h1>

            <p class="muted">
                Manage your assigned subject, prepare lesson materials,
                and organize quizzes for your students.
            </p>
<div class="welcome-actions">
    <button
        type="button"
        class="button review-open-button"
        id="open-review-dialog"
    >
        <span aria-hidden="true">▤</span>
        <span>Manage Review</span>
    </button>
<a
    class="button review-open-button"
    href="{{ route('instructor.reports.export') }}"
    title="Export student reports as an Excel-compatible CSV file"
>
    <span aria-hidden="true">⇩</span>
    <span>Export Student Reports</span>
</a>
</div>
        </section>

<section class="mr-analytics-section" id="student-performance-analytics">
            <div class="mr-analytics-heading">
                <h2>Student Performance Analytics</h2>
                <p>Overview of student participation and reviewer performance across your assigned subjects.</p>
            </div>

            <div class="mr-analytics-grid">
                <article class="mr-analytics-card">
                    <div class="mr-analytics-card-label">Participating Students</div>
                    <div class="mr-analytics-card-value">
                        {{ number_format($analytics['participating_students']) }}
                    </div>
                    <div class="mr-analytics-card-note">Unique student accounts</div>
                </article>

                <article class="mr-analytics-card">
                    <div class="mr-analytics-card-label">Total Quiz Attempts</div>
                    <div class="mr-analytics-card-value">
                        {{ number_format($analytics['total_attempts']) }}
                    </div>
                    <div class="mr-analytics-card-note">All reviewer attempts</div>
                </article>

                <article class="mr-analytics-card">
                    <div class="mr-analytics-card-label">Completed Quizzes</div>
                    <div class="mr-analytics-card-value">
                        {{ number_format($analytics['completed_attempts']) }}
                    </div>
                    <div class="mr-analytics-card-note">Finished reviewer attempts</div>
                </article>

                <article class="mr-analytics-card">
                    <div class="mr-analytics-card-label">Average Quiz Score</div>
                    <div class="mr-analytics-card-value">
                        {{ number_format($analytics['average_score'], 1) }}%
                    </div>
                    <div class="mr-analytics-card-note">Average of completed attempts</div>
                </article>

                <article class="mr-analytics-card">
                    <div class="mr-analytics-card-label">Completion Rate</div>
                    <div class="mr-analytics-card-value">
                        {{ number_format($analytics['completion_rate'], 1) }}%
                    </div>
                    <div class="mr-analytics-card-note">Completed attempts divided by all attempts</div>
                </article>
            </div>

            <div class="mr-analytics-table-card">
                <div class="mr-analytics-table-header">
                    <h3>Performance by Subject</h3>
                    <p>Quiz performance for students in each of your assigned subjects.</p>
                </div>

                @if ($performanceBySubject->isNotEmpty())
                    <div class="mr-analytics-table-wrap">
                        <table class="mr-analytics-table">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Students</th>
                                    <th>Attempts</th>
                                    <th>Completed</th>
                                    <th>Average Score</th>
                                    <th>Completion</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($performanceBySubject as $performance)
                                    <tr>
                                        <td>
                                            <div class="mr-analytics-subject-code">
                                                {{ $performance['subject_code'] }}
                                            </div>
                                            <div class="mr-analytics-subject-name">
                                                {{ $performance['subject_name'] }}
                                            </div>
                                        </td>

                                        <td>{{ number_format($performance['students']) }}</td>
                                        <td>{{ number_format($performance['attempts']) }}</td>
                                        <td>{{ number_format($performance['completed']) }}</td>

                                        <td class="mr-analytics-score">
                                            {{ number_format($performance['average_score'], 1) }}%
                                        </td>

                                        <td>
                                            {{ number_format($performance['completion_rate'], 1) }}%
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="mr-analytics-empty">
                        No student quiz activity is available for your assigned subjects yet.
                    </div>
                @endif

                <div class="mr-analytics-footer">
                    Analytics include student quiz attempts from your assigned subjects only.
                    Unfinished attempts are included in participation and completion calculations,
                    but only completed attempts are included in average scores.
                </div>
            </div>
        </section>

                <section>
            <div class="section-heading">
                <h2>My Assigned Subjects</h2>

                <p class="muted">
                    Only subjects assigned to your instructor account appear here.
                </p>
            </div>

            @if ($subjects->isNotEmpty())
                <div class="subject-grid">
                    @foreach ($subjects as $item)
                            <article class="subject-card">

    <div class="subject-card-header">
        <span class="subject-code">
            {{ $item->code }}
        </span>

        <span class="subject-status">
            <span class="subject-status-dot"></span>
            Assigned Subject
        </span>
    </div>

    <h3>{{ $item->name }}</h3>

    <div class="subject-meta">

        <div class="subject-meta-item">
            <span class="subject-meta-label">SECTION</span>
            <span class="subject-meta-value">
                {{ $item->section }}
            </span>
        </div>

        <div class="subject-meta-item">
            <span class="subject-meta-label">INSTRUCTOR</span>
            <span class="subject-meta-value">
                {{ $item->instructor_name ?: auth()->user()->name }}
            </span>
        </div>

    </div>

    <div class="subject-stats">

        <div class="subject-stat">
            <span class="subject-stat-label">LESSONS</span>
            <strong class="subject-stat-value">{{ $item->lessons_count }}</strong>
            <span class="subject-stat-caption">Created lessons</span>
        </div>

        <div class="subject-stat">
            <span class="subject-stat-label">COURSE UNITS</span>
            <strong class="subject-stat-value">
                {{ number_format((float) $item->units, 1) }}
            </strong>
            <span class="subject-stat-caption">Academic units</span>
        </div>

    </div>

    <p class="subject-card-description">
        Create and manage your lessons, upload reviewer materials, and publish content for your students.
    </p>

    <a
        class="button subject-action"
        href="{{ route('instructor.subjects.lessons.index', [
            'subject' => $item->id
        ]) }}"
    >
        <span>Manage Lessons</span>
        <span class="subject-action-arrow">&rarr;</span>
    </a>

</article>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <h3>No subjects assigned yet</h3>

                    <p class="muted">
                        Your assigned course will appear here after your
                        instructor account is connected to a subject.
                    </p>
                </div>
            @endif
        </section>
    </main>

    <dialog class="review-dialog" id="review-dialog">

        <div class="review-dialog-header">
            <div>
                <span class="review-eyebrow">STUDENT PARTICIPATION</span>
                <h2>Manage Review</h2>
                <p>Monitor students participating in your lesson reviews.</p>
            </div>

            <button
                type="button"
                class="review-close"
                id="close-review-dialog"
                aria-label="Close"
            >&times;</button>
        </div>

        <div class="review-dialog-body">

            <div class="review-summary">
                <div class="review-summary-card">
                    <span>Participating Students</span>
                    <strong id="review-student-count">0</strong>
                </div>

                <div class="review-summary-card">
                    <span>Total Review Attempts</span>
                    <strong id="review-attempt-count">0</strong>
                </div>
            </div>

            <div class="review-search-area">
                <label for="review-search">Search Students</label>
                <input
                    type="search"
                    id="review-search"
                    placeholder="Search name, email, subject, or lesson..."
                >
            </div>

            <div class="review-loading" id="review-loading" hidden>
                Loading student records...
            </div>

            <div class="review-error" id="review-error" hidden></div>

            <div class="review-empty" id="review-empty" hidden>
                <div class="review-empty-icon">▤</div>
                <h3>No review participants yet</h3>
                <p>Students will appear here after starting a lesson review.</p>
            </div>

            <div class="review-table-wrap" id="review-table-wrap" hidden>
                <table class="review-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Latest Subject / Lesson</th>
                            <th>Attempts</th>
                            <th>Completed</th>
                            <th>Latest Score</th>
                            <th>Last Completed</th>
                        </tr>
                    </thead>
                    <tbody id="review-table-body"></tbody>
                </table>
            </div>

            <div class="review-no-results" id="review-no-results" hidden>
                No students match your search.
            </div>

            <div class="review-footer">
                <span id="review-visible-count">0 students</span>

                <button
                    type="button"
                    class="review-refresh-button"
                    id="refresh-review-list"
                >Refresh List</button>
            </div>

        </div>
    </dialog>
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
<script>
(() => {
    const dialog = document.getElementById('review-dialog');
    const openButton = document.getElementById('open-review-dialog');

    if (!dialog || !openButton) return;

    const endpoint = "{{ route('instructor.reviews.students') }}";

    const closeButton = document.getElementById('close-review-dialog');
    const refreshButton = document.getElementById('refresh-review-list');
    const search = document.getElementById('review-search');

    const loading = document.getElementById('review-loading');
    const errorBox = document.getElementById('review-error');
    const emptyBox = document.getElementById('review-empty');
    const tableWrap = document.getElementById('review-table-wrap');
    const tableBody = document.getElementById('review-table-body');
    const noResults = document.getElementById('review-no-results');

    const studentCount = document.getElementById('review-student-count');
    const attemptCount = document.getElementById('review-attempt-count');
    const visibleCount = document.getElementById('review-visible-count');

    let students = [];

    function makeElement(tag, className, text) {
        const node = document.createElement(tag);
        node.className = className;
        node.textContent = text ?? '';
        return node;
    }

    function render() {
        tableBody.replaceChildren();

        students.forEach(student => {
            const row = document.createElement('tr');

            row.dataset.search = [
                student.student_name,
                student.student_email,
                student.subject_name,
                student.subject_code,
                student.lesson_title
            ].join(' ').toLowerCase();

            const studentCell = document.createElement('td');

            studentCell.append(
                makeElement('span','review-student-name',student.student_name),
                makeElement('span','review-student-email',student.student_email || 'No email')
            );

            const lessonCell = document.createElement('td');

            const subjectName = student.subject_code
                ? student.subject_code + ' · ' + student.subject_name
                : student.subject_name;

            lessonCell.append(
                makeElement('span','review-subject-name',subjectName),
                makeElement('span','review-lesson-name',student.lesson_title),
                makeElement(
                    'span',
                    student.latest_status === 'Completed'
                        ? 'review-status review-status-completed'
                        : 'review-status',
                    student.latest_status
                )
            );

            let score = 'No completed review';

            if (student.latest_score !== null && student.latest_score !== undefined) {
                const total = Number(student.latest_total_questions || 0);

                const percentage = total > 0
                    ? Math.round(Number(student.latest_score) / total * 100)
                    : 0;

                score = total > 0
                    ? student.latest_score + ' / ' + total + ' (' + percentage + '%)'
                    : 'No questions';
            }

            row.append(
                studentCell,
                lessonCell,
                makeElement('td','',String(student.attempts_count)),
                makeElement('td','',String(student.completed_attempts)),
                makeElement('td','review-score',score),
                makeElement('td','review-date',student.last_completed_at || 'Not completed')
            );

            tableBody.append(row);
        });

        studentCount.textContent = String(students.length);

        attemptCount.textContent = String(
            students.reduce((sum, student) => sum + Number(student.attempts_count || 0), 0)
        );

        filterStudents();
    }

    function filterStudents() {
        const term = search.value.trim().toLowerCase();
        let visible = 0;

        Array.from(tableBody.rows).forEach(row => {
            const matches = row.dataset.search.includes(term);

            row.hidden = !matches;

            if (matches) visible++;
        });

        visibleCount.textContent = visible + ' of ' + students.length + ' students';
        noResults.hidden = students.length === 0 || visible !== 0;
        tableWrap.hidden = students.length === 0 || visible === 0;
    }

    async function loadStudents() {
        loading.hidden = false;
        errorBox.hidden = true;
        emptyBox.hidden = true;
        tableWrap.hidden = true;
        noResults.hidden = true;
        refreshButton.disabled = true;
        tableBody.replaceChildren();

        try {
            const response = await fetch(endpoint, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            });

            if (!response.ok) {
                throw new Error(
                    response.status === 403
                        ? 'You are not authorized to view these records.'
                        : 'Unable to load student review records.'
                );
            }

            const result = await response.json();

            students = Array.isArray(result.data) ? result.data : [];

            search.value = '';
            loading.hidden = true;

            if (students.length === 0) {
                studentCount.textContent = '0';
                attemptCount.textContent = '0';
                visibleCount.textContent = '0 students';
                emptyBox.hidden = false;
                return;
            }

            render();

        } catch (error) {
            loading.hidden = true;
            errorBox.textContent = error.message;
            errorBox.hidden = false;

        } finally {
            refreshButton.disabled = false;
        }
    }

    openButton.addEventListener('click', () => {
        dialog.showModal();
        loadStudents();
    });

    closeButton.addEventListener('click', () => dialog.close());
    refreshButton.addEventListener('click', loadStudents);
    search.addEventListener('input', filterStudents);

    dialog.addEventListener('click', event => {
        if (event.target === dialog) dialog.close();
    });
})();
</script>
</body>
</html>
