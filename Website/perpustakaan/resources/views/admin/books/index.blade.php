@extends('layouts.admin')

@section('content')

<style>
    .books-page {
        padding: 28px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
    }

    .page-title {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #111827;
    }

    .page-subtitle {
        margin: 6px 0 0;
        font-size: 13px;
        color: #64748B;
    }

    .btn-add-book {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border: none;
        border-radius: 9px;
        background: #4F46E5;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s ease;
    }

    .btn-add-book:hover {
        background: #4338CA;
        color: #fff;
        transform: translateY(-1px);
    }

    .alert-success {
        border: none;
        border-radius: 10px;
        padding: 13px 16px;
        margin-bottom: 20px;
        background: #ECFDF5;
        color: #047857;
        font-size: 13px;
    }

    .books-card {
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        overflow: hidden;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .books-table {
        width: 100%;
        min-width: 900px;
        margin: 0;
        border-collapse: collapse;
    }

    .books-table thead th {
        padding: 14px 18px;
        background: #F8FAFC;
        border-bottom: 1px solid #E2E8F0;
        color: #64748B;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        white-space: nowrap;
    }

    .books-table tbody td {
        padding: 14px 18px;
        border-bottom: 1px solid #F1F5F9;
        color: #334155;
        font-size: 13px;
        vertical-align: middle;
    }

    .books-table tbody tr:last-child td {
        border-bottom: none;
    }

    .books-table tbody tr {
        transition: background .2s ease;
    }

    .books-table tbody tr:hover {
        background: #F8FAFC;
    }

    .number-cell {
        width: 50px;
        color: #94A3B8 !important;
        font-weight: 600;
    }

    .book-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 220px;
    }

    .book-cover {
        width: 42px;
        height: 56px;
        flex-shrink: 0;
        border-radius: 6px;
        object-fit: cover;
        background: #F1F5F9;
        border: 1px solid #E2E8F0;
    }

    .book-cover-placeholder {
        width: 42px;
        height: 56px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        background: #EEF2FF;
        border: 1px solid #E0E7FF;
        font-size: 18px;
    }

    .book-title {
        color: #111827;
        font-weight: 600;
        line-height: 1.4;
    }

    .book-author {
        margin-top: 3px;
        color: #94A3B8;
        font-size: 11px;
    }

    .isbn {
        font-family: monospace;
        color: #64748B;
        font-size: 12px;
    }

    .action-group {
        display: flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 7px 11px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-edit {
        background: #EEF2FF;
        color: #4338CA;
    }

    .btn-edit:hover {
        background: #E0E7FF;
        color: #3730A3;
    }

    .btn-delete {
        background: #FEF2F2;
        color: #DC2626;
    }

    .btn-delete:hover {
        background: #FEE2E2;
        color: #B91C1C;
    }

    .empty-state {
        padding: 60px 20px !important;
        text-align: center;
    }

    .empty-icon {
        width: 52px;
        height: 52px;
        margin: 0 auto 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #EEF2FF;
        font-size: 22px;
    }

    .empty-title {
        margin: 0 0 5px;
        color: #111827;
        font-size: 15px;
        font-weight: 600;
    }

    .empty-text {
        margin: 0;
        color: #94A3B8;
        font-size: 12px;
    }

    @media (max-width: 768px) {
        .books-page {
            padding: 20px 15px;
        }

        .page-header {
            align-items: flex-start;
        }

        .page-title {
            font-size: 21px;
        }

        .btn-add-book {
            padding: 9px 12px;
            font-size: 12px;
        }
    }

    @media (max-width: 576px) {
        .page-header {
            flex-direction: column;
        }

        .btn-add-book {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="books-page">

    <div class="page-header">

        <div>
            <h1 class="page-title">Daftar Buku</h1>
            <p class="page-subtitle">
                Kelola koleksi buku perpustakaan.
            </p>
        </div>

        <a href="{{ route('admin.books.create') }}" class="btn-add-book">
            <span><i class="fa-solid fa-plus"></i></span>
            Tambah Buku
        </a>

    </div>

    @if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="books-card">

        <div class="table-wrapper">

            <table class="books-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>ISBN</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($books as $book)

                    <tr>

                        <td class="number-cell">
                            {{ $loop->iteration }}
                        </td>

                        <td>

                            <div class="book-info">

                                @if ($book->cover)

                                <img
                                    src="{{ asset('storage/' . $book->cover) }}"
                                    alt="Cover {{ $book->title }}"
                                    class="book-cover">

                                @else

                                <div class="book-cover-placeholder">
                                    <i class="fa-solid fa-book"></i>
                                </div>

                                @endif

                                <div>
                                    <div class="book-title">
                                        {{ $book->title }}
                                    </div>

                                    <div class="book-author">
                                        {{ $book->author }}
                                    </div>
                                </div>

                            </div>

                        </td>

                        <td>
                            {{ $book->author }}
                        </td>

                        <td>
                            {{ $book->publisher ?? '-' }}
                        </td>

                        <td>
                            {{ $book->year ?? '-' }}
                        </td>

                        <td>
                            <span class="isbn">
                                {{ $book->isbn ?? '-' }}
                            </span>
                        </td>

                        <td>

                            <div class="action-group">

                                <a
                                    href="{{ route('admin.books.edit', $book) }}"
                                    class="btn-action btn-edit">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.books.destroy', $book) }}"
                                    method="POST"
                                    class="delete-book-form">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-action btn-delete">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="7" class="empty-state">

                            <div class="empty-icon">
                                📚
                            </div>

                            <h3 class="empty-title">
                                Belum Ada Buku
                            </h3>

                            <p class="empty-text">
                                Belum ada koleksi buku yang ditambahkan.
                            </p>

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.delete-book-form').forEach(function(form) {

            form.addEventListener('submit', function(event) {

                event.preventDefault();

                Swal.fire({
                    title: 'Hapus buku?',
                    text: 'Data buku yang dihapus tidak dapat dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then(function(result) {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });

    });
</script>

@endpush