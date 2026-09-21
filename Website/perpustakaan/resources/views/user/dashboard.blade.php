<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Perpustakaan</title>

    {{-- Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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
            -webkit-font-smoothing: antialiased;
        }

        button,
        input,
        select,
        textarea {
            font-family: 'Inter', sans-serif;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #111827;
            border-bottom: 1px solid #1F2937;
        }

        .navbar-inner {
            width: 100%;
            max-width: 1240px;
            min-height: 68px;
            margin: 0 auto;
            padding: 0 24px;
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
            text-decoration: none;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            background: #4F46E5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            box-shadow: 0 5px 15px rgba(79, 70, 229, .25);
        }

        .brand-name {
            font-size: 15px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .btn-books {
            min-height: 38px;
            padding: 0 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            background: #4F46E5;
            color: #FFFFFF;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-books:hover {
            background: #4338CA;
            color: #FFFFFF;
        }

        .btn-logout {
            min-height: 38px;
            padding: 0 15px;
            border: 1px solid #374151;
            border-radius: 7px;
            background: transparent;
            color: #D1D5DB;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-logout:hover {
            background: #1F2937;
            color: #FFFFFF;
        }

        /* =========================
           MAIN
        ========================= */

        .dashboard {
            width: 100%;
            max-width: 1240px;
            margin: 0 auto;
            padding: 38px 24px 50px;
        }

        /* =========================
           HEADER
        ========================= */

        .dashboard-header {
            margin-bottom: 28px;
        }

        .dashboard-header h1 {
            margin: 0;
            color: #111827;
            font-size: 27px;
            font-weight: 700;
            letter-spacing: -0.03em;
        }

        .dashboard-header p {
            margin: 7px 0 0;
            color: #64748B;
            font-size: 13px;
            line-height: 1.5;
        }

        .user-name {
            color: #4F46E5;
            font-weight: 600;
        }

        /* =========================
           STAT CARDS
        ========================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, .035);
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .stat-icon.blue {
            background: #EEF2FF;
        }

        .stat-icon.orange {
            background: #FFFBEB;
        }

        .stat-icon.green {
            background: #ECFDF5;
        }

        .stat-label {
            margin: 0 0 4px;
            color: #64748B;
            font-size: 11px;
            font-weight: 500;
        }

        .stat-number {
            margin: 0;
            color: #111827;
            font-size: 21px;
            font-weight: 700;
        }

        /* =========================
           SECTION
        ========================= */

        .section {
            margin-bottom: 24px;
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
            color: #111827;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .section-count {
            color: #64748B;
            font-size: 11px;
        }

        /* =========================
           CONTENT CARD
        ========================= */

        .content-card {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, .035);
            overflow: hidden;
        }

        /* =========================
           BORROWING ITEM
        ========================= */

        .borrowing-item {
            padding: 20px;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .borrowing-item:last-child {
            border-bottom: none;
        }

        .book-info {
            min-width: 0;
        }

        .book-title {
            margin: 0 0 6px;
            color: #111827;
            font-size: 14px;
            font-weight: 700;
        }

        .book-author {
            margin: 0 0 11px;
            color: #64748B;
            font-size: 11px;
        }

        .book-details {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .detail {
            color: #64748B;
            font-size: 10px;
        }

        .detail strong {
            color: #374151;
            font-weight: 600;
        }

        /* =========================
           BADGE
        ========================= */

        .status-badge {
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 600;
        }

        .badge-approved {
            background: #ECFDF5;
            color: #047857;
        }

        .badge-overdue {
            background: #FEF2F2;
            color: #B91C1C;
        }

        .badge-pending {
            background: #FFFBEB;
            color: #B45309;
        }

        .badge-returned {
            background: #F1F5F9;
            color: #475569;
        }

        .badge-rejected {
            background: #FEF2F2;
            color: #B91C1C;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            padding: 34px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 42px;
            height: 42px;
            margin: 0 auto 11px;
            border-radius: 10px;
            background: #F1F5F9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .empty-state p {
            margin: 0;
            color: #64748B;
            font-size: 12px;
        }

        /* =========================
           PENDING ITEM
        ========================= */

        .pending-item,
        .history-item {
            padding: 17px 20px;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .pending-item:last-child,
        .history-item:last-child {
            border-bottom: none;
        }

        .compact-title {
            margin: 0 0 5px;
            color: #111827;
            font-size: 13px;
            font-weight: 600;
        }

        .compact-info {
            margin: 0;
            color: #64748B;
            font-size: 10px;
        }

        /* =========================
           FOOTER
        ========================= */

        .dashboard-footer {
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #E2E8F0;
            text-align: center;
            color: #94A3B8;
            font-size: 10px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .navbar-inner {
                padding: 0 18px;
            }

            .dashboard {
                padding: 30px 18px 40px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .borrowing-item,
            .pending-item,
            .history-item {
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

            .navbar-actions {
                gap: 6px;
            }

            .btn-books,
            .btn-logout {
                min-height: 35px;
                padding: 0 10px;
                font-size: 10px;
            }

            .dashboard-header h1 {
                font-size: 23px;
            }

            .dashboard-header p {
                font-size: 12px;
            }

            .borrowing-item {
                flex-direction: column;
            }

            .book-details {
                gap: 8px;
                flex-direction: column;
            }

            .pending-item,
            .history-item {
                flex-direction: column;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 4px;
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
                    📚
                </div>

                <span class="brand-name">
                    Perpustakaan
                </span>

            </a>


            <div class="navbar-actions">

                <a
                    href="{{ route('books.index') }}"
                    class="btn-books">

                    Daftar Buku

                </a>


                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="btn-logout">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </nav>


    {{-- =========================
         DASHBOARD
    ========================= --}}

    <main class="dashboard">

        {{-- HEADER --}}

        <div class="dashboard-header">

            <h1>
                Dashboard
            </h1>

            <p>

                Selamat datang,

                <span class="user-name">
                    {{ auth()->user()->name }}
                </span>.

                Kelola peminjaman buku kamu di sini.

            </p>

        </div>


        {{-- =========================
             STATISTICS
        ========================= --}}

        <div class="stats-grid">

            {{-- Sedang Dipinjam --}}

            <div class="stat-card">

                <div class="stat-icon blue">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <div>

                    <p class="stat-label">
                        Sedang Dipinjam
                    </p>

                    <p class="stat-number">
                        {{ $currentBorrowings->count() }}
                    </p>

                </div>

            </div>


            {{-- Menunggu --}}

            <div class="stat-card">

                <div class="stat-icon orange">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <div>

                    <p class="stat-label">
                        Menunggu Persetujuan
                    </p>

                    <p class="stat-number">
                        {{ $pendingBorrowings->count() }}
                    </p>

                </div>

            </div>


            {{-- Riwayat --}}

            <div class="stat-card">

                <div class="stat-icon green">
                    <i class="fa-solid fa-book-bookmark"></i>
                </div>

                <div>

                    <p class="stat-label">
                        Riwayat Peminjaman
                    </p>

                    <p class="stat-number">
                        {{ $historyBorrowings->count() }}
                    </p>

                </div>

            </div>

        </div>


        {{-- =========================
             CURRENT BORROWINGS
        ========================= --}}

        <section class="section">

            <div class="section-header">

                <h2 class="section-title">
                    Buku yang Sedang Dipinjam
                </h2>

                <span class="section-count">
                    {{ $currentBorrowings->count() }} buku
                </span>

            </div>


            <div class="content-card">

                @forelse ($currentBorrowings as $borrowing)

                <div class="borrowing-item">

                    <div class="book-info">

                        <h3 class="book-title">
                            {{ $borrowing->book->title }}
                        </h3>

                        <p class="book-author">
                            {{ $borrowing->book->author }}
                        </p>


                        <div class="book-details">

                            <span class="detail">

                                <strong>Tanggal Pinjam:</strong>

                                {{ $borrowing->borrowed_at?->format('d-m-Y H:i') }}

                            </span>


                            <span class="detail">

                                <strong>Jatuh Tempo:</strong>

                                @if ($borrowing->due_at)

                                {{ $borrowing->due_at->format('d-m-Y H:i') }}

                                @else

                                Belum ditentukan

                                @endif

                            </span>

                        </div>

                    </div>


                    {{-- STATUS --}}

                    @if ($borrowing->is_overdue)

                    <span class="status-badge badge-overdue">
                        Terlambat
                    </span>

                    @else

                    <span class="status-badge badge-approved">
                        Sedang Dipinjam
                    </span>

                    @endif

                </div>

                @empty

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="fa-solid fa-book"></i>
                    </div>

                    <p>
                        Anda tidak sedang meminjam buku.
                    </p>

                </div>

                @endforelse

            </div>

        </section>


        {{-- =========================
             PENDING BORROWINGS
        ========================= --}}

        <section class="section">

            <div class="section-header">

                <h2 class="section-title">
                    Pengajuan Peminjaman
                </h2>

                <span class="section-count">
                    {{ $pendingBorrowings->count() }} pengajuan
                </span>

            </div>


            <div class="content-card">

                @forelse ($pendingBorrowings as $borrowing)

                <div class="pending-item">

                    <div>

                        <h3 class="compact-title">
                            {{ $borrowing->book->title }}
                        </h3>

                        <p class="compact-info">

                            Diajukan:

                            {{ $borrowing->created_at->format('d-m-Y H:i') }}

                        </p>

                    </div>


                    <span class="status-badge badge-pending">
                        Menunggu Persetujuan
                    </span>

                </div>

                @empty

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="fa-solid fa-clock"></i>
                    </div>

                    <p>
                        Tidak ada pengajuan yang sedang menunggu.
                    </p>

                </div>

                @endforelse

            </div>

        </section>


        {{-- =========================
             HISTORY
        ========================= --}}

        <section class="section">

            <div class="section-header">

                <h2 class="section-title">
                    Riwayat Peminjaman
                </h2>

                <span class="section-count">
                    {{ $historyBorrowings->count() }} riwayat
                </span>

            </div>


            <div class="content-card">

                @forelse ($historyBorrowings as $borrowing)

                <div class="history-item">

                    <div>

                        <h3 class="compact-title">
                            {{ $borrowing->book->title }}
                        </h3>

                        <p class="compact-info">

                            Tanggal pengajuan:

                            {{ $borrowing->created_at->format('d-m-Y H:i') }}

                        </p>


                        @if ($borrowing->returned_at)

                        <p
                            class="compact-info"
                            style="margin-top: 4px;">

                            Dikembalikan:

                            {{ $borrowing->returned_at->format('d-m-Y H:i') }}

                        </p>

                        @endif

                    </div>


                    @if ($borrowing->status === 'returned')

                    <span class="status-badge badge-returned">
                        Sudah Dikembalikan
                    </span>

                    @elseif ($borrowing->status === 'rejected')

                    <span class="status-badge badge-rejected">
                        Ditolak
                    </span>

                    @endif

                </div>

                @empty

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="fa-solid fa-book-bookmark"></i>
                    </div>

                    <p>
                        Belum ada riwayat peminjaman.
                    </p>

                </div>

                @endforelse

            </div>

        </section>


        {{-- FOOTER --}}

        <footer class="dashboard-footer">

            © {{ date('Y') }} Perpustakaan

        </footer>

    </main>

</body>

</html>