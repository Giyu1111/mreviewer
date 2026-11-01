
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f5f7fb">

    <title>Sign In | Mobile Reviewer</title>

    <style>
        :root {
            --primary: #3157d5;
            --primary-dark: #2445b5;
            --background: #f5f7fb;
            --surface: #ffffff;
            --text: #182230;
            --muted: #718096;
            --border: #e4e9f1;
            --danger: #dc2626;
            --success: #15803d;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at 10% 10%, #e8edff 0, transparent 32%),
                radial-gradient(circle at 90% 90%, #eaf3ff 0, transparent 30%),
                var(--background);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
        }

        button,
        input {
            font: inherit;
        }

        .navbar {
            width: 100%;
            border-bottom: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.88);
        }

        .nav-inner {
            width: 100%;
            max-width: 1120px;
            min-height: 76px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text);
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            color: white;
            background: var(--primary);
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -1px;
            box-shadow: 0 5px 12px rgba(49, 87, 213, 0.2);
        }

        .brand-name {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .nav-label {
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
        }

        main {
            width: 100%;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 52px 20px;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 440px;
        }

        .portal-heading {
            margin-bottom: 25px;
            text-align: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 17px;
            padding: 8px 13px;
            border: 1px solid #dce4ff;
            border-radius: 30px;
            background: #edf1ff;
            color: var(--primary);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #3157d5;
        }

        .portal-heading h1 {
            margin-bottom: 10px;
            font-size: 31px;
            font-weight: 800;
            letter-spacing: -1.1px;
        }

        .portal-heading h1 span {
            color: var(--primary);
        }

        .portal-heading p {
            max-width: 340px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .auth-card {
            padding: 34px;
            border: 1px solid var(--border);
            border-radius: 19px;
            background: var(--surface);
            box-shadow: 0 18px 55px rgba(24, 34, 48, 0.075);
        }

        .card-heading {
            margin-bottom: 25px;
        }

        .card-heading h2 {
            margin-bottom: 7px;
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -0.6px;
        }

        .card-heading p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .access-label {
            margin-bottom: 10px;
            color: #64748b;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .access-roles {
            display: flex;
            gap: 9px;
            margin-bottom: 25px;
        }


.role-option {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px;
    border: 1px solid var(--border);
    border-radius: 9px;
    background: #fafbfe;
    color: #475569;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.2s ease;
}

.role-option:hover {
    border-color: var(--primary);
}

.role-option.is-active {
    border-color: var(--primary);
    background: #edf1ff;
    color: var(--primary);
}

.role-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #cbd5e1;
}

.role-option.is-active .role-dot {
    background: var(--primary);
}


        .role-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #3157d5;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #344054;
            font-size: 13px;
            font-weight: 700;
        }

        .input-wrap {
            position: relative;
        }

        .form-control {
            width: 100%;
            height: 49px;
            padding: 0 14px;
            border: 1px solid #dce2eb;
            border-radius: 9px;
            outline: none;
            background: #ffffff;
            color: var(--text);
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control::placeholder {
            color: #a0aaba;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(49, 87, 213, 0.11);
        }

        .password-input {
            padding-right: 76px;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 13px;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 2px 0 22px;
            color: #64748b;
            font-size: 13px;
            cursor: pointer;
        }

        .remember-row input {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 49px;
            padding: 12px 16px;
            border: 0;
            border-radius: 9px;
            background: var(--primary);
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }

        .button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .button-arrow {
            margin-left: 9px;
            font-size: 17px;
        }

        .error-box {
            margin-bottom: 19px;
            padding: 12px 14px;
            border: 1px solid #fecaca;
            border-radius: 9px;
            background: #fef2f2;
            color: var(--danger);
            font-size: 13px;
            line-height: 1.6;
        }

        .error-message {
            display: block;
            margin-top: 6px;
            color: var(--danger);
            font-size: 12px;
        }

        .register-panel {
            margin-top: 19px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #ffffff;
        }

        .register-panel summary {
            padding: 16px;
            color: var(--primary);
            font-size: 13px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            list-style: none;
        }

        .register-panel summary::-webkit-details-marker {
            display: none;
        }

        .register-panel summary::after {
            content: "+";
            margin-left: 8px;
            font-size: 16px;
        }

        .register-panel[open] summary::after {
            content: "−";
        }

        .register-content {
            padding: 0 20px 22px;
            border-top: 1px solid var(--border);
        }

        .register-content h3 {
            margin: 20px 0 7px;
            font-size: 17px;
        }

        .register-content > p {
            margin-bottom: 19px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .password-note {
            margin-top: 7px;
            color: var(--muted);
            font-size: 11px;
        }

        .footer {
            padding: 22px 16px;
            border-top: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.65);
            text-align: center;
        }

        .security-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-bottom: 8px;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
        }

        .security-icon {
            color: var(--success);
        }

        .footer p {
            color: #94a3b8;
            font-size: 11px;
        }

        @media (max-width: 600px) {
            .nav-inner {
                min-height: 65px;
                padding: 0 17px;
            }

            .brand-mark {
                width: 37px;
                height: 37px;
                border-radius: 10px;
            }

            .brand-name {
                font-size: 16px;
            }

            .nav-label {
                font-size: 11px;
            }

            main {
                align-items: flex-start;
                padding: 38px 16px;
            }

            .portal-heading h1 {
                font-size: 27px;
            }

            .auth-card {
                padding: 25px 21px;
            }
        }

        @media (max-width: 360px) {
            .nav-label {
                display: none;
            }

            .access-roles {
                flex-wrap: wrap;
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
<link rel="icon" type="image/svg+xml" href="{{ asset('mr-mark.svg') }}">
<link rel="stylesheet" href="{{ asset('theme.css') }}">
<script defer src="{{ asset('theme.js') }}"></script>
</head>

<body>
    <header class="navbar">
        <nav class="nav-inner" aria-label="Main navigation">
            <a class="brand" href="{{ route('login') }}">
                <span class="brand-mark">MR</span>

                <span class="brand-name">
                    MobileReviewer.
                </span>
            </a>

            <span class="nav-label">
                Official Learning Portal
            </span>
        </nav>
    </header>

    <main>
        <div class="auth-wrapper">

            <section class="portal-heading">
                <span class="eyebrow">
                    <span class="eyebrow-dot"></span>
                    Official Learning Portal
                </span>

                <h1>
                    Welcome to <span>Mobile Reviewer</span>
                </h1>

                <p>
                    Access your learning materials, lessons, and
                    assessments through your account.
                </p>
            </section>

            <!-- LOGIN PANEL -->
            <section class="auth-card">

                <div class="card-heading">
                    <h2>Sign in</h2>

                    <p>
                        Enter your account credentials to continue
                        to your workspace.
                    </p>
                </div>

                <div class="access-label">
                    Workspace access
                </div>


<div class="access-roles" role="group" aria-label="Select account role">

    <button
        class="role-option {{ old('role', 'student') === 'student' ? 'is-active' : '' }}"
        type="button"
        data-role="student"
        aria-pressed="{{ old('role', 'student') === 'student' ? 'true' : 'false' }}"
        onclick="selectLoginRole('student')"
    >
        <span class="role-dot"></span>
        Student
    </button>

    <button
        class="role-option {{ old('role', 'student') === 'instructor' ? 'is-active' : '' }}"
        type="button"
        data-role="instructor"
        aria-pressed="{{ old('role', 'student') === 'instructor' ? 'true' : 'false' }}"
        onclick="selectLoginRole('instructor')"
    >
        <span class="role-dot"></span>
        Instructor
    </button>

</div>


                @if ($errors->login->any())
                    <div class="error-box">
                        {{ $errors->login->first() }}
                    </div>
                @endif

                <form action="{{ route('login.store', [], false) }}" method="POST">
                    @csrf
                    <input
    type="hidden"
    id="login_role"
    name="role"
    value="{{ old('role', 'student') }}"
>

                    <div class="form-group">
                        <label for="login_email">
                            Email Address
                        </label>

                        <input
                            class="form-control"
                            id="login_email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email address"
                            autocomplete="username"
                            required
                        >


                    </div>

                    <div class="form-group">
                        <label for="login_password">
                            Password
                        </label>

                        <div class="input-wrap">
                            <input
                                class="form-control password-input"
                                id="login_password"
                                type="password"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                class="password-toggle"
                                type="button"
                                onclick="togglePassword('login_password', this)"
                                aria-label="Show password"
                            >
                                Show
                            </button>
                        </div>


                    </div>

                    <label class="remember-row">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                        >

                        Remember me
                    </label>

                    <button class="button" type="submit">
                        Continue to workspace
                        <span class="button-arrow">&rarr;</span>
                    </button>
                </form>
            </section>

            <!-- STUDENT REGISTRATION -->
            <details
                class="register-panel"
                @if ($errors->register->any()) open @endif
            >
                <summary>
                    New to Mobile Reviewer? Create a student account
                </summary>

                <div class="register-content">
                    <h3>Create an Account</h3>

                    <p>
                        Register as a student to access your learning
                        materials and review activities.
                    </p>

                    @if ($errors->register->any())
                        <div class="error-box">
                            @foreach ($errors->register->all() as $message)
                                <div>{{ $message }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('register', [], false) }}" method="POST">
                        @csrf
                        <input
    type="hidden"
    id="login_role"
    name="role"
    value="{{ old('role', 'student') }}"
>

                        <div class="form-group">
                            <label for="register_name">
                                Full Name
                            </label>

                            <input
                                class="form-control"
                                id="register_name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter your full name"
                                autocomplete="name"
                                maxlength="255"
                                required
                            >

                            @error('name', 'register')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="register_email">
                                Email Address
                            </label>

                            <input
                                class="form-control"
                                id="register_email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                autocomplete="email"
                                required
                            >

                            @error('email', 'register')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="register_password">
                                Password
                            </label>

                            <div class="input-wrap">
                                <input
                                    class="form-control password-input"
                                    id="register_password"
                                    type="password"
                                    name="password"
                                    placeholder="Create a password"
                                    autocomplete="new-password"
                                    minlength="8"
                                    required
                                >

                                <button
                                    class="password-toggle"
                                    type="button"
                                    onclick="togglePassword('register_password', this)"
                                >
                                    Show
                                </button>
                            </div>

                            <p class="password-note">
                                Use at least 8 characters.
                            </p>

                            @error('password', 'register')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">
                                Confirm Password
                            </label>

                            <div class="input-wrap">
                                <input
                                    class="form-control password-input"
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    placeholder="Enter your password again"
                                    autocomplete="new-password"
                                    minlength="8"
                                    required
                                >

                                <button
                                    class="password-toggle"
                                    type="button"
                                    onclick="togglePassword('password_confirmation', this)"
                                >
                                    Show
                                </button>
                            </div>
                        </div>

                        <button class="button" type="submit">
                            Create Student Account
                            <span class="button-arrow">&rarr;</span>
                        </button>
                    </form>
                </div>
            </details>

        </div>
    </main>

    <footer class="footer">
        <div class="security-note">
            <span class="security-icon">&#10003;</span>
            Secure session &middot; Authorized users only
        </div>

        <p>
            &copy; {{ date('Y') }} MobileReviewer. All rights reserved.
        </p>
    </footer>

    <script>

function selectLoginRole(role) {
    const roleInput = document.getElementById('login_role');

    if (!roleInput || !['student', 'instructor'].includes(role)) {
        return;
    }

    roleInput.value = role;

    document.querySelectorAll('.role-option').forEach(button => {
        const selected = button.dataset.role === role;

        button.classList.toggle('is-active', selected);
        button.setAttribute('aria-pressed', selected ? 'true' : 'false');
    });
}

        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);

            if (!input) {
                return;
            }

            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            button.textContent = isHidden ? 'Hide' : 'Show';
            button.setAttribute(
                'aria-label',
                isHidden ? 'Hide password' : 'Show password'
            );
        }
    </script>
</body>
</html>
