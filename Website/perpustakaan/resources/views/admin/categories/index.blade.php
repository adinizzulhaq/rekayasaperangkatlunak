@extends('layouts.admin')

@section('title', 'Kategori Buku')

@section('content')

<style>
    .categories-page {
        padding: 28px;
    }

    .page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
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

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        border: none;
        border-radius: 8px;
        background: #4F46E5;
        color: #FFFFFF;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all .2s ease;
    }

    .btn-add:hover {
        background: #4338CA;
        color: #FFFFFF;
        transform: translateY(-1px);
    }

    .categories-card {
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

    .categories-table {
        width: 100%;
        min-width: 650px;
        border-collapse: collapse;
    }

    .categories-table th {
        padding: 14px 16px;
        background: #F8FAFC;
        border-bottom: 1px solid #E2E8F0;
        color: #64748B;
        font-size: 11px;
        font-weight: 600;
        text-align: left;
        white-space: nowrap;
    }

    .categories-table td {
        padding: 15px 16px;
        border-bottom: 1px solid #F1F5F9;
        color: #334155;
        font-size: 12px;
        vertical-align: middle;
    }

    .categories-table tbody tr:last-child td {
        border-bottom: none;
    }

    .categories-table tbody tr {
        transition: background .15s ease;
    }

    .categories-table tbody tr:hover {
        background: #FAFBFC;
    }

    .number {
        width: 55px;
        color: #94A3B8;
        font-size: 11px;
    }

    .category-name {
        color: #111827;
        font-size: 12px;
        font-weight: 600;
    }

    .book-count {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 999px;
        background: #EEF2FF;
        color: #4338CA;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

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
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        border: none;
        border-radius: 7px;
        padding: 7px 10px;
        font-family: 'Inter', sans-serif;
        font-size: 10px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all .2s ease;
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
        background: #FEE2E2;
        color: #991B1B;
    }

    .btn-delete:hover {
        background: #FECACA;
        color: #7F1D1D;
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

    @media (max-width: 768px) {
        .categories-page {
            padding: 16px;
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .page-title {
            font-size: 21px;
        }

        .page-subtitle {
            font-size: 12px;
        }

        .categories-card {
            border-radius: 12px;
        }

        .categories-table {
            min-width: 650px;
        }
    }
</style>

<div class="categories-page">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1 class="page-title">
                Kategori Buku
            </h1>

            <p class="page-subtitle">
                Kelola kategori buku perpustakaan
            </p>
        </div>

        <a
            href="{{ route('admin.categories.create') }}"
            class="btn-add">
            <i class="fa-solid fa-plus"></i>
            Tambah Kategori
        </a>

    </div>

    {{-- TABLE --}}
    <div class="categories-card">

        @if ($categories->count() > 0)

        <div class="table-wrapper">

            <table class="categories-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($categories as $category)

                    <tr>

                        <td class="number">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <div class="category-name">
                                {{ $category->name }}
                            </div>
                        </td>

                        <td>
                            <span class="book-count">
                                <i class="fa-solid fa-book"></i>
                                {{ $category->books_count }} buku
                            </span>
                        </td>

                        <td>

                            <div class="action-wrapper">

                                <a
                                    href="{{ route('admin.categories.edit', $category) }}"
                                    class="btn-action btn-edit">
                                    <i class="fa-solid fa-pen"></i>
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.categories.destroy', $category) }}"
                                    method="POST"
                                    class="action-form"
                                    onsubmit="return confirmDeleteCategory(event, this, '{{ addslashes($category->name) }}')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-action btn-delete">
                                        <i class="fa-solid fa-trash"></i>
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        <div class="empty-state">

            <div class="empty-icon">
                <i class="fa-solid fa-tags"></i>
            </div>

            <p class="empty-title">
                Belum ada kategori
            </p>

            <p class="empty-text">
                Tambahkan kategori untuk mengelompokkan buku.
            </p>

        </div>

        @endif

    </div>

</div>

<script>
    function confirmDeleteCategory(event, form, categoryName) {
        event.preventDefault();

        Swal.fire({
            title: 'Hapus Kategori?',
            text: 'Kategori "' + categoryName + '" akan dihapus.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
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

    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: @json(session('success')),
        confirmButtonText: 'OK',
        confirmButtonColor: '#4F46E5'
    });
    @endif

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