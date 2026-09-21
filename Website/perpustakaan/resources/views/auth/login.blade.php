<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Perpustakaan</title>

    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

    <!-- Font Google Inter -->
    {{-- Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #F8FAFC;
            color: #111827;
            font-family: 'Inter', sans-serif;
        }

        /* Page Section */
        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
        }

        /* =========================
       BRAND
    ========================= */

        .login-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 26px;
            text-align: center;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            margin-bottom: 13px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        .brand-title {
            margin: 0;
            color: #111827;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .brand-description {
            margin: 7px 0 0;
            color: #64748B;
            font-size: 13px;
            line-height: 1.5;
        }

        /* =========================
       CARD
    ========================= */

        .login-card {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            padding: 30px;

            box-shadow: 0 10px 30px rgba(15, 23, 42, .05);
        }

        .login-heading {
            margin-bottom: 23px;
        }

        .login-heading h1 {
            margin: 0;
            color: #111827;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .login-heading p {
            margin: 7px 0 0;
            color: #64748B;
            font-size: 13px;
            line-height: 1.5;
        }

        /* =========================
       ALERT
    ========================= */

        .status-alert {
            margin-bottom: 18px;
            padding: 11px 13px;
            border-radius: 8px;
            font-size: 12px;
            line-height: 1.5;
        }

        .status-success {
            background: #ECFDF5;
            color: #047857;
            border: 1px solid #D1FAE5;
        }

        /* =========================
       FORM
    ========================= */

        .form-group {
            margin-bottom: 17px;
        }

        .form-label {
            display: block;
            margin-bottom: 7px;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            min-height: 44px;
            padding: 0 13px;

            border: 1px solid #D1D5DB;
            border-radius: 8px;

            outline: none;
            background: #FFFFFF;
            color: #111827;

            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 400;

            transition: .2s ease;
        }

        .form-input::placeholder {
            color: #9CA3AF;
        }

        .form-input:focus {
            border-color: #4F46E5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, .1);
        }

        .form-error {
            margin-top: 6px;
            color: #DC2626;
            font-size: 11px;
            line-height: 1.4;
        }

        /* =========================
       REMEMBER + FORGOT
    ========================= */

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;

            margin-top: 2px;
            margin-bottom: 20px;
        }

        .remember-wrapper {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .remember-checkbox {
            width: 14px;
            height: 14px;
            margin: 0;

            accent-color: #4F46E5;

            cursor: pointer;
        }

        .remember-label {
            color: #64748B;
            font-size: 12px;
            cursor: pointer;
        }

        .forgot-link {
            color: #4F46E5;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .forgot-link:hover {
            color: #4338CA;
        }

        /* =========================
       BUTTON
    ========================= */

        .login-button {
            width: 100%;
            min-height: 44px;

            border: none;
            border-radius: 8px;

            background: #4F46E5;
            color: #FFFFFF;

            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .login-button:hover {
            background: #4338CA;
        }

        .login-button:active {
            transform: translateY(1px);
        }

        /* =========================
       REGISTER
    ========================= */

        .register-section {
            margin-top: 22px;
            padding-top: 20px;

            border-top: 1px solid #E5E7EB;

            text-align: center;
        }

        .register-text {
            margin: 0;
            color: #64748B;
            font-size: 12px;
        }

        .register-link {
            margin-left: 3px;
            color: #4F46E5;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .register-link:hover {
            color: #4338CA;
        }

        /* =========================
       FOOTER
    ========================= */

        .login-footer {
            margin-top: 20px;
            text-align: center;
            color: #94A3B8;
            font-size: 11px;
        }

        /* =========================
       RESPONSIVE
    ========================= */

        @media (max-width: 480px) {

            .login-page {
                padding: 22px 16px;
            }

            .login-card {
                padding: 24px 20px;
                border-radius: 14px;
            }

            .brand-title {
                font-size: 19px;
            }

            .login-heading h1 {
                font-size: 19px;
            }

            .form-options {
                align-items: flex-start;
            }
        }
    </style>

</head>

<body>

    <main class="login-page">

        <div class="login-wrapper">

            {{-- BRAND --}}
            <div class="login-brand">

                <div class="brand-icon">
                    <img
                        src="{{ asset('images/logo-dark.png') }}"
                        alt="Logo Perpustakaan">
                </div>

                <h2 class="brand-title">
                    Perpustakaan
                </h2>

                <p class="brand-description">
                    Sistem informasi perpustakaan
                </p>

            </div>


            {{-- LOGIN CARD --}}
            <div class="login-card">

                <div class="login-heading">

                    <h1>
                        Selamat Datang
                    </h1>

                    <p>
                        Masuk ke akunmu untuk melanjutkan.
                    </p>

                </div>


                {{-- SESSION STATUS --}}
                @if (session('status'))

                <div class="status-alert status-success">
                    {{ session('status') }}
                </div>

                @endif


                {{-- LOGIN FORM --}}
                <form method="POST" action="{{ route('login') }}">

                    @csrf


                    {{-- EMAIL --}}
                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label">
                            Email
                        </label>

                        <input
                            id="email"
                            class="form-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required
                            autofocus
                            autocomplete="username">

                        @if ($errors->get('email'))

                        <div class="form-error">
                            {{ $errors->first('email') }}
                        </div>

                        @endif

                    </div>


                    {{-- PASSWORD --}}
                    <div class="form-group">

                        <label
                            for="password"
                            class="form-label">
                            Password
                        </label>

                        <input
                            id="password"
                            class="form-input"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password">

                        @if ($errors->get('password'))

                        <div class="form-error">
                            {{ $errors->first('password') }}
                        </div>

                        @endif

                    </div>


                    {{-- OPTIONS --}}
                    <div class="form-options">

                        <label
                            for="remember_me"
                            class="remember-wrapper">

                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="remember-checkbox">

                            <span class="remember-label">
                                Ingat saya
                            </span>

                        </label>


                        @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-link">
                            Lupa password?
                        </a>

                        @endif

                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="login-button">

                        Masuk

                    </button>

                </form>


                {{-- REGISTER --}}
                @if (Route::has('register'))

                <div class="register-section">

                    <p class="register-text">

                        Belum punya akun?

                        <a
                            href="{{ route('register') }}"
                            class="register-link">
                            Daftar sekarang
                        </a>

                    </p>

                </div>

                @endif

            </div>


            {{-- FOOTER --}}
            <div class="login-footer">
                © {{ date('Y') }} Perpustakaan
            </div>

        </div>

    </main>

</body>

</html>