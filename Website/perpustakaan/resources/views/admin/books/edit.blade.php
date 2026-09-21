@extends('layouts.admin')

@section('content')

<style>
    .book-form-page {
        padding: 28px;
    }

    .page-header {
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

    .form-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }

    .form-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #E2E8F0;
    }

    .form-card-title {
        margin: 0;
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    .form-card-description {
        margin: 5px 0 0;
        font-size: 12px;
        color: #94A3B8;
    }

    .form-body {
        padding: 28px 24px;
    }

    /* =========================
       FORM GRID
    ========================= */

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        column-gap: 24px;
        row-gap: 22px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin: 0 0 8px;
        color: #334155;
        font-size: 12px;
        font-weight: 600;
    }

    .required-mark {
        color: #EF4444;
    }

    .form-control {
        display: block;
        width: 100%;
        min-height: 44px;
        padding: 10px 12px;
        border: 1px solid #CBD5E1;
        border-radius: 8px;
        background: #FFFFFF;
        color: #111827;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        line-height: 1.4;
        outline: none;
        box-shadow: none;
        transition: border-color .2s ease, box-shadow .2s ease;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #4F46E5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.10);
    }

    .form-control::placeholder {
        color: #94A3B8;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-help {
        display: block;
        margin-top: 7px;
        color: #94A3B8;
        font-size: 11px;
        line-height: 1.5;
    }

    .form-error {
        margin-top: 7px;
        color: #DC2626;
        font-size: 11px;
        line-height: 1.4;
    }

    /* =========================
       COVER
    ========================= */

    .cover-upload {
        padding: 18px;
        border: 1px dashed #CBD5E1;
        border-radius: 10px;
        background: #F8FAFC;
    }

    .current-cover-wrapper {
        margin-bottom: 18px;
    }

    .cover-section-label {
        margin-bottom: 10px;
        color: #64748B;
        font-size: 11px;
        font-weight: 600;
    }

    .current-cover {
        display: block;
        width: 110px;
        height: 150px;
        object-fit: cover;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        background: #F1F5F9;
        box-shadow: 0 4px 10px rgba(15, 23, 42, 0.08);
    }

    .no-cover {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 110px;
        height: 150px;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        background: #EEF2FF;
        color: #4F46E5;
        font-size: 28px;
    }

    .new-cover-preview-wrapper {
        display: none;
        margin-top: 18px;
        padding-top: 18px;
        border-top: 1px solid #E2E8F0;
    }

    .new-cover-preview {
        display: block;
        width: 110px;
        height: 150px;
        object-fit: cover;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        background: #F1F5F9;
        box-shadow: 0 4px 10px rgba(15, 23, 42, 0.08);
    }

    /* =========================
       FOOTER
    ========================= */

    .form-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        padding: 18px 24px;
        border-top: 1px solid #E2E8F0;
        background: #F8FAFC;
    }

    .btn-form {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding: 9px 16px;
        border-radius: 8px;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all .2s ease;
        box-sizing: border-box;
    }

    .btn-primary-custom {
        border: 1px solid #4F46E5;
        background: #4F46E5;
        color: #FFFFFF;
    }

    .btn-primary-custom:hover {
        border-color: #4338CA;
        background: #4338CA;
        color: #FFFFFF;
    }

    .btn-secondary-custom {
        border: 1px solid #CBD5E1;
        background: #FFFFFF;
        color: #475569;
    }

    .btn-secondary-custom:hover {
        background: #F1F5F9;
        color: #334155;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .book-form-page {
            padding: 20px 15px;
        }

        .form-body {
            padding: 22px 20px;
        }

        .form-card-header {
            padding: 18px 20px;
        }

        .form-footer {
            padding: 16px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            row-gap: 20px;
        }

        .form-group.full-width {
            grid-column: auto;
        }
    }

    @media (max-width: 576px) {

        .page-title {
            font-size: 21px;
        }

        .form-footer {
            flex-direction: column-reverse;
        }

        .btn-form {
            width: 100%;
        }
    }
</style>


