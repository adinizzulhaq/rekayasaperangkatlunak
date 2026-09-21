@extends('layouts.admin')

@section('title', 'Peminjaman')

@section('content')

<style>
    .borrowings-page {
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

    /* =========================
       ALERT
    ========================= */

    .alert {
        margin-bottom: 20px;
        padding: 13px 16px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 500;
    }

    .alert-success {
        background: #DCFCE7;
        border: 1px solid #BBF7D0;
        color: #166534;
    }

    .alert-error {
        background: #FEE2E2;
        border: 1px solid #FECACA;
        color: #991B1B;
    }

    /* =========================
       CARD
    ========================= */

    .borrowings-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, .04);
        overflow: hidden;
    }

    /* =========================
       TABLE
    ========================= */

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .borrowings-table {
        width: 100%;
        min-width: 1100px;
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

    /* =========================
       COLUMN
    ========================= */

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
        width: 180px;
        max-width: 220px;
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

    /* =========================
       STATUS
    ========================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-pending {
        background: #FEF3C7;
        color: #92400E;
    }

    .status-approved {
        background: #DCFCE7;
        color: #166534;
    }

    .status-overdue {
        background: #FEE2E2;
        color: #991B1B;
    }

    .status-returned {
        background: #DBEAFE;
        color: #1D4ED8;
    }

    .status-rejected {
        background: #F1F5F9;
        color: #475569;
    }

    /* =========================
       DUE DATE
    ========================= */

    .due-date {
        color: #334155;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .due-date.due-overdue {
        color: #DC2626;
    }

    /* =========================
       ADMIN ACTIVITY
    ========================= */

    .activity-info {
        min-width: 170px;
    }

    .activity-main {
        color: #475569;
        font-size: 11px;
        font-weight: 600;
        line-height: 1.5;
        white-space: nowrap;
    }

    .activity-time {
        margin-top: 4px;
        color: #94A3B8;
        font-size: 10px;
        white-space: nowrap;
    }

    .activity-empty {
        color: #94A3B8;
        font-size: 10px;
        font-style: italic;
        white-space: nowrap;
    }

    /* =========================
       ACTION
    ========================= */

    .action-wrapper {
        display: flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap;
    }

    .action-form {
        margin: 0;
    }

    .btn-action {
        border: none;
        border-radius: 7px;
        padding: 7px 11px;
        font-family: 'Inter', sans-serif;
        font-size: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all .2s ease;
        white-space: nowrap;
    }

    .btn-action:hover {
        transform: translateY(-1px);
    }

    .btn-approve {
        background: #DCFCE7;
        color: #166534;
    }

    .btn-approve:hover {
        background: #BBF7D0;
    }

    .btn-reject {
        background: #FEE2E2;
        color: #991B1B;
    }

    .btn-reject:hover {
        background: #FECACA;
    }

    .btn-return {
        background: #EEF2FF;
        color: #4338CA;
    }

    .btn-return:hover {
        background: #E0E7FF;
    }

    /* =========================
       EMPTY STATE
    ========================= */

    .empty-state {
        padding: 60px 25px;
        text-align: center;
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

    /* =========================
       SWEETALERT
    ========================= */

    .swal-confirm-button {
        border: none;
        border-radius: 8px;
        padding: 9px 16px;
        margin-left: 6px;
        background: #4F46E5;
        color: #FFFFFF;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .swal-confirm-button:hover {
        background: #4338CA;
    }

    .swal-cancel-button {
        border: none;
        border-radius: 8px;
        padding: 9px 16px;
        background: #F1F5F9;
        color: #475569;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .swal-cancel-button:hover {
        background: #E2E8F0;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 1200px) {
        .borrowings-page {
            padding: 24px;
        }

        .borrowings-table {
            min-width: 1050px;
        }

        .borrowings-table th,
        .borrowings-table td {
            padding: 12px 13px;
        }
    }

    @media (max-width: 768px) {
        .borrowings-page {
            padding: 16px;
        }

        .page-title {
            font-size: 21px;
        }

        .page-subtitle {
            font-size: 12px;
        }

        .borrowings-card {
            border-radius: 12px;
        }

        .borrowings-table {
            min-width: 1050px;
        }
    }
</style>


<div class="borrowings-page">

    {{-- HEADER --}}
    <div class="page-header">
        <h1 class="page-title">
            Peminjaman
        </h1>

        <p class="page-subtitle">
            Kelola pengajuan, peminjaman, dan pengembalian buku
        </p>
    </div>


    {{-- TABLE CARD --}}
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
                        <th>Mulai</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                        <th>Admin / Aktivitas</th>
                        <th>Aksi</th>
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


                        {{-- MULAI --}}
                        <td>

                            @if ($borrowing->borrowed_at)

                            <div class="date-main">
                                {{ $borrowing->borrowed_at->format('d M Y') }}
                            </div>

                            <div class="date-time">
                                {{ $borrowing->borrowed_at->format('H:i') }}
                            </div>

                            @else

                            <span class="activity-empty">
                                -
                            </span>

                            @endif

                        </td>


                        {{-- JATUH TEMPO --}}
                        <td>

                            @if ($borrowing->due_at)

                            <div class="
                                            due-date
                                            {{ $borrowing->is_overdue ? 'due-overdue' : '' }}
                                        ">
                                {{ $borrowing->due_at->format('d M Y') }}
                            </div>

                            <div class="date-time">
                                {{ $borrowing->due_at->format('H:i') }}
                            </div>

                            @else

                            <span class="activity-empty">
                                -
                            </span>

                            @endif

                        </td>


                        {{-- STATUS --}}
                        <td>

                            @if ($borrowing->status === 'pending')

                            <span class="status-badge status-pending">
                                Menunggu
                            </span>

                            @elseif ($borrowing->status === 'approved')

                            @if ($borrowing->is_overdue)

                            <span class="status-badge status-overdue">
                                Terlambat
                            </span>

                            @else

                            <span class="status-badge status-approved">
                                Dipinjam
                            </span>

                            @endif

                            @elseif ($borrowing->status === 'returned')

                            <span class="status-badge status-returned">
                                Dikembalikan
                            </span>

                            @elseif ($borrowing->status === 'rejected')

                            <span class="status-badge status-rejected">
                                Ditolak
                            </span>

                            @endif

                        </td>


                        {{-- ADMIN / AKTIVITAS --}}
                        <td>

                            @if ($borrowing->status === 'approved')

                            @if ($borrowing->approvedBy)

                            <div class="activity-info">

                                <div class="activity-main">
                                    Disetujui oleh:
                                    {{ $borrowing->approvedBy->name }}
                                </div>

                                @if ($borrowing->approved_at)

                                <div class="activity-time">
                                    {{ $borrowing->approved_at->format('d M Y H:i') }}
                                </div>

                                @endif

                            </div>

                            @else

                            <span class="activity-empty">
                                Belum tercatat
                            </span>

                            @endif


                            @elseif ($borrowing->status === 'rejected')

                            @if ($borrowing->rejectedBy)

                            <div class="activity-info">

                                <div class="activity-main">
                                    Ditolak oleh:
                                    {{ $borrowing->rejectedBy->name }}
                                </div>

                                @if ($borrowing->rejected_at)

                                <div class="activity-time">
                                    {{ $borrowing->rejected_at->format('d M Y H:i') }}
                                </div>

                                @endif

                            </div>

                            @else

                            <span class="activity-empty">
                                Belum tercatat
                            </span>

                            @endif


                            @elseif ($borrowing->status === 'returned')

                            @if ($borrowing->returnedBy)

                            <div class="activity-info">

                                <div class="activity-main">
                                    Dikembalikan oleh:
                                    {{ $borrowing->returnedBy->name }}
                                </div>

                                @if ($borrowing->returned_at)

                                <div class="activity-time">
                                    {{ $borrowing->returned_at->format('d M Y H:i') }}
                                </div>

                                @endif

                            </div>

                            @else

                            <span class="activity-empty">
                                Belum tercatat
                            </span>

                            @endif


                            @elseif ($borrowing->status === 'pending')

                            <span class="activity-empty">
                                Belum diproses
                            </span>

                            @endif

                        </td>


                        {{-- AKSI --}}
                        <td>

                            <div class="action-wrapper">

                                {{-- PENDING --}}
                                @if ($borrowing->status === 'pending')

                                {{-- SETUJUI --}}
                                <form
                                    action="{{ route('admin.borrowings.approve', $borrowing) }}"
                                    method="POST"
                                    class="action-form"
                                    onsubmit="return confirmBorrowingAction(
                                                    event,
                                                    this,
                                                    'Setujui Peminjaman?',
                                                    'Peminjaman {{ addslashes($borrowing->book->title) }} akan disetujui.',
                                                    'Setujui',
                                                    'success'
                                                )">

                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn-action btn-approve">
                                        <i class="fa-solid fa-check"></i>
                                        Setujui
                                    </button>

                                </form>


                                {{-- TOLAK --}}
                                <form
                                    action="{{ route('admin.borrowings.reject', $borrowing) }}"
                                    method="POST"
                                    class="action-form"
                                    onsubmit="return confirmBorrowingAction(
                                                    event,
                                                    this,
                                                    'Tolak Peminjaman?',
                                                    'Peminjaman {{ addslashes($borrowing->book->title) }} akan ditolak.',
                                                    'Tolak',
                                                    'error'
                                                )">

                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn-action btn-reject">
                                        <i class="fa-solid fa-xmark"></i>
                                        Tolak
                                    </button>

                                </form>


                                {{-- APPROVED --}}
                                @elseif ($borrowing->status === 'approved')

                                {{-- KEMBALIKAN --}}
                                <form
                                    action="{{ route('admin.borrowings.return', $borrowing) }}"
                                    method="POST"
                                    class="action-form"
                                    onsubmit="return confirmBorrowingAction(
                                                    event,
                                                    this,
                                                    'Proses Pengembalian?',
                                                    'Buku {{ addslashes($borrowing->book->title) }} akan dicatat sebagai dikembalikan.',
                                                    'Kembalikan',
                                                    'info'
                                                )">

                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn-action btn-return">
                                        <i class="fa-solid fa-arrow-left"></i>
                                        Kembalikan
                                    </button>

                                </form>


                                {{-- RETURNED / REJECTED --}}
                                @else

                                <span class="activity-empty">
                                    -
                                </span>

                                @endif

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        <div class="empty-state">

            <p class="empty-title">
                Belum ada data peminjaman
            </p>

            <p class="empty-text">
                Pengajuan peminjaman akan muncul di sini.
            </p>

        </div>

        @endif

    </div>

</div>


{{-- =========================
     SWEETALERT SCRIPT
========================= --}}

<script>
    function confirmBorrowingAction(
        event,
        form,
        title,
        text,
        confirmText,
        icon
    ) {
        event.preventDefault();

        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonText: confirmText,
            cancelButtonText: 'Batal',
            reverseButtons: true,
            focusCancel: true,
            customClass: {
                confirmButton: 'swal-confirm-button',
                cancelButton: 'swal-cancel-button'
            },
            buttonsStyling: false
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

        return false;
    }


    // SUCCESS
    @if(session('success'))

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: @json(session('success')),
        confirmButtonText: 'OK',
        confirmButtonColor: '#4F46E5'
    });

    @endif


    // ERROR
    @if(session('error'))

    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: @json(session('error')),
        confirmButtonText: 'OK',
        confirmButtonColor: '#4F46E5'
    });

    @endif
</script>

@endsection