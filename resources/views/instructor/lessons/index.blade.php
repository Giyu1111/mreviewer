
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f8fafc">
    <title>Manage Lessons | Mobile Reviewer</title>

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
            max-width: 1050px;
            min-height: 66px;
            padding: 12px 20px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
        }

        .brand, .back {
            color: #4f46e5;
            font-weight: 800;
            text-decoration: none;
        }

        .container {
            max-width: 1050px;
            width: calc(100% - 32px);
            margin: 28px auto;
        }

        .header {
            padding: 26px;
            background: linear-gradient(135deg, #eef2ff, white);
            border: 1px solid #e0e7ff;
            border-radius: 16px;
            margin: 20px 0 28px;
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

        h1 { margin: 10px 0 6px; font-size: 29px; }
        h2 { font-size: 20px; }
        .muted { color: #64748b; font-size: 14px; }

        .success {
            margin-bottom: 20px;
            padding: 13px 16px;
            border: 1px solid #a7f3d0;
            border-radius: 10px;
            background: #ecfdf5;
            color: #065f46;
        }

        .lesson-card {
            margin-bottom: 22px;
            padding: 24px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
        }

        .lesson-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }

        .badge {
            padding: 5px 9px;
            border-radius: 7px;
            background: #f1f5f9;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
        }

        .form-group { margin-bottom: 17px; }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 700;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            background: white;
            color: #172033;
            font: inherit;
            font-size: 14px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus, textarea:focus {
            outline: 2px solid #c7d2fe;
            border-color: #4f46e5;
        }

        .file-note {
            margin-top: 6px;
            font-size: 12px;
            color: #64748b;
        }

        .current-file {
            padding: 12px;
            margin-bottom: 17px;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            background: #f8fafc;
            overflow-wrap: anywhere;
            font-size: 13px;
        }

        .current-file a {
            color: #4f46e5;
            font-weight: 700;
        }

        .checkbox-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 20px;
        }

        .checkbox-row input {
            margin-top: 5px;
            accent-color: #4f46e5;
        }

        .checkbox-row label { margin: 0; }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 44px;
            padding: 11px 17px;
            border: 0;
            border-radius: 9px;
            background: #4f46e5;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .button:hover { background: #3730a3; }

        .button-secondary {
            margin-left: 8px;
            background: #eef2ff;
            color: #3730a3;
        }

        .button-secondary:hover { background: #e0e7ff; }

        .error-list {
            margin-bottom: 18px;
            padding: 12px 16px;
            border: 1px solid #fecaca;
            border-radius: 9px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 13px;
        }

        .footer {
            padding: 28px 16px;
            color: #64748b;
            text-align: center;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .nav-inner { padding: 12px 16px; }
            .container { margin-top: 18px; }
            .header { padding: 20px; }
            .lesson-card { padding: 18px; }
            h1 { font-size: 25px; }
            .button { width: 100%; }
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

/* Add New Lesson Modal */
.new-lesson-dialog {
    position: fixed;
    inset: 0;
    margin: auto;
    width: min(620px, calc(100% - 32px));
    max-width: 620px;
    max-height: calc(100vh - 32px);
    overflow-y: auto;
    padding: 0;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    background: #ffffff;
    color: #172033;
    box-shadow: 0 25px 70px rgba(15, 23, 42, 0.25);
    font-family: 'Inter', sans-serif;
}

.new-lesson-dialog[open] {
    display: block;
}

.new-lesson-dialog::backdrop {
    background: rgba(15, 23, 42, 0.58);
    backdrop-filter: blur(3px);
}

.new-lesson-content {
    padding: 28px;
}

.new-lesson-heading {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 24px;
}

.new-lesson-heading h2 {
    margin: 7px 0;
    color: #172033;
    font-size: 23px;
    font-weight: 800;
}

.new-lesson-heading p {
    color: #64748b;
    font-size: 13px;
}

.new-lesson-label {
    color: #3157d5;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1px;
}

.new-lesson-close {
    width: 34px;
    height: 34px;
    flex-shrink: 0;
    border: 1px solid #e2e8f0;
    border-radius: 9px;
    background: #f8fafc;
    color: #64748b;
    font-size: 23px;
    line-height: 1;
    cursor: pointer;
}

.new-lesson-close:hover {
    background: #eef2ff;
    color: #3157d5;
}

.new-lesson-dialog input[type="text"],
.new-lesson-dialog input[type="file"],
.new-lesson-dialog textarea {
    width: 100%;
}

.new-lesson-dialog textarea {
    min-height: 105px;
}

.new-lesson-dialog .new-lesson-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 24px;
}

.new-lesson-dialog .new-lesson-actions .button {
    width: auto;
    min-width: 115px;
}

.new-lesson-dialog,
.new-lesson-dialog * {
    font-family: 'Inter', sans-serif;
}

@media (max-width: 600px) {
    .new-lesson-content {
        padding: 22px 18px;
    }

    .new-lesson-dialog .new-lesson-actions {
        flex-direction: column-reverse;
    }

    .new-lesson-dialog .new-lesson-actions .button {
        width: 100%;
    }
}    /* Edit lesson modal styling */

    .lesson-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        margin-top: 18px;
    }

    .lesson-card-details {
        margin-top: 12px;
    }

    .lesson-card-details p {
        margin: 7px 0;
    }

    .edit-lesson-dialog {
        position: fixed;
        inset: 0;
        margin: auto;
        width: min(720px, calc(100% - 32px));
        max-width: 720px;
        max-height: 90vh;
        overflow-y: auto;
        border: 0;
        border-radius: 18px;
        padding: 26px;
        background: #ffffff;
        color: #172033;
        box-shadow: 0 24px 80px rgba(15, 23, 42, 0.28);
    }

    .edit-lesson-dialog::backdrop {
        background: rgba(15, 23, 42, 0.62);
        backdrop-filter: blur(3px);
    }

    .edit-modal-heading {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 18px;
        margin-bottom: 22px;
    }

    .edit-modal-heading h2 {
        margin: 0 0 6px;
    }

    .edit-modal-heading p {
        margin: 0;
        color: #64748b;
    }

    .edit-modal-close {
        flex: 0 0 auto;
        width: 38px;
        height: 38px;
        border: 0;
        border-radius: 10px;
        background: #f1f5f9;
        color: #334155;
        font-size: 25px;
        line-height: 1;
        cursor: pointer;
    }

    .edit-modal-close:hover {
        background: #e2e8f0;
    }

/* Premium lesson management design */

    /* Premium lesson management design */

    :root {
        --mr-primary: #2563eb;
        --mr-primary-dark: #1d4ed8;
        --mr-text: #172033;
        --mr-muted: #64748b;
        --mr-border: #e7ecf3;
        --mr-soft: #f8fafc;
    }

    /* Lesson cards */

    .lesson-card {
        position: relative;
        overflow: hidden;
        margin-bottom: 22px;
        padding: 26px;
        background: #ffffff;
        border: 1px solid var(--mr-border);
        border-radius: 18px;
        box-shadow: 0 5px 18px rgba(15, 23, 42, 0.045);
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .lesson-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(180deg, #3b82f6, #6366f1);
        opacity: 0.9;
    }

    .lesson-card:hover {
        transform: translateY(-3px);
        border-color: #cbdaf7;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.085);
    }

    .lesson-card > * {
        position: relative;
        z-index: 1;
    }

    /* Card heading */

    .lesson-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 18px;
        padding-bottom: 17px;
        border-bottom: 1px solid #edf1f6;
    }

    .lesson-heading h2 {
        margin: 0;
        color: var(--mr-text);
        font-size: 17px;
        font-weight: 800;
        letter-spacing: -0.35px;
    }

    /* Published and draft badges */

    .badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 7px 12px;
        border: 1px solid transparent;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.25px;
    }

    .badge-published {
        color: #15803d;
        background: #ecfdf3;
        border-color: #bbf7d0;
    }

    .badge-published::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #22c55e;
    }

    .badge-draft {
        color: #b45309;
        background: #fffbeb;
        border-color: #fde68a;
    }

    .badge-draft::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #f59e0b;
    }

    /* Lesson information */

    .lesson-card-details {
        margin-top: 14px;
    }

    .lesson-card-details p {
        margin: 9px 0;
        color: var(--mr-muted);
        font-size: 13px;
        line-height: 1.7;
    }

    .lesson-card-details p:first-child {
        color: var(--mr-text);
        font-size: 16px;
        font-weight: 750;
    }

    .lesson-card-details .file-note {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 12px;
        padding: 8px 11px;
        background: #f8fafc;
        border: 1px solid #edf1f6;
        border-radius: 8px;
        font-size: 12px;
    }

    /* Consistent buttons */

    .button {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        min-height: 44px;
        padding: 11px 18px;
        border: 1px solid var(--mr-primary);
        border-radius: 10px;
        background: var(--mr-primary);
        color: #ffffff;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        font-weight: 750;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 3px 8px rgba(37, 99, 235, 0.14);
        transition: background 0.18s ease, transform 0.18s ease, box-shadow 0.18s ease;
    }

    .button:hover {
        background: var(--mr-primary-dark);
        border-color: var(--mr-primary-dark);
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(37, 99, 235, 0.2);
    }

    .button-secondary {
        margin-left: 0;
        border: 1px solid #dbe3ef;
        background: #ffffff;
        color: #334155;
        box-shadow: none;
    }

    .button-secondary:hover {
        background: #f1f5f9;
        color: #1e293b;
        border-color: #cbd5e1;
        box-shadow: none;
    }

    .lesson-actions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
        padding-top: 17px;
        border-top: 1px solid #edf1f6;
    }

    .lesson-actions .button {
        width: auto;
        margin: 0;
    }

    .button:focus-visible,
    .edit-modal-close:focus-visible {
        outline: 3px solid rgba(59, 130, 246, 0.3);
        outline-offset: 3px;
    }

    /* Add lesson and edit lesson dialogs */

    .new-lesson-dialog,
    .edit-lesson-dialog {
        border: 1px solid #e5eaf2;
        border-radius: 20px;
        background: #ffffff;
        color: var(--mr-text);
        box-shadow: 0 25px 80px rgba(15, 23, 42, 0.22);
    }

    .edit-lesson-dialog {
        padding: 28px;
    }

    .new-lesson-dialog::backdrop,
    .edit-lesson-dialog::backdrop {
        background: rgba(15, 23, 42, 0.62);
        backdrop-filter: blur(4px);
    }

    .edit-modal-heading {
        align-items: center;
        margin-bottom: 24px;
        padding-bottom: 18px;
        border-bottom: 1px solid #edf1f6;
    }

    .edit-modal-heading h2,
    .new-lesson-heading h2 {
        color: var(--mr-text);
        font-size: 21px;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .edit-modal-heading p,
    .new-lesson-heading p {
        color: var(--mr-muted);
        font-size: 13px;
        line-height: 1.6;
    }

    .edit-modal-close {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 38px;
        height: 38px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: #f8fafc;
        color: #475569;
        font-size: 23px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .edit-modal-close:hover {
        background: #fee2e2;
        border-color: #fecaca;
        color: #b91c1c;
    }

    /* Form fields */

    .edit-lesson-dialog .form-group,
    .new-lesson-dialog .form-group {
        margin-bottom: 19px;
    }

    .edit-lesson-dialog label,
    .new-lesson-dialog label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-size: 13px;
        font-weight: 750;
    }

    .edit-lesson-dialog input[type="text"],
    .edit-lesson-dialog input[type="file"],
    .edit-lesson-dialog textarea,
    .new-lesson-dialog input[type="text"],
    .new-lesson-dialog input[type="file"],
    .new-lesson-dialog textarea {
        box-sizing: border-box;
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #dbe3ed;
        border-radius: 10px;
        background: #ffffff;
        color: #172033;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        transition: border-color 0.18s ease, box-shadow 0.18s ease;
    }

    .edit-lesson-dialog input[type="text"]:focus,
    .edit-lesson-dialog textarea:focus,
    .new-lesson-dialog input[type="text"]:focus,
    .new-lesson-dialog textarea:focus {
        outline: none;
        border-color: #60a5fa;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
    }

    .edit-lesson-dialog textarea,
    .new-lesson-dialog textarea {
        min-height: 130px;
        resize: vertical;
        line-height: 1.65;
    }

    .edit-lesson-dialog input[type="file"],
    .new-lesson-dialog input[type="file"] {
        padding: 10px;
        background: #f8fafc;
    }

    .file-note {
        color: #64748b;
        font-size: 12px;
        line-height: 1.6;
    }

    .current-file {
        margin: 15px 0;
        padding: 14px;
        border: 1px solid #dbeafe;
        border-radius: 11px;
        background: #eff6ff;
        color: #334155;
        font-size: 13px;
        line-height: 1.8;
    }

    .current-file a {
        color: #2563eb;
        font-weight: 700;
        text-decoration: none;
    }

    .current-file a:hover {
        text-decoration: underline;
    }

    .checkbox-row {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin: 18px 0;
        padding: 13px 14px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: #f8fafc;
    }

    .checkbox-row input[type="checkbox"] {
        width: 17px;
        height: 17px;
        margin: 2px 0 0;
        accent-color: #2563eb;
    }

    .checkbox-row label {
        margin: 0;
        color: #475569;
        font-size: 12px;
        line-height: 1.6;
    }

    .edit-lesson-dialog .lesson-actions {
        justify-content: flex-end;
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid #edf1f6;
    }

    /* Mobile layout */

    @media (max-width: 600px) {
        .lesson-card {
            padding: 20px 17px;
            border-radius: 15px;
        }

        .lesson-heading {
            align-items: flex-start;
        }

        .lesson-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .lesson-actions .button {
            width: 100%;
        }

        .edit-lesson-dialog {
            width: calc(100% - 24px);
            max-width: none;
            max-height: calc(100vh - 24px);
            padding: 20px 17px;
            border-radius: 16px;
        }

        .edit-lesson-dialog .lesson-actions {
            flex-direction: column-reverse;
        }

        .edit-lesson-dialog .lesson-actions .button {
            width: 100%;
        }
    }

</style>

<!-- Modern typography -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

<style id="mobile-reviewer-manage-lessons-premium">

    /* =========================================
       GLOBAL DESIGN
    ========================================= */

    :root {
        --ml-primary: #4f46e5;
        --ml-primary-dark: #3730a3;
        --ml-blue: #2563eb;
        --ml-text: #172033;
        --ml-muted: #64748b;
        --ml-border: #e2e8f0;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        min-height: 100vh;
        font-family: 'DM Sans', sans-serif !important;
        color: var(--ml-text);
        background:
            radial-gradient(
                ellipse at 7% 10%,
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
    .code,
    .badge {
        font-family: 'Space Grotesk', sans-serif !important;
    }

    /* =========================================
       NAVIGATION
    ========================================= */

    .navbar {
        position: sticky;
        top: 0;
        z-index: 100;
        background: rgba(255, 255, 255, 0.89);
        border-bottom: 1px solid rgba(226, 232, 240, 0.9);
        box-shadow: 0 4px 18px rgba(15, 23, 42, 0.035);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }

    .nav-inner {
        min-height: 72px;
        max-width: 1120px;
        padding: 13px 24px;
    }

    .brand,
    .back {
        color: #4338ca;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -0.7px;
        transition: color 0.2s ease;
    }

    .brand:hover,
    .back:hover {
        color: #6366f1;
    }

    /* =========================================
       MAIN LAYOUT
    ========================================= */

    .container {
        width: min(1080px, calc(100% - 36px));
        max-width: 1080px;
        margin: 38px auto 60px;
    }

    /* =========================================
       SUBJECT HEADER
    ========================================= */

    .header {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        padding: 34px;
        margin: 24px 0 32px;
        border: 1px solid #dbe3ff;
        border-radius: 23px;
        background:
            radial-gradient(
                ellipse at 95% 5%,
                rgba(129, 140, 248, 0.25),
                transparent 40%
            ),
            radial-gradient(
                ellipse at 0% 100%,
                rgba(96, 165, 250, 0.13),
                transparent 42%
            ),
            linear-gradient(
                135deg,
                #eaf0ff 0%,
                #ffffff 62%,
                #f5f3ff 100%
            );
        box-shadow:
            0 14px 35px rgba(49, 46, 129, 0.065),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    .header::before {
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
        letter-spacing: 0.7px;
    }

    .header h1 {
        margin: 16px 0 9px;
        color: #172554;
        font-size: clamp(28px, 4vw, 38px);
        font-weight: 700;
        line-height: 1.25;
        letter-spacing: -1.2px;
    }

    .header p {
        color: #53627d;
        font-size: 14px;
        line-height: 1.8;
    }

    .muted {
        color: var(--ml-muted);
        font-size: 13px;
        line-height: 1.75;
    }

    /* =========================================
       SUCCESS AND ERROR MESSAGES
    ========================================= */

    .success {
        margin-bottom: 22px;
        padding: 15px 18px;
        border: 1px solid #bbf7d0;
        border-left: 4px solid #22c55e;
        border-radius: 12px;
        background: linear-gradient(
            135deg,
            #ecfdf3,
            #f7fef9
        );
        color: #166534;
        font-size: 13px;
        font-weight: 650;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.04);
    }

    .error-list {
        margin-bottom: 20px;
        padding: 15px 18px;
        border: 1px solid #fecaca;
        border-left: 4px solid #ef4444;
        border-radius: 12px;
        background: #fff1f2;
        color: #991b1b;
        font-size: 13px;
        line-height: 1.8;
    }

    /* =========================================
       ADD NEW LESSON BUTTON
    ========================================= */

    button[data-open-new-lesson] {
        position: relative;
        isolation: isolate;
        min-height: 49px;
        padding: 12px 23px;
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
        box-shadow:
            0 6px 15px rgba(79, 70, 229, 0.18),
            inset 0 1px 0 rgba(255, 255, 255, 0.14);
        cursor: pointer;
        transition:
            transform 0.23s ease,
            box-shadow 0.23s ease,
            background 0.23s ease;
    }

    button[data-open-new-lesson]:hover {
        transform: translateY(-3px);
        background: linear-gradient(
            120deg,
            #3730a3,
            #4338ca,
            #4f46e5
        );
        box-shadow:
            0 13px 24px rgba(79, 70, 229, 0.24);
    }

    /* =========================================
       LESSON CARDS
    ========================================= */

    .lesson-card {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        margin-bottom: 23px;
        padding: 28px;
        border: 1px solid #dce5f7;
        border-radius: 21px;
        background:
            radial-gradient(
                ellipse at 100% 0%,
                rgba(224, 231, 255, 0.35),
                transparent 42%
            ),
            linear-gradient(
                145deg,
                #ffffff 0%,
                #f8faff 70%,
                #f5f7ff 100%
            );
        box-shadow:
            0 8px 24px rgba(31, 45, 75, 0.045),
            0 2px 6px rgba(15, 23, 42, 0.02);
        transition:
            transform 0.28s cubic-bezier(0.2, 0.8, 0.2, 1),
            box-shadow 0.28s ease,
            border-color 0.28s ease;
    }

    .lesson-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 24px;
        right: 24px;
        height: 4px;
        border-radius: 0 0 9px 9px;
        background: linear-gradient(
            90deg,
            #3730a3,
            #4f46e5,
            #818cf8,
            #60a5fa
        );
        z-index: -1;
    }

    .lesson-card:hover {
        transform: translateY(-5px);
        border-color: #a5b4fc;
        box-shadow:
            0 18px 38px rgba(49, 46, 129, 0.095),
            0 5px 12px rgba(15, 23, 42, 0.03);
    }

    .lesson-card > * {
        position: relative;
        z-index: 1;
    }

    /* Lesson heading */

    .lesson-heading {
        padding-bottom: 18px;
        margin-bottom: 18px;
        border-bottom: 1px solid #e7ebf5;
    }

    .lesson-heading h2 {
        margin: 0;
        color: #1e2b55;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: 19px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    /* =========================================
       STATUS BADGES
    ========================================= */

    .badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 999px;
        background: #f8fafc;
        color: #475569;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 0.35px;
    }

    .badge-published {
        border-color: #bbf7d0;
        background: #ecfdf3;
        color: #15803d;
    }

    .badge-published::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #22c55e;
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.10);
    }

    .badge-draft {
        border-color: #fde68a;
        background: #fffbeb;
        color: #92400e;
    }

    .badge-draft::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #f59e0b;
    }

    /* =========================================
       LESSON INFORMATION
    ========================================= */

    .lesson-card-details {
        margin-top: 17px;
    }

    .lesson-card-details p {
        margin: 10px 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.85;
    }

    .lesson-card-details p:first-child {
        color: #25366b;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: 17px;
        font-weight: 700;
        letter-spacing: -0.25px;
    }

    .lesson-card-details .file-note {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        max-width: 100%;
        margin-top: 13px;
        padding: 9px 13px;
        border: 1px solid #dbeafe;
        border-radius: 9px;
        background: linear-gradient(
            135deg,
            #eff6ff,
            #f8faff
        );
        color: #36558b;
        font-size: 11px;
        font-weight: 650;
        overflow-wrap: anywhere;
    }

    .current-file {
        border-color: #dbeafe;
        border-radius: 12px;
        background: linear-gradient(
            135deg,
            #eff6ff,
            #f8faff
        );
    }

    .current-file a {
        color: #4338ca;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .current-file a:hover {
        color: #2563eb;
        text-decoration: underline;
    }

    /* =========================================
       LESSON ACTION BUTTONS
    ========================================= */

    .lesson-actions {
        gap: 12px;
        margin-top: 22px;
        padding-top: 19px;
        border-top: 1px solid #e7ebf5;
    }

    .lesson-actions .button {
        min-height: 46px;
        padding: 11px 19px;
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
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 5px 12px rgba(79, 70, 229, 0.14);
        transition:
            transform 0.22s ease,
            box-shadow 0.22s ease,
            background 0.22s ease;
    }

    .lesson-actions .button:hover {
        transform: translateY(-3px);
        background: linear-gradient(
            120deg,
            #3730a3,
            #4338ca
        );
        color: #ffffff;
        box-shadow: 0 10px 19px rgba(79, 70, 229, 0.22);
    }

    .lesson-actions .button-secondary {
        border: 1px solid #c7d2fe;
        background: linear-gradient(
            135deg,
            #eef2ff,
            #ffffff
        );
        color: #4338ca;
        box-shadow: 0 3px 9px rgba(79, 70, 229, 0.045);
    }

    .lesson-actions .button-secondary:hover {
        transform: translateY(-3px);
        border-color: #818cf8;
        background: linear-gradient(
            135deg,
            #e0e7ff,
            #eef2ff
        );
        color: #312e81;
        box-shadow: 0 9px 17px rgba(79, 70, 229, 0.11);
    }

    /* =========================================
       ADD AND EDIT MODALS
    ========================================= */

    .new-lesson-dialog,
    .edit-lesson-dialog {
        border: 1px solid #dce4f5;
        border-radius: 22px;
        background: #ffffff;
        color: #172033;
        box-shadow:
            0 28px 85px rgba(15, 23, 42, 0.23),
            0 5px 18px rgba(49, 46, 129, 0.08);
    }

    .new-lesson-dialog::backdrop,
    .edit-lesson-dialog::backdrop {
        background: rgba(19, 27, 55, 0.63);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    .new-lesson-content,
    .edit-lesson-dialog {
        font-family: 'DM Sans', sans-serif !important;
    }

    .new-lesson-heading,
    .edit-modal-heading {
        padding-bottom: 20px;
        margin-bottom: 23px;
        border-bottom: 1px solid #e9edf6;
    }

    .new-lesson-heading h2,
    .edit-modal-heading h2 {
        color: #172554;
        font-family: 'Space Grotesk', sans-serif !important;
        font-size: 23px;
        font-weight: 700;
        letter-spacing: -0.6px;
    }

    .new-lesson-heading p,
    .edit-modal-heading p {
        color: #64748b;
        font-size: 13px;
        line-height: 1.75;
    }

    .new-lesson-label {
        color: #4f46e5;
        font-size: 10px;
        font-weight: 850;
        letter-spacing: 1px;
    }

    .edit-modal-close {
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: #f8fafc;
        color: #475569;
        transition: all 0.2s ease;
    }

    .edit-modal-close:hover {
        border-color: #fecaca;
        background: #fee2e2;
        color: #b91c1c;
    }

    /* Modal form fields */

    .new-lesson-dialog .form-group,
    .edit-lesson-dialog .form-group {
        margin-bottom: 20px;
    }

    .new-lesson-dialog label,
    .edit-lesson-dialog label {
        color: #334155;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 12px;
        font-weight: 750;
    }

    .new-lesson-dialog input[type="text"],
    .new-lesson-dialog input[type="file"],
    .new-lesson-dialog textarea,
    .edit-lesson-dialog input[type="text"],
    .edit-lesson-dialog input[type="file"],
    .edit-lesson-dialog textarea {
        width: 100%;
        padding: 13px 15px;
        border: 1px solid #dbe3f0;
        border-radius: 11px;
        background: #fbfcff;
        color: #172033;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 13px;
        transition:
            border-color 0.2s ease,
            box-shadow 0.2s ease,
            background 0.2s ease;
    }

    .new-lesson-dialog input[type="text"]:focus,
    .new-lesson-dialog textarea:focus,
    .edit-lesson-dialog input[type="text"]:focus,
    .edit-lesson-dialog textarea:focus {
        outline: none;
        border-color: #818cf8;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
    }

    .new-lesson-dialog textarea,
    .edit-lesson-dialog textarea {
        min-height: 135px;
        line-height: 1.75;
    }

    .new-lesson-dialog input[type="file"],
    .edit-lesson-dialog input[type="file"] {
        padding: 10px;
        background: #f8faff;
    }

    .file-note {
        color: #64748b;
        font-size: 11px;
        line-height: 1.7;
    }

    .checkbox-row {
        padding: 14px;
        border: 1px solid #dbe3f2;
        border-radius: 11px;
        background: #f8faff;
    }

    .checkbox-row input {
        accent-color: #4f46e5;
    }

    .checkbox-row label {
        color: #475569;
        font-size: 12px;
        line-height: 1.7;
    }

    /* Modal action buttons */

    .new-lesson-actions,
    .edit-lesson-dialog .lesson-actions {
        gap: 11px;
        margin-top: 25px;
        padding-top: 19px;
        border-top: 1px solid #e9edf6;
    }

    .new-lesson-actions .button,
    .edit-lesson-dialog .lesson-actions .button {
        min-height: 46px;
        border-radius: 11px;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 12px;
        font-weight: 800;
    }

    .new-lesson-actions .button:not(.button-secondary),
    .edit-lesson-dialog .lesson-actions .button:not(.button-secondary) {
        background: linear-gradient(
            120deg,
            #4338ca,
            #4f46e5,
            #6366f1
        );
        color: #ffffff;
        box-shadow: 0 5px 13px rgba(79, 70, 229, 0.15);
    }

    .new-lesson-actions .button-secondary,
    .edit-lesson-dialog .lesson-actions .button-secondary {
        border: 1px solid #dbe3f2;
        background: #f8fafc;
        color: #475569;
    }

    /* =========================================
       FOOTER AND EMPTY STATE
    ========================================= */

    .footer {
        color: #8894a8;
        font-size: 12px;
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
            margin-top: 24px;
        }

        .header {
            padding: 24px 20px;
            border-radius: 17px;
        }

        .lesson-card {
            padding: 22px 18px;
            border-radius: 17px;
        }

        .lesson-card:hover {
            transform: translateY(-2px);
        }

        .lesson-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .lesson-actions .button {
            width: 100%;
        }

        .new-lesson-dialog,
        .edit-lesson-dialog {
            width: calc(100% - 24px);
            max-width: none;
            max-height: calc(100vh - 24px);
            padding: 20px 17px;
            border-radius: 17px;
        }

        .new-lesson-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .new-lesson-actions .button,
        .edit-lesson-dialog .lesson-actions .button {
            width: 100%;
        }
    }

    /* Accessibility */

    .button:focus-visible,
    button[data-open-new-lesson]:focus-visible {
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

        .lesson-card:hover,
        .button:hover,
        button[data-open-new-lesson]:hover {
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
        <a class="mr-page-brand" href="{{ route('instructor.dashboard') }}">MobileReviewer.</a>
        <a class="mr-page-back" href="{{ route('instructor.dashboard') }}">← Back to Dashboard</a>
    </nav>
</header>



    <main class="container">
        <header class="header">
            <span class="code">{{ $subject->code }}</span>

            <h1>Manage Lessons</h1>

            <p><strong>{{ $subject->name }}</strong></p>

            <p class="muted">
                Section: {{ $subject->section }} ·
                Create, organize, and manage all lessons for your assigned subject.
            </p>
        </header>

        @if (session('success'))
            <div class="success" role="status">
                {{ session('success') }}
            </div>
        @endif

        <div class="lesson-toolbar" style="display:flex;justify-content:flex-end;margin:18px 0 22px;">
            <button
                class="button"
                type="button"
                data-open-new-lesson
            >
                + Add New Lesson
            </button>
        </div>

        @foreach ($lessons as $number => $lesson)
            @php
                $errorBag = $errors->getBag('lesson_' . $number);
            @endphp

            @if ($lesson && $lesson->exists)
                <section class="lesson-card">
                    <div class="lesson-heading">
                        <h2>Lesson {{ $number }}</h2>

                        <span class="badge {{ $lesson->is_published ? 'badge-published' : 'badge-draft' }}">
    @if ($lesson->is_published)
        Published
    @else
        Draft
    @endif
</span>
                    </div>

                    <div class="lesson-card-details">
                        <p><strong>{{ $lesson->title }}</strong></p>

                        @if ($lesson->content)
                            <p>{{ \Illuminate\Support\Str::limit($lesson->content, 160) }}</p>
                        @endif

                        <p class="file-note">
                            Material:
                            {{ $lesson->material_original_name ?: 'No material uploaded' }}
                        </p>
                    </div>

                    <div class="lesson-actions">
                        <button
                            class="button"
                            type="button"
                            data-open-edit-lesson="edit-lesson-dialog-{{ $number }}"
                        >
                            Manage Lesson
                        </button>

                        <a
                            class="button button-secondary"
                            href="{{ route('instructor.lessons.quiz.index', $lesson) }}"
                        >
                            Manage Quiz
                        </a>
                    </div>
                </section>

                <dialog
                    class="edit-lesson-dialog"
                    id="edit-lesson-dialog-{{ $number }}"
                    data-has-errors="{{ $errorBag->any() ? 'true' : 'false' }}"
                >
                    <div class="edit-modal-heading">
                        <div>
                            <h2>Manage Lesson {{ $number }}</h2>
                            <p>Update the lesson details and learning material.</p>
                        </div>

                        <button
                            class="edit-modal-close"
                            type="button"
                            data-close-edit-lesson
                            aria-label="Close"
                        >
                            &times;
                        </button>
                    </div>

                    @if ($errorBag->any())
                        <div class="error-list">
                            @foreach ($errorBag->all() as $message)
                                <div>{{ $message }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form
                        action="{{ route('instructor.subjects.lessons.store', [
                            'subject' => $subject->id,
                            'lessonNumber' => $number
                        ]) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <div class="form-group">
                            <label for="edit_title_{{ $number }}">
                                Lesson title
                            </label>

                            <input
                                id="edit_title_{{ $number }}"
                                type="text"
                                name="title"
                                maxlength="255"
                                value="{{ old('title', $lesson->title) }}"
                                placeholder="Enter the lesson title"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="edit_content_{{ $number }}">
                                Reviewer notes (optional)
                            </label>

                            <textarea
                                id="edit_content_{{ $number }}"
                                name="content"
                                placeholder="Write review notes or learning objectives..."
                            >{{ old('content', $lesson->content) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="edit_material_{{ $number }}">
                                Replace lesson material (optional)
                            </label>

                            <input
                                id="edit_material_{{ $number }}"
                                type="file"
                                name="material"
                                accept=".pdf,.doc,.docx,.ppt,.pptx"
                            >

                            <p class="file-note">
                                Accepted formats: PDF, DOC, DOCX, PPT, PPTX.
                                Maximum file size: 20 MB.
                            </p>
                        </div>

                        @if ($lesson->material_path)
                            <div class="current-file">
                                <strong>Current file:</strong>
                                {{ $lesson->material_original_name }}

                                <br>

                                <a href="{{ route('lesson-materials.download', $lesson) }}">
                                    Download current material
                                </a>
                            </div>
                        @endif

                        <div class="checkbox-row">
                            <input
                                id="edit_published_{{ $number }}"
                                type="checkbox"
                                name="is_published"
                                value="1"
                                @checked(old('is_published', $lesson->is_published))
                            >

                            <label for="edit_published_{{ $number }}">
                                Publish this lesson so students can access it.
                            </label>
                        </div>

                        <div class="lesson-actions">
                            <button class="button" type="submit">
                                Update Lesson
                            </button>

                            <button
                                class="button button-secondary"
                                type="button"
                                data-close-edit-lesson
                            >
                                Cancel
                            </button>
                        </div>
                    </form>
                </dialog>
            @endif
        @endforeach
@php
    $newLessonErrorBag = $errors->getBag('lesson_' . $nextLessonNumber);
@endphp

<dialog
    class="new-lesson-dialog"
    id="new-lesson-dialog"
    aria-labelledby="new-lesson-title"
    data-has-errors="{{ $newLessonErrorBag->any() ? 'true' : 'false' }}"
>
    <div class="new-lesson-content">

        <div class="new-lesson-heading">
            <div>
                <span class="new-lesson-label">CREATE NEW CONTENT</span>
                <h2 id="new-lesson-title">
                    Add Lesson {{ $nextLessonNumber }}
                </h2>
                <p>
                    Add a new lesson to {{ $subject->code }}.
                </p>
            </div>

            <button
                type="button"
                class="new-lesson-close"
                data-close-new-lesson
                aria-label="Close modal"
            >
                &times;
            </button>
        </div>

        @if ($newLessonErrorBag->any())
            <div class="error-list" role="alert">
                @foreach ($newLessonErrorBag->all() as $message)
                    <div>{{ $message }}</div>
                @endforeach
            </div>
        @endif

        <form
            action="{{ route('instructor.subjects.lessons.store', [
                'subject' => $subject->id,
                'lessonNumber' => $nextLessonNumber
            ]) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="form-group">
                <label for="new_lesson_title">Lesson title</label>

                <input
                    id="new_lesson_title"
                    type="text"
                    name="title"
                    maxlength="255"
                    value="{{ old('title') }}"
                    placeholder="Enter the lesson title"
                    required
                >
            </div>

            <div class="form-group">
                <label for="new_lesson_content">
                    Reviewer notes (optional)
                </label>

                <textarea
                    id="new_lesson_content"
                    name="content"
                    placeholder="Write review notes or learning objectives..."
                >{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="new_lesson_material">
                    Upload lesson material (optional)
                </label>

                <input
                    id="new_lesson_material"
                    type="file"
                    name="material"
                    accept=".pdf,.doc,.docx,.ppt,.pptx"
                >

                <p class="file-note">
                    Accepted formats: PDF, DOC, DOCX, PPT, PPTX.
                    Maximum file size: 20 MB.
                </p>
            </div>

            <div class="checkbox-row">
                <input
                    id="new_lesson_published"
                    type="checkbox"
                    name="is_published"
                    value="1"
                    @checked(old('is_published', false))
                >

                <label for="new_lesson_published">
                    Publish this lesson so students can access it.
                </label>
            </div>

            <div class="new-lesson-actions">
                <button
                    class="button button-secondary"
                    type="button"
                    data-close-new-lesson
                >
                    Cancel
                </button>

                <button class="button" type="submit">
                    Save Lesson {{ $nextLessonNumber }}
                </button>
            </div>
        </form>
    </div>
</dialog>
    </main>

    <footer class="footer">
        MobileReviewer. Instructor Workspace.
    </footer>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dialog = document.getElementById('new-lesson-dialog');

    if (!dialog) {
        return;
    }

    const openButton = document.querySelector('[data-open-new-lesson]');
    const closeButtons = dialog.querySelectorAll('[data-close-new-lesson]');

    if (openButton) {
        openButton.addEventListener('click', function () {
            if (!dialog.open) {
                dialog.showModal();
            }
        });
    }

    closeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            dialog.close();
        });
    });

    dialog.addEventListener('click', function (event) {
        if (event.target === dialog) {
            dialog.close();
        }
    });

    // Reopen the modal automatically when new-lesson validation fails.
    if (dialog.dataset.hasErrors === 'true') {
        dialog.showModal();
    }
});
</script>
<script>
    // Edit lesson modal controls

    document.querySelectorAll("[data-open-edit-lesson]").forEach((button) => {
        button.addEventListener("click", () => {
            const dialog = document.getElementById(
                button.dataset.openEditLesson
            );

            if (dialog) {
                dialog.showModal();
            }
        });
    });

    document.querySelectorAll(".edit-lesson-dialog").forEach((dialog) => {
        dialog.querySelectorAll("[data-close-edit-lesson]").forEach((button) => {
            button.addEventListener("click", () => {
                dialog.close();
            });
        });

        dialog.addEventListener("click", (event) => {
            if (event.target === dialog) {
                dialog.close();
            }
        });

        if (dialog.dataset.hasErrors === "true") {
            dialog.showModal();
        }
    });
</script>
</body>
</html>
