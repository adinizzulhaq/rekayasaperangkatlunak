<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Koleksi Buku</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #F8FAFC;
            color: #111827;
            font-family: 'Inter', sans-serif;
        }

        /* =========================
       NAVBAR
    ========================= */

        .library-navbar {
            height: 68px;
            background: #111827;
            padding: 0 42px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .library-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #FFFFFF;
            text-decoration: none;
            font-size: 17px;
            font-weight: 700;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #4F46E5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-name {
            color: #CBD5E1;
            font-size: 13px;
        }

        .dashboard-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 36px;
            padding: 0 15px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, .12);
            background: rgba(255, 255, 255, .06);
            color: #FFFFFF;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .dashboard-button:hover {
            background: #4F46E5;
            border-color: #4F46E5;
            color: #FFFFFF;
        }

        /* =========================
       MAIN
    ========================= */

        .library-container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 42px 28px 60px;
        }

        /* =========================
       PAGE HEADER
    ========================= */

        .catalog-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 30px;
        }

        .catalog-header-left {
            max-width: 650px;
        }

        .catalog-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 10px;
            color: #4F46E5;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .catalog-label-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #4F46E5;
        }

        .catalog-title {
            margin: 0;
            color: #111827;
            font-size: 32px;
            line-height: 1.2;
            font-weight: 750;
        }

        .catalog-description {
            margin: 9px 0 0;
            color: #64748B;
            font-size: 14px;
            line-height: 1.6;
        }

        .catalog-count {
            min-width: 150px;
            padding: 14px 18px;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            background: #FFFFFF;
            text-align: left;
        }

        .catalog-count-number {
            display: block;
            color: #111827;
            font-size: 21px;
            font-weight: 700;
            line-height: 1;
        }

        .catalog-count-label {
            display: block;
            margin-top: 6px;
            color: #64748B;
            font-size: 11px;
        }

        /* =========================
       ALERT
    ========================= */

        .library-alert {
            margin-bottom: 24px;
            padding: 13px 16px;
            border: none;
            border-radius: 10px;
            font-size: 13px;
        }

        /* =========================
       BOOK GRID
    ========================= */

        .book-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        /* =========================
       BOOK CARD
    ========================= */

        .book-card {
            min-width: 0;
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .book-card:hover {
            transform: translateY(-4px);
            border-color: #D8DCE8;
            box-shadow: 0 14px 32px rgba(15, 23, 42, .08);
        }

        /* =========================
       COVER
    ========================= */

        .book-cover-wrapper {
            height: 265px;
            position: relative;
            overflow: hidden;
            background: #EEF2F7;
        }

        .book-cover {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            transition: transform .3s ease;
        }

        .book-card:hover .book-cover {
            transform: scale(1.025);
        }

        .no-cover {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F1F5F9;
            color: #94A3B8;
            font-size: 46px;
        }

        /* =========================
       STATUS ON COVER
    ========================= */

        .cover-status {
            position: absolute;
            top: 14px;
            right: 14px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 700;
            backdrop-filter: blur(6px);
        }

        .status-available {
            background: rgba(220, 252, 231, .94);
            color: #166534;
        }

        .status-borrowed {
            background: rgba(254, 226, 226, .94);
            color: #991B1B;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* =========================
       BOOK CONTENT
    ========================= */

        .book-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .book-title {
            margin: 0 0 8px;
            color: #111827;
            font-size: 18px;
            line-height: 1.4;
            font-weight: 700;

            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-author {
            margin-bottom: 18px;
            color: #64748B;
            font-size: 12px;
        }

        .book-author strong {
            color: #374151;
            font-weight: 600;
        }

        /* =========================
       BOOK META
    ========================= */

        .book-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 18px;
        }

        .meta-item {
            min-width: 0;
            padding: 10px 11px;
            border-radius: 9px;
            background: #F8FAFC;
            border: 1px solid #F1F5F9;
        }

        .meta-label {
            display: block;
            margin-bottom: 4px;
            color: #94A3B8;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .meta-value {
            display: block;
            color: #374151;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* =========================
       BORROW SECTION
    ========================= */

        .borrow-section {
            margin-top: auto;
            padding-top: 17px;
            border-top: 1px solid #E5E7EB;
        }

        .borrow-label {
            display: block;
            margin-bottom: 7px;
            color: #374151;
            font-size: 11px;
            font-weight: 700;
        }

        .borrow-input {
            width: 100%;
            min-height: 39px;
            padding: 0 10px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            outline: none;
            background: #FFFFFF;
            color: #374151;
            font-size: 11px;
            transition: .2s ease;
        }

        .borrow-input:focus {
            border-color: #4F46E5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, .1);
        }

        .borrow-help {
            display: block;
            margin-top: 6px;
            color: #94A3B8;
            font-size: 9px;
            line-height: 1.4;
        }

        .borrow-button {
            width: 100%;
            min-height: 40px;
            margin-top: 12px;
            border: none;
            border-radius: 8px;
            background: #4F46E5;
            color: #FFFFFF;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

        .borrow-button:hover {
            background: #4338CA;
        }

        /* =========================
       BORROWED INFO
    ========================= */

        .borrowed-info {
            margin-top: auto;
            padding-top: 17px;
            border-top: 1px solid #E5E7EB;
        }

        .borrowed-message {
            padding: 11px 12px;
            border-radius: 8px;
            background: #FEF2F2;
            color: #991B1B;
            font-size: 10px;
            line-height: 1.5;
        }

        /* =========================
       EMPTY
    ========================= */

        .empty-library {
            grid-column: 1 / -1;
            padding: 70px 25px;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            background: #FFFFFF;
            text-align: center;
        }

        .empty-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 15px;
            border-radius: 14px;
            background: #EEF2FF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .empty-library h3 {
            margin: 0 0 6px;
            color: #111827;
            font-size: 17px;
            font-weight: 700;
        }

        .empty-library p {
            margin: 0;
            color: #94A3B8;
            font-size: 12px;
        }

        /* =========================
       RESPONSIVE
    ========================= */

        @media (max-width: 1000px) {
            .book-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .catalog-header {
                align-items: flex-start;
            }
        }

        @media (max-width: 700px) {
            .library-navbar {
                height: auto;
                min-height: 66px;
                padding: 12px 18px;
            }

            .user-name {
                display: none;
            }

            .library-container {
                padding: 30px 18px 45px;
            }

            .catalog-header {
                display: block;
            }

            .catalog-title {
                font-size: 27px;
            }

            .catalog-count {
                display: inline-block;
                min-width: 135px;
                margin-top: 18px;
            }

            .book-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .book-cover-wrapper {
                height: 270px;
            }
        }

        @media (max-width: 420px) {
            .library-brand {
                font-size: 15px;
            }

            .brand-icon {
                width: 35px;
                height: 35px;
            }

            .dashboard-button {
                padding: 0 11px;
                font-size: 11px;
            }

            .book-cover-wrapper {
                height: 245px;
            }
        }
    </style>

</head>

<body>

    {{-- NAVBAR --}}
    <nav class="library-navbar">

        <a href="{{ route('dashboard') }}" class="library-brand">

            <span class="brand-icon">
                📚
            </span>

            <span>
                Perpustakaan
            </span>

        </a>

        <div class="navbar-right">

            <span class="user-name">
                {{ auth()->user()->name }}
            </span>

            <a href="{{ route('dashboard') }}" class="dashboard-button">
                Dashboard
            </a>

        </div>

    </nav>


    {{-- CONTENT --}}
    <main class="library-container">

        {{-- HEADER --}}
        <div class="catalog-header">

            <div class="catalog-header-left">

                <div class="catalog-label">
                    <span class="catalog-label-dot"></span>
                    Koleksi Perpustakaan
                </div>

                <h1 class="catalog-title">
                    Temukan Buku Favoritmu
                </h1>

                <p class="catalog-description">
                    Jelajahi koleksi buku yang tersedia dan ajukan
                    peminjaman sesuai kebutuhanmu.
                </p>

            </div>

            <div class="catalog-count">

                <span class="catalog-count-number">
                    {{ $books->count() }}
                </span>

                <span class="catalog-count-label">
                    Total Koleksi Buku
                </span>

            </div>

        </div>


        {{-- SUCCESS --}}
        @if (session('success'))

        <div class="alert alert-success library-alert">
            {{ session('success') }}
        </div>

        @endif


        {{-- ERROR --}}
        @if (session('error'))

        <div class="alert alert-danger library-alert">
            {{ session('error') }}
        </div>

        @endif


        {{-- BOOK GRID --}}
        <div class="book-grid">

            @forelse ($books as $book)

            @php
            $isBorrowed = $book->borrowings->isNotEmpty();
            @endphp

            <article class="book-card">

                {{-- COVER --}}
                <div class="book-cover-wrapper">

                    @if ($book->cover)
                    <img
                        src="{{ asset('storage/' . $book->cover) }}"
                        alt="Cover {{ $book->title }}">
                    @else
                    <div class="book-cover-placeholder">
                        📚
                    </div>
                    @endif


                    {{-- STATUS --}}
                    <div class="cover-status">

                        @if ($isBorrowed)

                        <span class="status-badge status-borrowed">
                            <span class="status-dot"></span>
                            Sedang Dipinjam
                        </span>

                        @else

                        <span class="status-badge status-available">
                            <span class="status-dot"></span>
                            Tersedia
                        </span>

                        @endif

                    </div>

                </div>


                {{-- CONTENT --}}
                <div class="book-content">

                    <h2 class="book-title">
                        {{ $book->title }}
                    </h2>

                    <div class="book-author">
                        Oleh
                        <strong>{{ $book->author }}</strong>
                    </div>


                    {{-- META --}}
                    <div class="book-meta">

                        <div class="meta-item">

                            <span class="meta-label">
                                Penerbit
                            </span>

                            <span class="meta-value">
                                {{ $book->publisher ?? '-' }}
                            </span>

                        </div>

                        <div class="meta-item">

                            <span class="meta-label">
                                Tahun
                            </span>

                            <span class="meta-value">
                                {{ $book->year ?? '-' }}
                            </span>

                        </div>

                    </div>


                    {{-- BORROW --}}
                    @if (!$isBorrowed)

                    <div class="borrow-section">

                        <form
                            action="{{ route('borrowings.store', $book) }}"
                            method="POST">

                            @csrf

                            <label class="borrow-label">
                                Tentukan Jatuh Tempo
                            </label>

                            <input
                                type="datetime-local"
                                name="due_at"
                                class="borrow-input"
                                required
                                min="{{ now()->format('Y-m-d\TH:i') }}">

                            <small class="borrow-help">
                                Pilih tanggal dan waktu pengembalian buku.
                            </small>

                            <button
                                type="submit"
                                class="borrow-button">

                                Ajukan Peminjaman

                            </button>

                        </form>

                    </div>

                    @else

                    <div class="borrowed-info">

                        <div class="borrowed-message">
                            Buku sedang dipinjam dan belum tersedia
                            untuk pengajuan baru.
                        </div>

                    </div>

                    @endif

                </div>

            </article>

            @empty

            <div class="empty-library">

                <div class="empty-icon">
                    📚
                </div>

                <h3>
                    Belum Ada Koleksi Buku
                </h3>

                <p>
                    Saat ini belum ada buku yang terdaftar di perpustakaan.
                </p>

            </div>

            @endforelse

        </div>

    </main>

</body>

</html>