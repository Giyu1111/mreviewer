<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notifications | MobileReviewer</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;500;600;700&family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f5f7ff;
            color: #202344;
            font-family: 'Nunito', sans-serif;
        }

        .mr-page-navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid #e8edf5;
            box-shadow: 0 3px 15px rgba(15,23,42,.035);
        }

        .mr-page-nav-inner {
            max-width: 1180px;
            min-height: 72px;
            margin: auto;
            padding: 13px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .mr-page-brand {
            color: #4338ca;
            font-family: 'Comfortaa', cursive;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -.8px;
            text-decoration: none;
            white-space: nowrap;
        }

        .mr-page-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 10px 16px;
            border: 1px solid #e0e7ff;
            border-radius: 10px;
            background: #eef2ff;
            color: #4f46e5;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            white-space: nowrap;
        }

        .mr-page-back:hover {
            background: #e0e7ff;
            color: #3730a3;
        }

        .container {
            width: min(100% - 32px, 900px);
            margin: 38px auto 60px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 22px;
        }

        .page-heading h1 {
            margin: 0 0 6px;
            color: #202344;
            font-family: 'Comfortaa', cursive;
            font-size: clamp(25px, 4vw, 32px);
        }

        .page-heading p {
            margin: 0;
            color: #777b98;
            font-size: 14px;
        }

        .unread-summary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 13px;
            border: 1px solid #e0e7ff;
            border-radius: 20px;
            background: #eef2ff;
            color: #4338ca;
            font-size: 12px;
            font-weight: 900;
            white-space: nowrap;
        }

        .notice {
            padding: 13px 16px;
            margin-bottom: 17px;
            border-radius: 10px;
            background: #ecfdf5;
            color: #047857;
            font-size: 13px;
            font-weight: 800;
        }

        .notification-toolbar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .text-button {
            padding: 9px 14px;
            border: 1px solid #e0e7ff;
            border-radius: 9px;
            background: white;
            color: #4f46e5;
            font: 800 12px 'Nunito', sans-serif;
            cursor: pointer;
        }

        .text-button:hover {
            background: #eef2ff;
        }

        .notification-list {
            display: flex;
            flex-direction: column;
            gap: 13px;
        }

        .notification-card {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 19px;
            border: 1px solid #e5e7f3;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 20px rgba(42,48,105,.035);
        }

        .notification-card.unread {
            border-color: #c7d2fe;
            background: #fcfcff;
        }

        .notification-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: #eef0ff;
            font-size: 20px;
        }

        .notification-content {
            flex: 1;
            min-width: 0;
        }

        .notification-title {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            margin: 1px 0 6px;
            font-family: 'Comfortaa', cursive;
            font-size: 15px;
            font-weight: 700;
        }

        .unread-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #4f46e5;
        }

        .notification-message {
            margin: 0 0 9px;
            color: #626780;
            font-size: 13px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .notification-time {
            color: #9295aa;
            font-size: 11px;
            font-weight: 800;
        }

        .notification-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 9px;
            margin-top: 12px;
        }

        .action-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 34px;
            padding: 7px 11px;
            border-radius: 8px;
            background: #eef2ff;
            color: #4338ca;
            font-size: 12px;
            font-weight: 900;
            text-decoration: none;
        }

        .action-link:hover {
            background: #e0e7ff;
        }

        .empty-state {
            padding: 55px 20px;
            border: 1px dashed #d8dcef;
            border-radius: 16px;
            background: white;
            text-align: center;
        }

        .empty-icon {
            margin-bottom: 13px;
            font-size: 38px;
        }

        .empty-state h2 {
            margin: 0 0 7px;
            font-family: 'Comfortaa', cursive;
            font-size: 19px;
        }

        .empty-state p {
            margin: 0;
            color: #8589a2;
            font-size: 13px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 24px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        .pagination nav > div:first-child {
            display: none;
        }

        .pagination nav > div:last-child {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            align-items: center;
        }

        .pagination a,
        .pagination span[aria-current],
        .pagination span[aria-disabled] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            min-height: 36px;
            padding: 6px 10px;
            border: 1px solid #e5e7f3;
            border-radius: 8px;
            background: white;
            color: #4f46e5;
            font-size: 12px;
            text-decoration: none;
        }

        .pagination span[aria-current] {
            background: #4f46e5;
            color: white;
        }

        @media (max-width: 600px) {
            .mr-page-nav-inner {
                min-height: 64px;
                padding: 11px 16px;
            }

            .mr-page-brand {
                font-size: 19px;
            }

            .mr-page-back {
                min-height: 40px;
                padding: 9px 12px;
                font-size: 13px;
            }

            .container {
                margin-top: 27px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .notification-card {
                padding: 15px;
                gap: 11px;
            }

            .notification-icon {
                width: 38px;
                height: 38px;
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
            <a class="mr-page-brand" href="{{ route('student.dashboard') }}">
                MobileReviewer.
            </a>

            <a class="mr-page-back" href="{{ route('student.dashboard') }}">
                ← Back to Dashboard
            </a>
        </nav>
    </header>

    <main class="container">
        <div class="page-heading">
            <div>
                <h1>Notifications</h1>
                <p>Stay updated with your lessons and reviewer quizzes.</p>
            </div>

            <span class="unread-summary">
                {{ $unreadCount }} Unread
            </span>
        </div>

        @if (session('status'))
            <div class="notice">
                {{ session('status') }}
            </div>
        @endif

        @if ($unreadCount > 0)
            <div class="notification-toolbar">
                <form
                    method="POST"
                    action="{{ route('student.notifications.read-all') }}"
                >
                    @csrf
                    @method('PATCH')

                    <button class="text-button" type="submit">
                        Mark all as read
                    </button>
                </form>
            </div>
        @endif

        @if ($notifications->count() > 0)
            <div class="notification-list">
                @foreach ($notifications as $notification)
                    @php
                        $type = $notification->data['type'] ?? 'update';
                        $isUnread = is_null($notification->read_at);

                        $icon = match ($type) {
                            'new_lesson' => '📚',
                            'new_quiz' => '📝',
                            default => '🔔',
                        };
                    @endphp

                    <article class="notification-card {{ $isUnread ? 'unread' : '' }}">
                        <div class="notification-icon">
                            {{ $icon }}
                        </div>

                        <div class="notification-content">
                            <h2 class="notification-title">
                                {{ $notification->data['title'] ?? 'MobileReviewer Update' }}

                                @if ($isUnread)
                                    <span class="unread-dot" title="Unread"></span>
                                @endif
                            </h2>

                            <p class="notification-message">
                                {{ $notification->data['message'] ?? 'You have a new update.' }}
                            </p>

                            <span class="notification-time">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>

                            <div class="notification-actions">
                                @if (!empty($notification->data['url']))
                                    <a
                                        class="action-link"
                                        href="{{ $notification->data['url'] }}"
                                    >
                                        Open Update →
                                    </a>
                                @endif

                                @if ($isUnread)
                                    <form
                                        method="POST"
                                        action="{{ route('student.notifications.read', $notification->id) }}"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <button class="text-button" type="submit">
                                            Mark as read
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="pagination">
                {{ $notifications->links() }}
            </div>
        @else
            <section class="empty-state">
                <div class="empty-icon">🔔</div>
                <h2>You're all caught up!</h2>
                <p>New lesson and quiz updates will appear here.</p>
            </section>
        @endif
    </main>
</body>
</html>
