<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Katalog Buku - Perpustakaan</title>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

            --warning: #92400E;
            --warning-bg: #FEF3C7;

            --danger: #991B1B;
            --danger-bg: #FEE2E2;

            --info: #1D4ED8;
            --info-bg: #DBEAFE;
        }


        * {
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            margin: 0;

            background: var(--background);
            color: var(--text-primary);

            font-family: 'Inter', sans-serif;
            font-size: 14px;
        }


        a {
            text-decoration: none;
        }


        button,
        input,
        select {
            font-family: inherit;
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

        .catalog-container {
            width: 100%;
            max-width: 1240px;

            margin: 0 auto;

            padding: 42px 24px 50px;
        }


        .catalog-header {
            margin-bottom: 28px;
        }


        .catalog-header h1 {
            margin: 0 0 7px;

            font-size: 25px;
            font-weight: 700;

            letter-spacing: -0.03em;

            color: var(--text-primary);
        }


        .catalog-header p {
            margin: 0;

            color: var(--text-secondary);

            font-size: 13px;
            line-height: 1.6;
        }


        /* =========================
           FILTER
        ========================= */

        .filter-card {
            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 10px;

            padding: 20px;

            margin-bottom: 26px;
        }


        .filter-form {
            display: grid;

            grid-template-columns:
                minmax(0, 2fr) minmax(180px, 1fr) auto auto;

            gap: 12px;

            align-items: end;
        }


        .filter-group {
            display: flex;
            flex-direction: column;

            gap: 7px;
        }


        .filter-label {
            font-size: 11px;
            font-weight: 600;

            color: var(--text-secondary);
        }


        .filter-input,
        .filter-select {

            width: 100%;
            height: 40px;

            padding: 0 12px;

            border: 1px solid var(--border);
            border-radius: 7px;

            outline: none;

            background: var(--white);
            color: var(--text-primary);

            font-size: 12px;

            transition: .2s ease;
        }


        .filter-input:focus,
        .filter-select:focus {

            border-color: var(--primary);

            box-shadow:
                0 0 0 3px rgba(79, 70, 229, 0.08);
        }


        .filter-button,
        .reset-button {

            height: 40px;

            padding: 0 15px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            border-radius: 7px;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }


        .filter-button {

            border: 1px solid var(--primary);

            background: var(--primary);
            color: #FFFFFF;
        }


        .filter-button:hover {

            border-color: var(--primary-dark);

            background: var(--primary-dark);
        }


        .reset-button {

            border: 1px solid var(--border);

            background: var(--white);

            color: var(--text-secondary);
        }


        .reset-button:hover {

            background: #F8FAFC;

            color: var(--text-primary);
        }


        /* =========================
           RESULT INFO
        ========================= */

        .result-info {

            margin-bottom: 18px;

            color: var(--text-secondary);

            font-size: 12px;
            font-weight: 500;
        }


        .result-info strong {

            color: var(--text-primary);
        }


        /* =========================
           BOOK GRID
        ========================= */

        .book-grid {

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 20px;
        }


        .book-card {

            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 10px;

            overflow: hidden;

            display: flex;
            flex-direction: column;

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }


        .book-card:hover {

            transform: translateY(-3px);

            box-shadow:
                0 10px 25px rgba(15, 23, 42, .07);
        }


        /* =========================
           BOOK COVER
        ========================= */

        .book-cover-wrapper {

            position: relative;

            width: 100%;
            height: 245px;

            background: #F1F5F9;

            overflow: hidden;
        }


        .book-cover {

            width: 100%;
            height: 100%;

            object-fit: cover;
        }


        .book-cover-placeholder {

            width: 100%;
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #CBD5E1;

            font-size: 48px;
        }


        /* =========================
           CATEGORY BADGE
        ========================= */

        .category-badge {

            position: absolute;

            top: 12px;
            left: 12px;

            padding: 6px 9px;

            border-radius: 6px;

            background: rgba(17, 24, 39, .88);

            color: #FFFFFF;

            font-size: 10px;
            font-weight: 600;
        }


        /* =========================
           AVAILABILITY BADGE
        ========================= */

        .availability-badge {

            position: absolute;

            top: 12px;
            right: 12px;

            padding: 6px 9px;

            border-radius: 6px;

            font-size: 10px;
            font-weight: 600;

            text-align: center;
        }


        .available {

            background: var(--success-bg);
            color: var(--success);
        }


        .pending {

            background: var(--warning-bg);
            color: var(--warning);
        }


        .other_pending {

            background: #FEF3C7;
            color: #92400E;
        }


        .mine {

            background: var(--info-bg);
            color: var(--info);
        }


        .borrowed {

            background: var(--danger-bg);
            color: var(--danger);
        }


        /* =========================
           BOOK BODY
        ========================= */

        .book-body {

            padding: 18px;

            display: flex;
            flex-direction: column;

            flex: 1;
        }


        .book-title {

            margin: 0 0 6px;

            color: var(--text-primary);

            font-size: 15px;
            font-weight: 700;

            line-height: 1.4;
        }


        .book-author {

            margin: 0 0 17px;

            color: var(--text-secondary);

            font-size: 11px;
        }


        .book-meta {

            display: flex;
            flex-direction: column;

            gap: 8px;

            padding-bottom: 17px;

            border-bottom: 1px solid var(--border);

            margin-bottom: 17px;
        }


        .book-meta-item {

            display: flex;
            align-items: center;

            gap: 8px;

            color: var(--text-secondary);

            font-size: 10px;
        }


        .book-meta-item i {

            width: 14px;

            color: var(--text-muted);

            text-align: center;
        }


        /* =========================
           DETAIL BUTTON
        ========================= */

        .book-detail {

            width: 100%;

            min-height: 38px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            border: 1px solid var(--border);
            border-radius: 7px;

            background: var(--white);
            color: var(--text-secondary);

            font-size: 11px;
            font-weight: 600;

            transition: .2s ease;
        }


        .book-detail:hover {

            border-color: var(--primary);

            color: var(--primary);

            background: #F8FAFC;
        }


        /* =========================
           BORROW FORM
        ========================= */

        .borrow-form {

            margin-top: 12px;

            display: flex;
            flex-direction: column;

            gap: 7px;
        }


        .borrow-label {

            font-size: 10px;
            font-weight: 600;

            color: var(--text-secondary);
        }


        .borrow-date {

            width: 100%;
            height: 38px;

            padding: 0 10px;

            border: 1px solid var(--border);
            border-radius: 7px;

            outline: none;

            background: var(--white);
            color: var(--text-primary);

            font-size: 11px;

            transition: .2s ease;
        }


        .borrow-date:focus {

            border-color: var(--primary);

            box-shadow:
                0 0 0 3px rgba(79, 70, 229, .08);
        }


        .btn-borrow {

            width: 100%;

            min-height: 38px;

            padding: 8px 12px;

            border: 1px solid var(--primary);
            border-radius: 7px;

            background: var(--primary);
            color: #FFFFFF;

            font-size: 11px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }


        .btn-borrow:hover:not(:disabled) {

            border-color: var(--primary-dark);

            background: var(--primary-dark);
        }


        .btn-borrow:disabled {

            cursor: not-allowed;

            border-color: #E2E8F0;

            background: #E2E8F0;

            color: #64748B;
            margin-top: 12px;
        }


        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {

            grid-column: 1 / -1;

            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 10px;

            padding: 50px 20px;

            text-align: center;
        }


        .empty-state i {

            font-size: 40px;

            color: #CBD5E1;

            margin-bottom: 14px;
        }


        .empty-state h3 {

            margin: 0 0 6px;

            color: var(--text-primary);

            font-size: 14px;
            font-weight: 700;
        }


        .empty-state p {

            margin: 0;

            color: var(--text-muted);

            font-size: 11px;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {

            border-top: 1px solid var(--border);

            background: var(--white);

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

        @media (max-width: 1000px) {

            .book-grid {

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }


            .filter-form {

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }
        }


        @media (max-width: 768px) {

            .navbar {

                padding: 0;
            }


            .navbar-inner {

                padding: 0 18px;
            }


            .catalog-container {

                padding: 32px 18px 40px;
            }


            .book-cover-wrapper {

                height: 230px;
            }
        }


        @media (max-width: 600px) {

            .book-grid {

                grid-template-columns: 1fr;
            }


            .filter-form {

                grid-template-columns: 1fr;
            }


            .catalog-header h1 {

                font-size: 21px;
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


            .catalog-container {

                padding-top: 28px;
            }


            .book-body {

                padding: 17px;
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


            {{-- BRAND --}}

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


            {{-- ACTIONS --}}

            <div class="navbar-actions">


                {{-- DASHBOARD --}}

                <a
                    href="{{ route('dashboard') }}"
                    class="btn-dashboard">

                    <span>
                        Dashboard
                    </span>

                </a>


                {{-- LOGOUT --}}

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

    <main class="catalog-container">


        {{-- HEADER --}}

        <section class="catalog-header">

            <h1>
                Katalog Buku
            </h1>

            <p>
                Temukan dan ajukan peminjaman buku yang tersedia
                di perpustakaan.
            </p>

        </section>


        {{-- =========================
             FILTER
        ========================= --}}

        <div class="filter-card">

            <form
                method="GET"
                action="{{ route('books.index') }}"
                class="filter-form">


                {{-- SEARCH --}}

                <div class="filter-group">

                    <input
                        type="text"
                        name="search"
                        id="search"
                        class="filter-input"
                        placeholder="Judul, penulis, penerbit, atau ISBN..."
                        value="{{ request('search') }}">

                </div>


                {{-- CATEGORY --}}

                <div class="filter-group">

                    <select
                        name="category"
                        id="category"
                        class="filter-select">

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach ($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                        @endforeach

                    </select>

                </div>


                {{-- SEARCH BUTTON --}}

                <button
                    type="submit"
                    class="filter-button">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    Cari

                </button>


                {{-- RESET BUTTON --}}

                <a
                    href="{{ route('books.index') }}"
                    class="reset-button">

                    <i class="fa-solid fa-rotate-left"></i>

                    Reset

                </a>

            </form>

        </div>


        {{-- =========================
             RESULT INFO
        ========================= --}}

        <div class="result-info">

            Menampilkan

            <strong>
                {{ $books->count() }}
            </strong>

            buku

        </div>


        {{-- =========================
             BOOK GRID
        ========================= --}}

        <div class="book-grid">


            @forelse ($books as $book)


            @php

            /*
            |--------------------------------------------------------------------------
            | Approved borrowing
            |--------------------------------------------------------------------------
            */

            $approvedBorrowing = $book->borrowings
            ->where('status', 'approved')
            ->sortByDesc('created_at')
            ->first();


            /*
            |--------------------------------------------------------------------------
            | Pending milik user sendiri
            |--------------------------------------------------------------------------
            */

            $myPendingBorrowing = $book->borrowings
            ->where('status', 'pending')
            ->where('user_id', auth()->id())
            ->sortByDesc('created_at')
            ->first();


            /*
            |--------------------------------------------------------------------------
            | Pending milik user lain
            |--------------------------------------------------------------------------
            */

            $otherPendingBorrowing = $book->borrowings
            ->where('status', 'pending')
            ->where('user_id', '!=', auth()->id())
            ->sortByDesc('created_at')
            ->first();


            /*
            |--------------------------------------------------------------------------
            | Default status
            |--------------------------------------------------------------------------
            */

            $bookStatus = 'available';


            /*
            |--------------------------------------------------------------------------
            | Approved mempunyai prioritas paling tinggi
            |--------------------------------------------------------------------------
            */

            if ($approvedBorrowing) {

            if (
            $approvedBorrowing->user_id
            == auth()->id()
            ) {

            $bookStatus = 'mine';

            } else {

            $bookStatus = 'borrowed';

            }

            }


            /*
            |--------------------------------------------------------------------------
            | Pending milik sendiri
            |--------------------------------------------------------------------------
            */

            elseif ($myPendingBorrowing) {

            $bookStatus = 'pending';

            }


            /*
            |--------------------------------------------------------------------------
            | Pending milik user lain
            |--------------------------------------------------------------------------
            */

            elseif ($otherPendingBorrowing) {

            $bookStatus = 'other_pending';

            }

            @endphp


            {{-- =========================
                     BOOK CARD
                ========================= --}}

            <article class="book-card">


                {{-- COVER --}}

                <div class="book-cover-wrapper">


                    @if ($book->cover)

                    <img
                        src="{{ asset('storage/' . $book->cover) }}"
                        alt="{{ $book->title }}"
                        class="book-cover">

                    @else

                    <div class="book-cover-placeholder">

                        <i class="fa-solid fa-book"></i>

                    </div>

                    @endif


                    {{-- CATEGORY --}}

                    @if ($book->category)

                    <span class="category-badge">

                        {{ $book->category->name }}

                    </span>

                    @endif


                    {{-- STATUS --}}

                    @if ($bookStatus === 'available')

                    <span class="availability-badge available">
                        Tersedia
                    </span>

                    @elseif ($bookStatus === 'pending')

                    <span class="availability-badge pending">
                        Sedang Diproses
                    </span>

                    @elseif ($bookStatus === 'other_pending')

                    <span class="availability-badge other_pending">
                        Sedang Diproses Pengguna Lain
                    </span>

                    @elseif ($bookStatus === 'mine')

                    <span class="availability-badge mine">
                        Sudah Anda Pinjam
                    </span>

                    @elseif ($bookStatus === 'borrowed')

                    <span class="availability-badge borrowed">
                        Dipinjam Orang Lain
                    </span>

                    @endif

                </div>


                {{-- BOOK BODY --}}

                <div class="book-body">


                    {{-- TITLE --}}

                    <h2 class="book-title">

                        {{ $book->title }}

                    </h2>


                    {{-- AUTHOR --}}

                    <p class="book-author">

                        {{ $book->author }}

                    </p>


                    {{-- META --}}

                    <div class="book-meta">


                        <div class="book-meta-item">

                            <i class="fa-solid fa-building"></i>

                            <span>
                                {{ $book->publisher ?? '-' }}
                            </span>

                        </div>


                        <div class="book-meta-item">

                            <i class="fa-regular fa-calendar"></i>

                            <span>
                                {{ $book->year ?? '-' }}
                            </span>

                        </div>


                        <div class="book-meta-item">

                            <i class="fa-solid fa-barcode"></i>

                            <span>
                                {{ $book->isbn ?? '-' }}
                            </span>

                        </div>

                    </div>


                    {{-- DETAIL --}}

                    <a
                        href="{{ route('books.show', $book) }}"
                        class="book-detail">

                        <i class="fa-solid fa-eye"></i>

                        Lihat Detail Buku

                    </a>


                    {{-- =========================
                             BORROW
                        ========================= --}}


                    @if ($bookStatus === 'available')


                    <form
                        method="POST"
                        action="{{ route('borrowings.store', $book) }}"
                        class="borrow-form"
                        onsubmit="return confirmBorrow(event, this)">

                        @csrf


                        <label
                            for="due_at_{{ $book->id }}"
                            class="borrow-label">

                            Tanggal jatuh tempo

                        </label>


                        <input
                            type="datetime-local"
                            name="due_at"
                            id="due_at_{{ $book->id }}"
                            class="borrow-date"
                            min="{{ now()->addMinute()->format('Y-m-d\TH\:i') }}"
                            required>


                        <button
                            type="submit"
                            class="btn-borrow">

                            Ajukan Peminjaman

                        </button>

                    </form>


                    @elseif ($bookStatus === 'pending')


                    <button
                        type="button"
                        class="btn-borrow"
                        disabled>

                        Peminjaman Sedang Diproses

                    </button>


                    @elseif ($bookStatus === 'other_pending')


                    <button
                        type="button"
                        class="btn-borrow"
                        disabled>

                        Sedang Diproses Pengguna Lain

                    </button>


                    @elseif ($bookStatus === 'mine')


                    <button
                        type="button"
                        class="btn-borrow"
                        disabled>

                        Buku Sudah Anda Pinjam

                    </button>


                    @elseif ($bookStatus === 'borrowed')


                    <button
                        type="button"
                        class="btn-borrow"
                        disabled>

                        Dipinjam Orang Lain

                    </button>


                    @endif

                </div>

            </article>


            @empty


            {{-- EMPTY STATE --}}

            <div class="empty-state">

                <i class="fa-solid fa-book-open"></i>

                <h3>
                    Buku Tidak Ditemukan
                </h3>

                <p>
                    Tidak ada buku yang sesuai dengan pencarian
                    atau kategori yang dipilih.
                </p>

            </div>


            @endforelse

        </div>

    </main>


    {{-- =========================
         FOOTER
    ========================= --}}

    <footer class="footer">

        <p>
            &copy; {{ date('Y') }} Perpustakaan.
            Semua hak dilindungi.
        </p>

    </footer>


    {{-- =========================
         JAVASCRIPT
    ========================= --}}

    <script>
        /*
        |--------------------------------------------------------------------------
        | Konfirmasi peminjaman
        |--------------------------------------------------------------------------
        */

        function confirmBorrow(event, form) {

            event.preventDefault();


            const dueInput =
                form.querySelector(
                    'input[name="due_at"]'
                );


            /*
            |--------------------------------------------------------------------------
            | Tanggal belum dipilih
            |--------------------------------------------------------------------------
            */

            if (!dueInput.value) {

                Swal.fire({

                    icon: 'warning',

                    title: 'Tanggal belum dipilih',

                    text: 'Silakan pilih tanggal jatuh tempo terlebih dahulu.',

                    confirmButtonColor: '#4F46E5'

                });

                return false;
            }


            /*
            |--------------------------------------------------------------------------
            | Format tanggal
            |--------------------------------------------------------------------------
            */

            const selectedDate =
                new Date(dueInput.value);


            const formattedDate =
                selectedDate.toLocaleString(
                    'id-ID', {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    }
                );


            /*
            |--------------------------------------------------------------------------
            | SweetAlert konfirmasi
            |--------------------------------------------------------------------------
            */

            Swal.fire({

                icon: 'question',

                title: 'Ajukan Peminjaman?',

                html: `
                    Anda akan mengajukan peminjaman buku
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


        /*
        |--------------------------------------------------------------------------
        | Success notification
        |--------------------------------------------------------------------------
        */

        @if(session('success'))

        Swal.fire({

            icon: 'success',

            title: 'Berhasil',

            text: @json(session('success')),

            confirmButtonColor: '#4F46E5'

        });

        @endif


        /*
        |--------------------------------------------------------------------------
        | Error notification
        |--------------------------------------------------------------------------
        */

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