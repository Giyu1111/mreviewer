<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings | MobileReviewer</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;500;600;700&family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --background: #f5f7ff;
            --surface: #ffffff;
            --text: #202344;
            --muted: #777b98;
            --border: #e5e7f3;
            --success-bg: #ecfdf5;
            --success-text: #047857;
            --danger-bg: #fef2f2;
            --danger-text: #b91c1c;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--background);
            color: var(--text);
            font-family: 'Nunito', sans-serif;
        }

        .navbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 16px 24px;
        }

        .nav-inner {
            max-width: 1080px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .brand {
            color: var(--primary-dark);
            text-decoration: none;
            font-family: 'Comfortaa', cursive;
            font-size: 21px;
            font-weight: 700;
        }

        .back-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 800;
            font-size: 14px;
        }

        .back-link:hover {
            color: var(--primary-dark);
        }

        .container {
            width: min(100% - 32px, 900px);
            margin: 42px auto 60px;
        }

        .page-heading {
            margin-bottom: 26px;
        }

        .page-heading h1 {
            margin: 0 0 8px;
            font-family: 'Comfortaa', cursive;
            font-size: clamp(25px, 4vw, 34px);
            font-weight: 700;
            color: var(--text);
        }

        .page-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.6;
        }

        .account-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 28px;
            margin-bottom: 22px;
            box-shadow: 0 8px 28px rgba(42, 48, 105, 0.045);
        }

        .card-heading {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 24px;
        }

        .card-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: #eef0ff;
            color: var(--primary);
            font-size: 21px;
        }

        .card-heading h2 {
            margin: 1px 0 5px;
            font-family: 'Comfortaa', cursive;
            font-size: 18px;
        }

        .card-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: 900;
            color: #414665;
        }

        input {
            width: 100%;
            min-height: 48px;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 11px;
            outline: none;
            background: #fcfcff;
            color: var(--text);
            font: 600 14px 'Nunito', sans-serif;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, .10);
        }

        input[readonly] {
            background: #f3f4f8;
            color: var(--muted);
            cursor: not-allowed;
        }

        .field-error {
            color: var(--danger-text);
            font-size: 12px;
            font-weight: 700;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 11px 20px;
            border: 0;
            border-radius: 10px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            font: 900 13px 'Nunito', sans-serif;
            cursor: pointer;
            transition: background .2s, transform .2s;
        }

        .button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 22px;
        }

        .notice {
            padding: 13px 16px;
            border-radius: 11px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 800;
        }

        .notice-success {
            background: var(--success-bg);
            color: var(--success-text);
            border: 1px solid #a7f3d0;
        }

        .notice-error {
            background: var(--danger-bg);
            color: var(--danger-text);
            border: 1px solid #fecaca;
        }

        .notice ul {
            margin: 6px 0 0;
            padding-left: 20px;
        }

        .account-type {
            display: inline-flex;
            align-items: center;
            padding: 6px 11px;
            border-radius: 20px;
            background: #eef0ff;
            color: var(--primary-dark);
            font-size: 12px;
            font-weight: 900;
            text-transform: capitalize;
        }

        .security-note {
            margin-top: 18px;
            padding: 13px 15px;
            border-radius: 10px;
            background: #f5f6ff;
            color: #666b8b;
            font-size: 12px;
            line-height: 1.6;
        }

        @media (max-width: 620px) {
            .navbar {
                padding: 14px 16px;
            }

            .brand {
                font-size: 18px;
            }

            .container {
                margin-top: 28px;
            }

            .account-card {
                padding: 21px 17px;
                border-radius: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-actions .button {
                width: 100%;
            }
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
        <a class="mr-page-brand" href="{{ route('dashboard') }}">MobileReviewer.</a>
        <a class="mr-page-back" href="{{ route('dashboard') }}">← Back to Dashboard</a>
    </nav>
</header>



    <main class="container">
        <div class="page-heading">
            <h1>Account Settings</h1>
            <p>Manage your personal information and keep your account credentials secure.</p>
        </div>

        @if (session('profile_status'))
            <div class="notice notice-success">
                {{ session('profile_status') }}
            </div>
        @endif

        @if (session('password_status'))
            <div class="notice notice-success">
                {{ session('password_status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="notice notice-error">
                Please review the following:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="account-card">
            <div class="card-heading">
                <div class="card-icon">👤</div>
                <div>
                    <h2>Profile Information</h2>
                    <p>Update the name and email address associated with your account.</p>
                </div>
            </div>

            <form method="POST" action="{{ route('account.settings.profile') }}">
                @csrf
                @method('PATCH')

                <div class="form-grid">
                    <div class="form-group full">
                        <label for="name">Full Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', auth()->user()->name) }}"
                            maxlength="255"
                            autocomplete="name"
                            required
                        >
                    </div>

                    <div class="form-group full">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', auth()->user()->email) }}"
                            maxlength="255"
                            autocomplete="email"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label>Account Type</label>
                        <div>
                            <span class="account-type">{{ auth()->user()->role }}</span>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button class="button" type="submit">Save Profile Changes</button>
                </div>
            </form>
        </section>

        <section class="account-card">
            <div class="card-heading">
                <div class="card-icon">🔒</div>
                <div>
                    <h2>Security & Credentials</h2>
                    <p>Change your password to help protect your account.</p>
                </div>
            </div>

            <form method="POST" action="{{ route('account.settings.password') }}">
                @csrf
                @method('PATCH')

                <div class="form-grid">
                    <div class="form-group full">
                        <label for="current_password">Current Password</label>
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            minlength="8"
                            autocomplete="new-password"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            minlength="8"
                            autocomplete="new-password"
                            required
                        >
                    </div>
                </div>

                <div class="security-note">
                    For your security, you must enter your current password before changing it.
                    Your new password must contain at least 8 characters.
                </div>

                <div class="form-actions">
                    <button class="button" type="submit">Update Password</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
