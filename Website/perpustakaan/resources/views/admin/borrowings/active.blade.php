@extends('layouts.admin')

@section('title', 'Peminjaman Aktif')

@section('content')

<style>
    .active-page {
        padding: 28px;
    }

    .page-header {
        margin-bottom: 22px;
    }

    .page-title {
        margin: 0;
        color: #111827;
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -0.4px;
    }

    .page-subtitle {
        margin: 6px 0 0;
        color: #94A3B8;
        font-size: 13px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 16px;
        color: #64748B;
        font-size: 12px;
        font-weight: 500;
        text-decoration: none;
        transition: color .2s ease;
    }

    .back-link:hover {
        color: #4F46E5;
    }

    .borrowings-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, .04);
        overflow: hidden;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .borrowings-table {
        width: 100%;
        min-width: 1000px;
        border-collapse: collapse;
    }

    .borrowings-table th {
        padding: 14px 16px;
        background: #F8FAFC;
        border-bottom: 1px solid #E2E8F0;
        color: #64748B;
        font-size: 11px;
        font-weight: 600;
        text-align: left;
        white-space: nowrap;
    }

    .borrowings-table td {
        padding: 15px 16px;
        border-bottom: 1px solid #F1F5F9;
        color: #334155;
        font-size: 12px;
        vertical-align: middle;
    }

    .borrowings-table tbody tr:last-child td {
        border-bottom: none;
    }

    .borrowings-table tbody tr {
        transition: background .15s ease;
    }

    .borrowings-table tbody tr:hover {
        background: #FAFBFC;
    }

    .number {
        width: 45px;
        color: #94A3B8;
        font-size: 11px;
    }

    .user-name {
        color: #111827;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .user-email {
        margin-top: 4px;
        color: #94A3B8;
        font-size: 10px;
        white-space: nowrap;
    }

    .book-title {
        max-width: 240px;
        color: #111827;
        font-size: 12px;
        font-weight: 600;
        line-height: 1.5;
    }

    .date-main {
        color: #334155;
        font-size: 11px;
        white-space: nowrap;
    }

    .date-time {
        margin-top: 4px;
        color: #94A3B8;
        font-size: 10px;
        white-space: nowrap;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 10px;
        border-radius: 999px;
        background: #DCFCE7;
        color: #166534;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-overdue {
        background: #FEE2E2;
        color: #991B1B;
    }

    .approved-info {
        color: #475569;
        font-size: 10px;
        line-height: 1.5;
        white-space: nowrap;
    }

    .approved-info strong {
        color: #334155;
        font-weight: 600;
    }

    .empty-state {
        padding: 60px 25px;
        text-align: center;
    }

    .empty-icon {
        width: 46px;
        height: 46px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        border-radius: 12px;
        background: #EEF2FF;
        color: #4F46E5;
        font-size: 18px;
    }

    .empty-title {
        margin: 0;
        color: #475569;
        font-size: 14px;
        font-weight: 600;
    }

    .empty-text {
        margin: 6px 0 0;
        color: #94A3B8;
        font-size: 12px;
    }

    @media (max-width: 768px) {
        .active-page {
            padding: 16px;
        }

        .page-title {
            font-size: 21px;
        }

        .page-subtitle {
            font-size: 12px;
        }

        .borrowings-table {
            min-width: 1000px;
        }
    }
</style>

<div class="active-page">

    {{-- HEADER --}}
    <div class="page-header">

        <h1 class="page-title">
            Peminjaman Aktif
        </h1>

        <p class="page-subtitle">
            Daftar buku yang sedang dipinjam oleh pengguna
        </p>

    </div>

    {{-- TABLE --}}
    <div class="borrowings-card">

        @if ($borrowings->count() > 0)

        <div class="table-wrapper">

            <table class="borrowings-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Peminjam</th>
                        <th>Buku</th>
                        <th>Diajukan</th>
                        <th>Mulai Meminjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                        <th>Disetujui Oleh</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($borrowings as $borrowing)

                    <tr>

                        {{-- NO --}}
                        <td class="number">
                            {{ $loop->iteration }}
                        </td>

                        {{-- PEMINJAM --}}
                        <td>

                            <div class="user-name">
                                {{ $borrowing->user->name }}
                            </div>

                            <div class="user-email">
                                {{ $borrowing->user->email }}
                            </div>

                        </td>

                        {{-- BUKU --}}
                        <td>

                            <div class="book-title">
                                {{ $borrowing->book->title }}
                            </div>

                        </td>

                        {{-- DIAJUKAN --}}
                        <td>

                            <div class="date-main">
                                {{ $borrowing->created_at->format('d M Y') }}
                            </div>

                            <div class="date-time">
                                {{ $borrowing->created_at->format('H:i') }}
                            </div>

                        </td>

                        {{-- MULAI MEMINJAM --}}
                        <td>

                            @if ($borrowing->borrowed_at)

                            <div class="date-main">
                                {{ $borrowing->borrowed_at->format('d M Y') }}
                            </div>

                            <div class="date-time">
                                {{ $borrowing->borrowed_at->format('H:i') }}
                            </div>

                            @else

                            <span class="date-time">
                                -
                            </span>

                            @endif

                        </td>

                        {{-- JATUH TEMPO --}}
                        <td>

                            @if ($borrowing->due_at)

                            <div class="
                                            date-main
                                            {{ $borrowing->is_overdue ? 'due-overdue' : '' }}
                                        ">
                                {{ $borrowing->due_at->format('d M Y') }}
                            </div>

                            <div class="date-time">
                                {{ $borrowing->due_at->format('H:i') }}
                            </div>

                            @else

                            <span class="date-time">
                                -
                            </span>

                            @endif

                        </td>

                        {{-- STATUS --}}
                        <td>

                            @if ($borrowing->is_overdue)

                            <span class="status-badge status-overdue">
                                Terlambat
                            </span>

                            @else

                            <span class="status-badge">
                                Dipinjam
                            </span>

                            @endif

                        </td>

                        {{-- DISETUJUI OLEH --}}
                        <td>

                            @if ($borrowing->approvedBy)

                            <div class="approved-info">
                                <strong>
                                    {{ $borrowing->approvedBy->name }}
                                </strong>
                            </div>

                            @if ($borrowing->approved_at)

                            <div class="date-time">
                                {{ $borrowing->approved_at->format('d M Y H:i') }}
                            </div>

                            @endif

                            @else

                            <span class="date-time">
                                Belum tercatat
                            </span>

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        <div class="empty-state">

            <div class="empty-icon">
                <i class="fa-solid fa-book-open-reader"></i>
            </div>

            <p class="empty-title">
                Tidak ada peminjaman aktif
            </p>

            <p class="empty-text">
                Belum ada buku yang sedang dipinjam.
            </p>

        </div>

        @endif

    </div>

</div>

@endsection