<div class="book-form-page">

    {{-- PAGE HEADER --}}
    <div class="page-header">

        <h1 class="page-title">
            Edit Buku
        </h1>

        <p class="page-subtitle">
            Perbarui informasi buku yang tersedia di perpustakaan.
        </p>

    </div>


    {{-- FORM CARD --}}
    <div class="form-card">

        {{-- CARD HEADER --}}
        <div class="form-card-header">

            <h2 class="form-card-title">
                Informasi Buku
            </h2>

            <p class="form-card-description">
                Periksa dan perbarui informasi buku sesuai kebutuhan.
            </p>

        </div>


        <form
            action="{{ route('admin.books.update', $book) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')


            {{-- FORM BODY --}}
            <div class="form-body">

                <div class="form-grid">

                    {{-- JUDUL --}}
                    <div class="form-group">

                        <label for="title" class="form-label">
                            Judul Buku
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
                            value="{{ old('title', $book->title) }}"
                            placeholder="Masukkan judul buku"
                            required>

                        @error('title')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    {{-- PENULIS --}}
                    <div class="form-group">

                        <label for="author" class="form-label">
                            Penulis
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            name="author"
                            id="author"
                            class="form-control"
                            value="{{ old('author', $book->author) }}"
                            placeholder="Masukkan nama penulis"
                            required>

                        @error('author')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    {{-- PENERBIT --}}
                    <div class="form-group">

                        <label for="publisher" class="form-label">
                            Penerbit
                        </label>

                        <input
                            type="text"
                            name="publisher"
                            id="publisher"
                            class="form-control"
                            value="{{ old('publisher', $book->publisher) }}"
                            placeholder="Masukkan nama penerbit">

                        @error('publisher')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    {{-- TAHUN --}}
                    <div class="form-group">

                        <label for="year" class="form-label">
                            Tahun
                        </label>

                        <input
                            type="number"
                            name="year"
                            id="year"
                            class="form-control"
                            value="{{ old('year', $book->year) }}"
                            min="1900"
                            max="{{ date('Y') }}"
                            placeholder="{{ date('Y') }}">

                        @error('year')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    {{-- ISBN --}}
                    <div class="form-group">

                        <label for="isbn" class="form-label">
                            ISBN
                        </label>

                        <input
                            type="text"
                            name="isbn"
                            id="isbn"
                            class="form-control"
                            value="{{ old('isbn', $book->isbn) }}"
                            placeholder="Masukkan ISBN">

                        @error('isbn')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    {{-- COVER --}}
                    <div class="form-group">

                        <label for="cover" class="form-label">
                            Cover Buku
                        </label>

                        <div class="cover-upload">

                            {{-- COVER LAMA --}}
                            <div class="current-cover-wrapper">

                                <div class="cover-section-label">
                                    Cover Saat Ini
                                </div>

                                @if ($book->cover)

                                <img
                                    src="{{ asset('storage/' . $book->cover) }}"
                                    alt="Cover {{ $book->title }}"
                                    class="current-cover">

                                @else

                                <div class="no-cover">
                                    📚
                                </div>

                                @endif

                            </div>


                            {{-- INPUT COVER BARU --}}
                            <input
                                type="file"
                                name="cover"
                                id="cover"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp">

                            <small class="form-help">
                                Kosongkan jika tidak ingin mengganti cover.
                                Format JPG, JPEG, PNG, atau WebP.
                                Maksimal 2 MB.
                            </small>


                            {{-- PREVIEW COVER BARU --}}
                            <div
                                id="newCoverPreviewWrapper"
                                class="new-cover-preview-wrapper">

                                <div class="cover-section-label">
                                    Preview Cover Baru
                                </div>

                                <img
                                    id="newCoverPreview"
                                    class="new-cover-preview"
                                    src=""
                                    alt="Preview cover baru">

                            </div>


                            @error('cover')
                            <div class="form-error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="form-group full-width">

                        <label for="description" class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            class="form-control"
                            rows="4"
                            placeholder="Masukkan deskripsi buku...">{{ old('description', $book->description) }}</textarea>

                        @error('description')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

            </div>


            {{-- FORM FOOTER --}}
            <div class="form-footer">

                <a
                    href="{{ route('admin.books.index') }}"
                    class="btn-form btn-secondary-custom">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn-form btn-primary-custom">
                    Update Buku
                </button>

            </div>

        </form>

    </div>

</div>


@endsection


@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const coverInput = document.getElementById('cover');
        const previewWrapper = document.getElementById('newCoverPreviewWrapper');
        const preview = document.getElementById('newCoverPreview');

        if (!coverInput) {
            return;
        }

        coverInput.addEventListener('change', function(event) {

            const file = event.target.files[0];

            if (!file) {
                previewWrapper.style.display = 'none';
                preview.src = '';
                return;
            }

            if (!file.type.startsWith('image/')) {
                previewWrapper.style.display = 'none';
                preview.src = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewWrapper.style.display = 'block';
            };

            reader.readAsDataURL(file);

        });

    });
</script>

@endpush