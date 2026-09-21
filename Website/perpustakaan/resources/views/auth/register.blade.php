<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    ```
    <title>Daftar - Perpustakaan</title>

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
            -webkit-font-smoothing: antialiased;
        }

        button,
        input,
        select,
        textarea {
            font-family: 'Inter', sans-serif;
        }

        /* =========================
       PAGE
    ========================= */

        .register-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .register-wrapper {
            width: 100%;
            max-width: 420px;
        }

        /* =========================
       BRAND
    ========================= */

        .register-brand {
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
            background: #4F46E5;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;

            box-shadow: 0 8px 20px rgba(79, 70, 229, .16);
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

        .register-card {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            padding: 30px;

            box-shadow: 0 10px 30px rgba(15, 23, 42, .05);
        }

        .register-heading {
            margin-bottom: 23px;
        }

        .register-heading h1 {
            margin: 0;
            color: #111827;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .register-heading p {
            margin: 7px 0 0;
            color: #64748B;
            font-size: 13px;
            line-height: 1.5;
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
       BUTTON
    ========================= */

        .register-button {
            width: 100%;
            min-height: 44px;

            margin-top: 3px;

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

        .register-button:hover {
            background: #4338CA;
        }

        .register-button:active {
            transform: translateY(1px);
        }

        /* =========================
       LOGIN
    ========================= */

        .login-section {
            margin-top: 22px;
            padding-top: 20px;

            border-top: 1px solid #E5E7EB;

            text-align: center;
        }

        .login-text {
            margin: 0;
            color: #64748B;
            font-size: 12px;
        }

        .login-link {
            margin-left: 3px;
            color: #4F46E5;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .login-link:hover {
            color: #4338CA;
        }

        /* =========================
       FOOTER
    ========================= */

        .register-footer {
            margin-top: 20px;
            text-align: center;
            color: #94A3B8;
            font-size: 11px;
        }

        /* =========================
       RESPONSIVE
    ========================= */

        @media (max-width: 480px) {

            .register-page {
                padding: 22px 16px;
            }

            .register-card {
                padding: 24px 20px;
                border-radius: 14px;
            }

            .brand-title {
                font-size: 19px;
            }

            .register-heading h1 {
                font-size: 19px;
            }
        }
    </style>
    ```

</head>

<body>

    ```
    <main class="register-page">

        <div class="register-wrapper">

            {{-- BRAND --}}
            <div class="register-brand">

                <div class="brand-icon">
                    📚
                </div>

                <h2 class="brand-title">
                    Perpustakaan
                </h2>

                <p class="brand-description">
                    Sistem informasi perpustakaan
                </p>

            </div>


            {{-- REGISTER CARD --}}
            <div class="register-card">

                <div class="register-heading">

                    <h1>
                        Buat Akun
                    </h1>

                    <p>
                        Daftarkan akunmu untuk mulai menggunakan perpustakaan.
                    </p>

                </div>


                {{-- REGISTER FORM --}}
                <form method="POST" action="{{ route('register') }}">

                    @csrf


                    {{-- NAME --}}
                    <div class="form-group">

                        <label
                            for="name"
                            class="form-label">
                            Nama
                        </label>

                        <input
                            id="name"
                            class="form-input"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                            autofocus
                            autocomplete="name">

                        @if ($errors->get('name'))

                        <div class="form-error">
                            {{ $errors->first('name') }}
                        </div>

                        @endif

                    </div>


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
                            autocomplete="new-password">

                        @if ($errors->get('password'))

                        <div class="form-error">
                            {{ $errors->first('password') }}
                        </div>

                        @endif

                    </div>


                    {{-- CONFIRM PASSWORD --}}
                    <div class="form-group">

                        <label
                            for="password_confirmation"
                            class="form-label">
                            Konfirmasi Password
                        </label>

                        <input
                            id="password_confirmation"
                            class="form-input"
                            type="password"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            required
                            autocomplete="new-password">

                        @if ($errors->get('password_confirmation'))

                        <div class="form-error">
                            {{ $errors->first('password_confirmation') }}
                        </div>

                        @endif

                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="register-button">

                        Daftar

                    </button>

                </form>


                {{-- LOGIN --}}
                @if (Route::has('login'))

                <div class="login-section">

                    <p class="login-text">

                        Sudah punya akun?

                        <a
                            href="{{ route('login') }}"
                            class="login-link">
                            Masuk sekarang
                        </a>

                    </p>

                </div>

                @endif

            </div>


            {{-- FOOTER --}}
            <div class="register-footer">
                © {{ date('Y') }} Perpustakaan
            </div>

        </div>

    </main>
    ```

</body>

</html>