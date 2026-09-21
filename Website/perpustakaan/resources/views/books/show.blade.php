<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        {{ $book->title }} | Detail Buku
    </title>

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/favicon.png') }}">

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script
        src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --background: #F8FAFC;
            --white: #FFFFFF;
            --border: #E2E8F0;
            --text-primary: #111827;
            --text-secondary: #475569;
            --text-muted: #94A3B8;

            --success: #166534;
            --success-bg: #DCFCE7;

            --danger: #991B1B;
            --danger-bg: #FEE2E2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #111827;
            border-bottom: 1px solid #1F2937;
            padding: 0 42px;
        }

        .navbar-inner {
            width: 100%;
            max-width: 1240px;
            min-height: 68px;
            margin: 0 auto;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;

            color: #FFFFFF;
        }

        .brand:hover {
            color: #FFFFFF;
        }

        .brand-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;
        }

        .brand-icon img {
            width: 100%;
            height: 100%;

            object-fit: contain;
            display: block;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 700;

            letter-spacing: -0.02em;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .user-name {
            color: #CBD5E1;

            font-size: 12px;
            font-weight: 500;

            max-width: 180px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .btn-dashboard,
        .btn-logout {
            min-height: 38px;

            padding: 0 15px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            border-radius: 7px;

            font-size: 12px;
            font-weight: 600;

            transition: .2s ease;
        }

        .btn-dashboard {
            background: var(--primary);
            color: #FFFFFF;
        }

        .btn-dashboard:hover {
            background: var(--primary-dark);
            color: #FFFFFF;
        }

        .btn-logout {
            border: 1px solid #374151;

            background: transparent;
            color: #D1D5DB;

            cursor: pointer;
        }

        .btn-logout:hover {
            background: #1F2937;
            color: #FFFFFF;
        }

        /* =========================
           MAIN
        ========================= */

        .detail-container {
            width: 100%;
            max-width: 1100px;

            margin: 0 auto;

            padding: 42px 24px 50px;
        }

        /* =========================
           HEADER
        ========================= */

        .detail-header {
            margin-bottom: 24px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            margin-bottom: 16px;

            color: var(--text-secondary);

            font-size: 12px;
            font-weight: 600;

            transition: .2s ease;
        }

        .back-link:hover {
            color: var(--primary);
        }

        .detail-header h1 {
            margin: 0 0 7px;

            font-size: 25px;
            font-weight: 700;

            letter-spacing: -0.03em;
        }

        .detail-header p {
            margin: 0;

            color: var(--text-secondary);

            font-size: 13px;
            line-height: 1.6;
        }

        /* =========================
           DETAIL CARD
        ========================= */

        .detail-card {
            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 12px;

            padding: 25px;
        }

        .detail-content {
            display: grid;

            grid-template-columns: 280px minmax(0, 1fr);

            gap: 35px;
        }

        /* =========================
           COVER
        ========================= */

        .cover-wrapper {
            width: 100%;
        }

        .book-cover {
            width: 100%;
            height: 390px;

            background: #F1F5F9;

            border-radius: 9px;

            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-cover img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .book-cover-placeholder {
            color: #94A3B8;
            font-size: 50px;
        }

        .availability {
            margin-top: 12px;

            width: 100%;

            padding: 9px 12px;

            border-radius: 7px;

            text-align: center;

            font-size: 11px;
            font-weight: 600;
        }

        .available {
            background: var(--success-bg);
            color: var(--success);
        }

        .borrowed {
            background: var(--danger-bg);
            color: var(--danger);
        }

        /* =========================
           BOOK INFORMATION
        ========================= */

        .book-info {
            min-width: 0;
        }

        .category-badge {
            display: inline-flex;

            padding: 5px 9px;

            margin-bottom: 12px;

            border-radius: 5px;

            background: #EEF2FF;
            color: var(--primary);

            font-size: 10px;
            font-weight: 600;
        }

        .book-title {
            margin: 0 0 8px;

            color: var(--text-primary);

            font-size: 25px;
            font-weight: 700;

            line-height: 1.35;

            letter-spacing: -0.02em;
        }

        .book-author {
            margin: 0 0 23px;

            color: var(--text-secondary);

            font-size: 13px;
        }

        /* =========================
           META
        ========================= */

        .book-meta {
            display: grid;

            grid-template-columns: repeat(2, minmax(0, 1fr));

            gap: 12px;

            padding: 18px 0;

            border-top: 1px solid #F1F5F9;
            border-bottom: 1px solid #F1F5F9;
        }

        .meta-item {
            display: flex;
            align-items: flex-start;

            gap: 10px;
        }

        .meta-icon {
            width: 32px;
            height: 32px;

            flex-shrink: 0;

            border-radius: 7px;

            background: #F8FAFC;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #64748B;

            font-size: 12px;
        }

        .meta-content {
            min-width: 0;
        }

        .meta-label {
            display: block;

            margin-bottom: 3px;

            color: var(--text-muted);

            font-size: 10px;
            font-weight: 500;
        }

        .meta-value {
            color: var(--text-primary);

            font-size: 11px;
            font-weight: 600;

            word-break: break-word;
        }

        /* =========================
           DESCRIPTION
        ========================= */

        .description {
            margin-top: 22px;
        }

        .description-title {
            margin: 0 0 9px;

            font-size: 13px;
            font-weight: 700;
        }

        .description-text {
            margin: 0;

            color: var(--text-secondary);

            font-size: 12px;
            line-height: 1.8;

            white-space: pre-line;
        }

        /* =========================
           BORROW
        ========================= */

        .borrow-section {
            margin-top: 25px;

            padding-top: 20px;

            border-top: 1px solid #F1F5F9;
        }

        .borrow-section-title {
            margin: 0 0 12px;

            font-size: 13px;
            font-weight: 700;
        }

        .borrow-form {
            display: grid;

            grid-template-columns: 1fr auto;

            gap: 10px;
        }

        .borrow-date {
            width: 100%;
            height: 40px;

            padding: 0 11px;

            border: 1px solid var(--border);
            border-radius: 7px;

            background: #FFFFFF;
            color: var(--text-primary);

            font-family: inherit;
            font-size: 11px;

            outline: none;

            transition: .2s ease;
        }

        .borrow-date:focus {
            border-color: var(--primary);

            box-shadow:
                0 0 0 3px rgba(79, 70, 229, .08);
        }

        .btn-borrow {
            height: 40px;

            padding: 0 18px;

            border: 0;
            border-radius: 7px;

            background: var(--primary);
            color: #FFFFFF;

            font-family: inherit;

            font-size: 11px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .btn-borrow:hover {
            background: var(--primary-dark);
        }

        .btn-borrow:disabled {
            background: #CBD5E1;
            cursor: not-allowed;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            border-top: 1px solid var(--border);

            background: #FFFFFF;

            padding: 22px 24px;

            text-align: center;
        }

        .footer p {
            margin: 0;

            color: var(--text-muted);

            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .detail-content {
                grid-template-columns: 220px minmax(0, 1fr);

                gap: 25px;
            }

            .book-cover {
                height: 320px;
            }

            .book-title {
                font-size: 21px;
            }

            .book-meta {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 650px) {

            .navbar {
                padding: 0;
            }

            .navbar-inner {
                padding: 0 18px;
            }

            .detail-container {
                padding: 32px 18px 40px;
            }

            .user-name {
                display: none;
            }

            .detail-content {
                grid-template-columns: 1fr;
            }

            .cover-wrapper {
                max-width: 280px;
                margin: 0 auto;
            }

            .book-cover {
                height: 390px;
            }

            .borrow-form {
                grid-template-columns: 1fr;
            }

            .btn-borrow {
                width: 100%;
            }

        }

        @media (max-width: 520px) {

            .navbar-inner {
                min-height: 62px;
            }

            .brand-name {
                font-size: 14px;
            }

            .brand-icon {
                width: 35px;
                height: 35px;
            }

            .navbar-actions {
                gap: 6px;
            }

            .btn-dashboard,
            .btn-logout {
                min-height: 35px;

                padding: 0 10px;

                font-size: 10px;
            }

            .btn-dashboard i,
            .btn-logout i {
                font-size: 10px;
            }

            .detail-card {
                padding: 18px;
            }

            .book-title {
                font-size: 20px;
            }

        }
    </style>

</head>

<body>

    {{-- =========================
         NAVBAR
    ========================= --}}

    <nav class="navbar">

        <div class="navbar-inner">

            <a
                href="{{ route('dashboard') }}"
                class="brand">

                <div class="brand-icon">

                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo Perpustakaan">

                </div>

                <span class="brand-name">
                    Perpustakaan
                </span>

            </a>

            <div class="navbar-actions">

                <span class="user-name">
                    {{ auth()->user()->name }}
                </span>

                <a
                    href="{{ route('dashboard') }}"
                    class="btn-dashboard">

                    <span>
                        Dashboard
                    </span>

                </a>

                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="btn-logout">

                        <span>
                            Logout
                        </span>

                    </button>

                </form>

            </div>

        </div>

    </nav>


    {{-- =========================
         MAIN
    ========================= --}}

    <main class="detail-container">

        <section class="detail-header">

            <a
                href="{{ route('books.index') }}"
                class="back-link">

                <i class="fa-solid fa-arrow-left"></i>

                Kembali ke Daftar Buku

            </a>

            <h1>
                Detail Buku
            </h1>

            <p>
                Informasi lengkap mengenai buku yang tersedia di perpustakaan.
            </p>

        </section>


        {{-- =========================
             DETAIL CARD
        ========================= --}}

        <div class="detail-card">

            <div class="detail-content">


                {{-- COVER --}}

                <div class="cover-wrapper">

                    <div class="book-cover">

                        @if ($book->cover)

                        <img
                            src="{{ asset('storage/' . $book->cover) }}"
                            alt="{{ $book->title }}">

                        @else

                        <div class="book-cover-placeholder">

                            <i class="fa-solid fa-book"></i>

                        </div>

                        @endif

                    </div>


                    {{-- STATUS --}}

                    @php

                    $isBorrowed = $book->borrowings->isNotEmpty();

                    @endphp


                    @if ($isBorrowed)

                    <div class="availability borrowed">

                        <i class="fa-solid fa-circle-xmark"></i>

                        Buku Sedang Dipinjam

                    </div>

                    @else

                    <div class="availability available">

                        <i class="fa-solid fa-circle-check"></i>

                        Buku Tersedia

                    </div>

                    @endif

                </div>


                {{-- BOOK INFORMATION --}}

                <div class="book-info">


                    @if ($book->category)

                    <span class="category-badge">

                        &nbsp;

                        {{ $book->category->name }}

                    </span>

                    @endif


                    <h2 class="book-title">

                        {{ $book->title }}

                    </h2>


                    <p class="book-author">

                        <i class="fa-solid fa-user-pen"></i>

                        {{ $book->author }}

                    </p>


                    {{-- META --}}

                    <div class="book-meta">


                        @if ($book->publisher)

                        <div class="meta-item">

                            <div class="meta-icon">

                                <i class="fa-solid fa-building"></i>

                            </div>

                            <div class="meta-content">

                                <span class="meta-label">
                                    Penerbit
                                </span>

                                <span class="meta-value">
                                    {{ $book->publisher }}
                                </span>

                            </div>

                        </div>

                        @endif


                        @if ($book->year)

                        <div class="meta-item">

                            <div class="meta-icon">

                                <i class="fa-solid fa-calendar"></i>

                            </div>

                            <div class="meta-content">

                                <span class="meta-label">
                                    Tahun Terbit
                                </span>

                                <span class="meta-value">
                                    {{ $book->year }}
                                </span>

                            </div>

                        </div>

                        @endif


                        @if ($book->isbn)

                        <div class="meta-item">

                            <div class="meta-icon">

                                <i class="fa-solid fa-barcode"></i>

                            </div>

                            <div class="meta-content">

                                <span class="meta-label">
                                    ISBN
                                </span>

                                <span class="meta-value">
                                    {{ $book->isbn }}
                                </span>

                            </div>

                        </div>

                        @endif

                    </div>


                    {{-- DESCRIPTION --}}

                    @if ($book->description)

                    <div class="description">

                        <h3 class="description-title">

                            Deskripsi Buku

                        </h3>

                        <p class="description-text">

                            {{ $book->description }}

                        </p>

                    </div>

                    @endif


                    {{-- BORROW --}}

                    @if (!$isBorrowed)

                    <div class="borrow-section">

                        <h3 class="borrow-section-title">

                            Ajukan Peminjaman

                        </h3>

                        <form
                            method="POST"
                            action="{{ route('borrowings.store', $book) }}"
                            class="borrow-form"
                            onsubmit="return confirmBorrow(event, this)">

                            @csrf

                            <input
                                type="datetime-local"
                                name="due_at"
                                class="borrow-date"
                                min="{{ now()->addMinute()->format('Y-m-d\TH:i') }}"
                                required>

                            <button
                                type="submit"
                                class="btn-borrow">

                                Ajukan Peminjaman

                            </button>

                        </form>

                    </div>

                    @else

                    <div class="borrow-section">

                        <button
                            type="button"
                            class="btn-borrow"
                            disabled>

                            <i class="fa-solid fa-lock"></i>

                            Buku Sedang Dipinjam

                        </button>

                    </div>

                    @endif

                </div>

            </div>

        </div>

    </main>


    {{-- =========================
         FOOTER
    ========================= --}}

    <footer class="footer">

        <p>

            &copy; {{ date('Y') }}

            Perpustakaan.

            Semua hak dilindungi.

        </p>

    </footer>


    {{-- =========================
         SWEETALERT
    ========================= --}}

    <script>
        function confirmBorrow(event, form) {

            event.preventDefault();

            const dueInput =
                form.querySelector('input[name="due_at"]');


            if (!dueInput.value) {

                Swal.fire({

                    icon: 'warning',

                    title: 'Tanggal belum dipilih',

                    text: 'Silakan pilih tanggal jatuh tempo terlebih dahulu.',

                    confirmButtonColor: '#4F46E5'

                });

                return false;

            }


            const selectedDate =
                new Date(dueInput.value);


            const formattedDate =
                selectedDate.toLocaleString('id-ID', {

                    day: '2-digit',

                    month: 'long',

                    year: 'numeric',

                    hour: '2-digit',

                    minute: '2-digit'

                });


            Swal.fire({

                icon: 'question',

                title: 'Ajukan Peminjaman?',

                html: `

                    Anda akan mengajukan peminjaman buku

                    <strong>
                        {{ addslashes($book->title) }}
                    </strong>

                    dengan tanggal jatuh tempo:

                    <br>

                    <strong>
                        ${formattedDate}
                    </strong>

                `,

                showCancelButton: true,

                confirmButtonText: 'Ya, Ajukan',

                cancelButtonText: 'Batal',

                confirmButtonColor: '#4F46E5',

                cancelButtonColor: '#64748B'

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                }

            });


            return false;

        }


        @if(session('success'))

        Swal.fire({

            icon: 'success',

            title: 'Berhasil',

            text: @json(session('success')),

            confirmButtonColor: '#4F46E5'

        });

        @endif


        @if(session('error'))

        Swal.fire({

            icon: 'error',

            title: 'Tidak dapat diproses',

            text: @json(session('error')),

            confirmButtonColor: '#4F46E5'

        });

        @endif
    </script>

</body>

</html>