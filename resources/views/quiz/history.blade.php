
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviewer History | Mobile Reviewer</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px 16px;
            font-family: 'Inter', sans-serif;
            background: #f3f6f8;
            color: #263238;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header,
        .history-card {
            background: white;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        }

        .header {
            border-top: 5px solid #0b5231;
        }

        h1 {
            color: #0b5231;
            margin: 0 0 8px;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 750px;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 15px 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            vertical-align: middle;
        }

        th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            text-transform: uppercase;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .score {
            font-weight: 800;
            color: #0b5231;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .completed {
            background: #e7f5eb;
            color: #176534;
        }

        .ongoing {
            background: #fff4e5;
            color: #8a5700;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 37px;
            padding: 9px 14px;
            border-radius: 8px;
            background: #0b5231;
            color: white;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }

        .button:hover {
            background: #084126;
        }

        .empty {
            padding: 45px 20px;
            text-align: center;
            color: #64748b;
        }

        .actions {
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            body {
                padding: 14px 10px;
            }

            .header, .history-card {
                padding: 18px;
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
        <a class="mr-page-back" href="{{ route('student.dashboard') }}">← Back to Dashboard</a>
    </nav>
</header>

    <main class="container">

        <section class="header">
            <h1>Reviewer History</h1>

            <p class="muted">
                View your previous reviewer attempts, scores,
                and completion dates.
            </p>
        </section>

        <section class="history-card">

            @if ($attempts->isNotEmpty())

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Subject</th>
                                <th>Lesson</th>
                                <th>Score</th>
                                <th>Percentage</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($attempts as $attempt)
                                @php
                                    $isCompleted = $attempt->completed_at !== null;

                                    $percentage = $isCompleted
                                        && $attempt->total_questions > 0
                                        ? round(
                                            ($attempt->score / $attempt->total_questions) * 100,
                                            1
                                        )
                                        : null;
                                @endphp

                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <strong>
                                            {{ $attempt->lesson->subject->code }}
                                        </strong>
                                    </td>

                                    <td>
                                        {{ $attempt->lesson->title }}
                                    </td>

                                    <td class="score">
                                        @if ($isCompleted)
                                            {{ $attempt->score }}
                                            /
                                            {{ $attempt->total_questions }}
                                        @else
                                            Not finished
                                        @endif
                                    </td>

                                    <td>
                                        {{ $percentage !== null
                                            ? $percentage . '%'
                                            : '—' }}
                                    </td>

                                    <td>
                                        @if ($isCompleted)
                                            <span class="status completed">
                                                Completed
                                            </span>
                                        @else
                                            <span class="status ongoing">
                                                In Progress
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $isCompleted
                                            ? $attempt->completed_at->format('M d, Y h:i A')
                                            : $attempt->created_at->format('M d, Y h:i A') }}
                                    </td>

                                    <td>
                                        <a
                                            href="{{ route('quiz.take', $attempt) }}"
                                            class="button"
                                        >
                                            {{ $isCompleted
                                                ? 'View Results'
                                                : 'Continue' }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else

                <div class="empty">
                    <h2>No Reviewer History Yet</h2>

                    <p>
                        Your completed reviewer attempts will
                        appear here.
                    </p>
                </div>

            @endif

            <div class="actions">

            </div>

        </section>

    </main>
</body>
</html>
