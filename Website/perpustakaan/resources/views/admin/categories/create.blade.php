@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

<style>
    .category-page {
        padding: 28px;
    }

    .page-header {
        margin-bottom: 22px;
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

    .form-card {
        max-width: 650px;
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 26px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, .04);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-size: 12px;
        font-weight: 600;
    }

    .required {
        color: #DC2626;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        padding: 11px 13px;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        outline: none;
        background: #FFFFFF;
        color: #111827;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        transition: all .2s ease;
    }

    .form-control::placeholder {
        color: #94A3B8;
    }

    .form-control:focus {
        border-color: #818CF8;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, .08);
    }

    .form-error {
        margin-top: 6px;
        color: #DC2626;
        font-size: 11px;
    }

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 8px;
        padding-top: 6px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 10px 15px;
        border: none;
        border-radius: 8px;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all .2s ease;
    }

    .btn-cancel {
        background: #F1F5F9;
        color: #475569;
    }

    .btn-cancel:hover {
        background: #E2E8F0;
        color: #334155;
    }

    .btn-save {
        background: #4F46E5;
        color: #FFFFFF;
    }

    .btn-save:hover {
        background: #4338CA;
        color: #FFFFFF;
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .category-page {
            padding: 16px;
        }

        .page-title {
            font-size: 21px;
        }

        .page-subtitle {
            font-size: 12px;
        }

        .form-card {
            padding: 20px;
            border-radius: 12px;
        }

        .form-actions {
            justify-content: stretch;
        }

        .form-actions .btn {
            flex: 1;
        }
    }
</style>

<div class="category-page">

    <div class="page-header">

        <a
            href="{{ route('admin.categories.index') }}"
            class="back-link">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Kategori
        </a>

        <h1 class="page-title">
            Tambah Kategori
        </h1>

        <p class="page-subtitle">
            Tambahkan kategori baru untuk mengelompokkan buku
        </p>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.categories.store') }}"
            method="POST">
            @csrf

            <div class="form-group">

                <label
                    for="name"
                    class="form-label">
                    Nama Kategori
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Teknologi"
                    maxlength="255"
                    required
                    autofocus>

                @error('name')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="form-actions">

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="btn btn-cancel">
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-save">
                    Simpan Kategori
                </button>

            </div>

        </form>

    </div>

</div>

@endsection