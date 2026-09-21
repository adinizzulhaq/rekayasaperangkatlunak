<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Perpustakaan</title>

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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

        .btn-books,
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

        .btn-books {
            background: var(--primary);
            color: #FFFFFF;
        }

        .btn-books:hover {
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

        .dashboard-container {
            width: 100%;
            max-width: 1240px;
            margin: 0 auto;
            padding: 42px 24px 50px;
        }

        .welcome-section {
            margin-bottom: 28px;
        }

        .welcome-section h1 {
            margin: 0 0 7px;
            font-size: 25px;
            font-weight: 700;
            letter-spacing: -0.03em;
            color: var(--text-primary);
        }

        .welcome-section p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.6;
        }

        /* =========================
           STAT CARDS
        ========================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 20px;

            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            font-size: 17px;
        }

        .stat-icon.blue {
            background: var(--info-bg);
            color: var(--info);
        }

        .stat-icon.green {
            background: var(--success-bg);
            color: var(--success);
        }

        .stat-icon.yellow {
            background: var(--warning-bg);
            color: var(--warning);
        }

        .stat-icon.gray {
            background: #F1F5F9;
            color: #475569;
        }

        .stat-content {
            min-width: 0;
        }

        .stat-label {
            margin-bottom: 4px;
            color: var(--text-muted);
            font-size: 11px;
            font-weight: 600;
        }

        .stat-value {
            color: var(--text-primary);
            font-size: 22px;
            font-weight: 700;
            line-height: 1.2;
        }

        /* =========================
           SECTION
        ========================= */

        .section {
            margin-bottom: 28px;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 13px;
        }

        .section-title {
            margin: 0;
            color: var(--text-primary);
            font-size: 16px;
            font-weight: 700;
        }

        .section-link {
            color: var(--primary);
            font-size: 12px;
            font-weight: 600;
        }

        .section-link:hover {
            color: var(--primary-dark);
        }

        /* =========================
           BORROWING CARDS
        ========================= */

        .borrowing-list {
            display: grid;
            gap: 12px;
        }

        .borrowing-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 18px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .borrowing-info {
            min-width: 0;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .book-placeholder {
            width: 48px;
            height: 62px;
            border-radius: 6px;
            background: #F1F5F9;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;
            overflow: hidden;
        }

        .book-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .book-placeholder i {
            color: #94A3B8;
            font-size: 18px;
        }

        .borrowing-details {
            min-width: 0;
        }

        .borrowing-title {
            margin: 0 0 6px;
            color: var(--text-primary);
            font-size: 13px;
            font-weight: 700;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .borrowing-author {
            margin: 0 0 8px;
            color: var(--text-secondary);
            font-size: 11px;
        }

        .borrowing-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            color: var(--text-muted);
            font-size: 10px;
        }

        .borrowing-meta span {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .borrowing-meta i {
            font-size: 10px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;

            padding: 6px 9px;
            border-radius: 6px;

            font-size: 10px;
            font-weight: 600;

            white-space: nowrap;
        }

        .status-approved {
            background: var(--success-bg);
            color: var(--success);
        }

        .status-pending {
            background: var(--warning-bg);
            color: var(--warning);
        }

        .status-rejected {
            background: var(--danger-bg);
            color: var(--danger);
        }

        .status-returned {
            background: var(--info-bg);
            color: var(--info);
        }

        .empty-state {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 42px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 13px;

            border-radius: 50%;
            background: #F1F5F9;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #94A3B8;
            font-size: 18px;
        }

        .empty-state h3 {
            margin: 0 0 5px;
            color: var(--text-primary);
            font-size: 13px;
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

        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0;
            }

            .navbar-inner {
                padding: 0 18px;
            }

            .dashboard-container {
                padding: 32px 18px 40px;
            }

            .borrowing-card {
                align-items: flex-start;
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

            .btn-books,
            .btn-logout {
                min-height: 35px;
                padding: 0 10px;
                font-size: 10px;
            }

            .btn-books i,
            .btn-logout i {
                font-size: 10px;
            }

            .dashboard-container {
                padding-top: 28px;
            }

            .welcome-section h1 {
                font-size: 21px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 17px;
            }

            .borrowing-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .borrowing-info {
                width: 100%;
            }

            .borrowing-title {
                white-space: normal;
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

            <a href="{{ route('dashboard') }}" class="brand">
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

                <a
                    href="{{ route('books.index') }}"
                    class="btn-books">
                    <span>Daftar Buku</span>
                </a>

                <form
                    method="POST"
                    action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="btn-logout">
                        <span>Logout</span>
                    </button>
                </form>

            </div>

        </div>
    </nav>

    <main class="dashboard-container">

        {{-- =========================
             WELCOME
        ========================= --}}
        <section class="welcome-section">
            <h1>
                Selamat datang, {{ auth()->user()->name }}
            </h1>

            <p>
                Kelola aktivitas peminjaman buku Anda melalui dashboard ini.
            </p>
        </section>

        {{-- =========================
             STATISTICS
        ========================= --}}
        <section class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <div class="stat-content">
                    <div class="stat-label">
                        Sedang Dipinjam
                    </div>

                    <div class="stat-value">
                        {{ $currentBorrowings->count() }}
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon yellow">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <div class="stat-content">
                    <div class="stat-label">
                        Menunggu Persetujuan
                    </div>

                    <div class="stat-value">
                        {{ $pendingBorrowings->count() }}
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fa-solid fa-check"></i>
                </div>

                <div class="stat-content">
                    <div class="stat-label">
                        Selesai
                    </div>

                    <div class="stat-value">
                        {{ $historyBorrowings->where('status', 'returned')->count() }}
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon gray">
                    <i class="fa-solid fa-bookmark"></i>
                </div>

                <div class="stat-content">
                    <div class="stat-label">
                        Total Riwayat
                    </div>

                    <div class="stat-value">
                        {{ $historyBorrowings->count() }}
                    </div>
                </div>
            </div>

        </section>

        {{-- =========================
             CURRENT BORROWINGS
        ========================= --}}
        <section class="section">

            <div class="section-header">
                <h2 class="section-title">
                    Sedang Dipinjam
                </h2>

                <a
                    href="{{ route('books.index') }}"
                    class="section-link">
                    Daftar Buku
                </a>
            </div>

            @if ($currentBorrowings->count())

            <div class="borrowing-list">

                @foreach ($currentBorrowings as $borrowing)

                <div class="borrowing-card">

                    <div class="borrowing-info">

                        <div class="book-placeholder">
                            @if ($borrowing->book->cover)
                            <img
                                src="{{ asset('storage/' . $borrowing->book->cover) }}"
                                alt="{{ $borrowing->book->title }}">
                            @else
                            <i class="fa-solid fa-book"></i>
                            @endif
                        </div>

                        <div class="borrowing-details">

                            <h3 class="borrowing-title">
                                {{ $borrowing->book->title }}
                            </h3>

                            <p class="borrowing-author">
                                {{ $borrowing->book->author }}
                            </p>

                            <div class="borrowing-meta">

                                <span>
                                    <i class="fa-solid fa-calendar-check"></i>
                                    Mulai:
                                    {{ $borrowing->borrowed_at?->format('d M Y') ?? '-' }}
                                </span>

                                <span>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    Jatuh tempo:
                                    {{ $borrowing->due_at?->format('d M Y') ?? '-' }}
                                </span>

                            </div>

                        </div>

                    </div>

                    <span class="status-badge status-approved">
                        <i class="fa-solid fa-circle-check"></i>
                        Sedang Dipinjam
                    </span>

                </div>

                @endforeach

            </div>

            @else

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <h3>
                    Tidak ada buku yang sedang dipinjam
                </h3>

                <p>
                    Silakan pilih buku yang tersedia dari katalog.
                </p>

            </div>

            @endif

        </section>

        {{-- =========================
             PENDING
        ========================= --}}
        <section class="section">

            <div class="section-header">
                <h2 class="section-title">
                    Menunggu Persetujuan
                </h2>
            </div>

            @if ($pendingBorrowings->count())

            <div class="borrowing-list">

                @foreach ($pendingBorrowings as $borrowing)

                <div class="borrowing-card">

                    <div class="borrowing-info">

                        <div class="book-placeholder">
                            @if ($borrowing->book->cover)
                            <img
                                src="{{ asset('storage/' . $borrowing->book->cover) }}"
                                alt="{{ $borrowing->book->title }}">
                            @else
                            <i class="fa-solid fa-book"></i>
                            @endif
                        </div>

                        <div class="borrowing-details">

                            <h3 class="borrowing-title">
                                {{ $borrowing->book->title }}
                            </h3>

                            <p class="borrowing-author">
                                {{ $borrowing->book->author }}
                            </p>

                            <div class="borrowing-meta">

                                <span>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    Diajukan:
                                    {{ $borrowing->created_at->format('d M Y') }}
                                </span>

                                <span>
                                    <i class="fa-solid fa-clock"></i>
                                    Jatuh tempo:
                                    {{ $borrowing->due_at?->format('d M Y') ?? '-' }}
                                </span>

                            </div>

                        </div>

                    </div>

                    <span class="status-badge status-pending">
                        <i class="fa-solid fa-clock"></i>
                        Menunggu
                    </span>

                </div>

                @endforeach

            </div>

            @else

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <h3>
                    Tidak ada pengajuan pending
                </h3>

                <p>
                    Semua pengajuan peminjaman sudah diproses.
                </p>

            </div>

            @endif

        </section>

        {{-- =========================
             HISTORY
        ========================= --}}
        <section class="section">

            <div class="section-header">
                <h2 class="section-title">
                    Riwayat Peminjaman
                </h2>
            </div>

            @if ($historyBorrowings->count())

            <div class="borrowing-list">

                @foreach ($historyBorrowings as $borrowing)

                <div class="borrowing-card">

                    <div class="borrowing-info">

                        <div class="book-placeholder">
                            @if ($borrowing->book->cover)
                            <img
                                src="{{ asset('storage/' . $borrowing->book->cover) }}"
                                alt="{{ $borrowing->book->title }}">
                            @else
                            <i class="fa-solid fa-book"></i>
                            @endif
                        </div>

                        <div class="borrowing-details">

                            <h3 class="borrowing-title">
                                {{ $borrowing->book->title }}
                            </h3>

                            <p class="borrowing-author">
                                {{ $borrowing->book->author }}
                            </p>

                            <div class="borrowing-meta">

                                @if ($borrowing->status === 'returned')

                                <span>
                                    <i class="fa-solid fa-calendar-check"></i>
                                    Dikembalikan:
                                    {{ $borrowing->returned_at?->format('d M Y') ?? '-' }}
                                </span>

                                @else

                                <span>
                                    <i class="fa-solid fa-calendar-xmark"></i>
                                    Ditolak:
                                    {{ $borrowing->rejected_at?->format('d M Y') ?? '-' }}
                                </span>

                                @endif

                            </div>

                        </div>

                    </div>

                    @if ($borrowing->status === 'returned')

                    <span class="status-badge status-returned">
                        <i class="fa-solid fa-check"></i>
                        Dikembalikan
                    </span>

                    @else

                    <span class="status-badge status-rejected">
                        <i class="fa-solid fa-xmark"></i>
                        Ditolak
                    </span>

                    @endif

                </div>

                @endforeach

            </div>

            @else

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>

                <h3>
                    Belum ada riwayat peminjaman
                </h3>

                <p>
                    Riwayat peminjaman Anda akan muncul di sini.
                </p>

            </div>

            @endif

        </section>

    </main>

    <footer class="footer">
        <p>
            &copy; {{ date('Y') }} Perpustakaan. Semua hak dilindungi.
        </p>
    </footer>

</body>

</html>