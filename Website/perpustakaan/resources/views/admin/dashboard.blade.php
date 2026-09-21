@extends('layouts.admin')

@section('content')

<style>
    .dashboard-page {
        padding: 28px;
    }

    .dashboard-header {
        margin-bottom: 24px;
    }

    .dashboard-title {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #111827;
    }

    .dashboard-subtitle {
        margin: 6px 0 0;
        font-size: 13px;
        color: #64748B;
    }

    /* STAT CARDS */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
    }

    .stat-label {
        margin: 0 0 10px;
        font-size: 12px;
        font-weight: 500;
        color: #64748B;
    }

    .stat-value {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: #111827;
        line-height: 1;
    }

    .stat-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #EEF2FF;
        color: #4F46E5;
        font-size: 18px;
        margin-bottom: 16px;
    }

    /* CONTENT GRID */

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 24px;
    }

    .dashboard-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }

    .card-header {
        padding: 18px 20px;
        border-bottom: 1px solid #E2E8F0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .card-title {
        margin: 0;
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    .card-link {
        color: #4F46E5;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
    }

    .card-link:hover {
        text-decoration: underline;
    }

    /* LIST */

    .activity-list {
        padding: 0;
    }

    .activity-item {
        padding: 16px 20px;
        border-bottom: 1px solid #F1F5F9;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-info {
        min-width: 0;
    }

    .activity-book {
        margin: 0;
        font-size: 13px;
        font-weight: 600;
        color: #111827;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .activity-user {
        margin: 5px 0 0;
        font-size: 11px;
        color: #64748B;
    }

    .activity-approver {
        margin: 4px 0 0;
        font-size: 10px;
        color: #94A3B8;
    }

    .activity-approver strong {
        color: #475569;
        font-weight: 600;
    }

    .activity-date {
        flex-shrink: 0;
        font-size: 11px;
        color: #94A3B8;
        text-align: right;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 600;
    }

    .status-pending {
        background: #FEF3C7;
        color: #92400E;
    }

    .status-approved {
        background: #DCFCE7;
        color: #166534;
    }

    .empty-state {
        padding: 40px 20px;
        text-align: center;
    }

    .empty-icon {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .empty-title {
        margin: 0;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
    }

    .empty-text {
        margin: 5px 0 0;
        font-size: 11px;
        color: #94A3B8;
    }

    /* RESPONSIVE */

    @media (max-width: 1000px) {
        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .dashboard-page {
            padding: 20px;
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 520px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-page {
            padding: 16px;
        }

        .dashboard-title {
            font-size: 21px;
        }

        .activity-item {
            align-items: flex-start;
        }

        .activity-date {
            text-align: right;
        }
    }
</style>

<div class="dashboard-page">

    {{-- HEADER --}}

    <div class="dashboard-header">

        <h1 class="dashboard-title">
            Dashboard Admin
        </h1>

        <p class="dashboard-subtitle">
            Ringkasan aktivitas perpustakaan
        </p>

    </div>


    {{-- STATISTICS --}}

    <div class="stats-grid">

        {{-- TOTAL BUKU --}}

        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-book"></i>
            </div>

            <p class="stat-label">
                Total Buku
            </p>

            <p class="stat-value">
                {{ $totalBooks }}
            </p>

        </div>


        {{-- SEDANG DIPINJAM --}}

        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-book-open-reader"></i>
            </div>

            <p class="stat-label">
                Sedang Dipinjam
            </p>

            <p class="stat-value">
                {{ $activeBorrowings }}
            </p>

        </div>


        {{-- MENUNGGU PERSETUJUAN --}}

        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-clock"></i>
            </div>

            <p class="stat-label">
                Menunggu Persetujuan
            </p>

            <p class="stat-value">
                {{ $pendingBorrowings }}
            </p>

        </div>


        {{-- TOTAL DIKEMBALIKAN --}}

        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-circle-arrow-left"></i>
            </div>

            <p class="stat-label">
                Total Dikembalikan
            </p>

            <p class="stat-value">
                {{ $returnedBorrowings }}
            </p>

        </div>

    </div>


    {{-- ACTIVITY --}}

    <div class="dashboard-grid">


        {{-- PENGAJUAN TERBARU --}}

        <div class="dashboard-card">

            <div class="card-header">

                <h2 class="card-title">
                    Pengajuan Terbaru
                </h2>

                <a
                    href="{{ route('admin.borrowings.index') }}"
                    class="card-link">
                    Lihat Semua
                </a>

            </div>


            <div class="activity-list">

                @forelse ($latestPending as $borrowing)

                <div class="activity-item">

                    <div class="activity-info">

                        <p class="activity-book">
                            {{ $borrowing->book->title }}
                        </p>

                        <p class="activity-user">
                            {{ $borrowing->user->name }}
                        </p>

                    </div>


                    <div class="activity-date">

                        <span class="status-badge status-pending">
                            Menunggu
                        </span>

                        <div style="margin-top: 6px;">
                            {{ $borrowing->created_at->format('d M Y') }}
                        </div>

                    </div>

                </div>

                @empty

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="fa-solid fa-box-archive"></i>
                    </div>

                    <p class="empty-title">
                        Tidak ada pengajuan
                    </p>

                    <p class="empty-text">
                        Belum ada pengajuan peminjaman baru.
                    </p>

                </div>

                @endforelse

            </div>

        </div>



        {{-- PEMINJAMAN AKTIF --}}

        <div class="dashboard-card">

            <div class="card-header">

                <h2 class="card-title">
                    Peminjaman Aktif
                </h2>

                <a
                    href="{{ route('admin.borrowings.active') }}"
                    class="card-link">
                    Lihat Semua
                </a>

            </div>


            <div class="activity-list">

                @forelse ($activeBorrowingList as $borrowing)

                <div class="activity-item">

                    <div class="activity-info">

                        <p class="activity-book">
                            {{ $borrowing->book->title }}
                        </p>

                        <p class="activity-user">
                            {{ $borrowing->user->name }}
                        </p>

                        <p class="activity-approver">

                            Disetujui oleh:

                            <strong>
                                {{ $borrowing->approvedBy?->name ?? 'Belum tercatat' }}
                            </strong>

                        </p>

                    </div>


                    <div class="activity-date">

                        <span class="status-badge status-approved">
                            Dipinjam
                        </span>

                        <div style="margin-top: 6px;">

                            Kembali:

                            {{ $borrowing->due_at
                                    ? $borrowing->due_at->format('d M Y')
                                    : '-'
                                }}

                        </div>

                    </div>

                </div>

                @empty

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="fa-solid fa-book-open-reader"></i>
                    </div>

                    <p class="empty-title">
                        Tidak ada peminjaman aktif
                    </p>

                    <p class="empty-text">
                        Saat ini tidak ada buku yang sedang dipinjam.
                    </p>

                </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection