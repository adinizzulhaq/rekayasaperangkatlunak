@extends('admin.layouts.app')

@section('title', 'Detail Buku | Admin')

@section('page-title', 'Detail Buku')

@section('content')

<div class="book-detail-wrapper">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1>Detail Buku</h1>
            <p>Informasi lengkap mengenai buku.</p>
        </div>

        <a
            href="{{ route('admin.books.index') }}"
            class="btn-back">

            <i class="fa-solid fa-arrow-left"></i>

            Kembali
        </a>

    </div>


    {{-- DETAIL CARD --}}
    <div class="book-detail-card">

        {{-- COVER --}}
        <div class="book-cover-section">

            @if ($book->cover)

            <img
                src="{{ asset('storage/' . $book->cover) }}"
                alt="Cover {{ $book->title }}"
                class="book-cover">

            @else

            <div class="book-cover-placeholder">

                <i class="fa-solid fa-book"></i>

                <span>
                    Tidak ada cover
                </span>

            </div>

            @endif

        </div>


        {{-- INFORMATION --}}
        <div class="book-info-section">

            <div class="book-title">

                <span class="detail-label">
                    Judul Buku
                </span>

                <h2>
                    {{ $book->title }}
                </h2>

            </div>


            <div class="detail-grid">

                {{-- Penulis --}}
                <div class="detail-item">

                    <span class="detail-label">
                        <i class="fa-solid fa-user-pen"></i>
                        Penulis
                    </span>

                    <span class="detail-value">
                        {{ $book->author }}
                    </span>

                </div>


                {{-- Penerbit --}}
                <div class="detail-item">

                    <span class="detail-label">
                        <i class="fa-solid fa-building"></i>
                        Penerbit
                    </span>

                    <span class="detail-value">

                        {{ $book->publisher ?: '-' }}

                    </span>

                </div>


                {{-- Tahun --}}
                <div class="detail-item">

                    <span class="detail-label">
                        <i class="fa-solid fa-calendar"></i>
                        Tahun Terbit
                    </span>

                    <span class="detail-value">

                        {{ $book->year ?: '-' }}

                    </span>

                </div>


                {{-- ISBN --}}
                <div class="detail-item">

                    <span class="detail-label">
                        <i class="fa-solid fa-barcode"></i>
                        ISBN
                    </span>

                    <span class="detail-value">

                        {{ $book->isbn ?: '-' }}

                    </span>

                </div>


                {{-- Kategori --}}
                <div class="detail-item">

                    <span class="detail-label">
                        <i class="fa-solid fa-tags"></i>
                        Kategori
                    </span>

                    <span class="detail-value">

                        {{ $book->category?->name ?? '-' }}

                    </span>

                </div>


                {{-- ID Buku --}}
                <div class="detail-item">

                    <span class="detail-label">
                        <i class="fa-solid fa-hashtag"></i>
                        ID Buku
                    </span>

                    <span class="detail-value">

                        #{{ $book->id }}

                    </span>

                </div>

            </div>


            {{-- DESCRIPTION --}}
            <div class="description-section">

                <span class="detail-label">

                    <i class="fa-solid fa-align-left"></i>

                    Deskripsi

                </span>

                <div class="description-text">

                    @if ($book->description)

                    {!! nl2br(e($book->description)) !!}

                    @else

                    <span class="empty-description">
                        Tidak ada deskripsi untuk buku ini.
                    </span>

                    @endif

                </div>

            </div>


            {{-- ACTION --}}
            <div class="book-actions">

                <a
                    href="{{ route('admin.books.edit', $book) }}"
                    class="btn-edit">

                    <i class="fa-solid fa-pen"></i>

                    Edit Buku

                </a>

            </div>

        </div>

    </div>

</div>


<style>
    .book-detail-wrapper {
        max-width: 1100px;
        margin: 0 auto;
    }

    /* HEADER */

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }

    .page-header h1 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #111827;
    }

    .page-header p {
        margin: 6px 0 0;
        font-size: 13px;
        color: #6b7280;
    }

    /* BACK BUTTON */

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: #ffffff;
        color: #374151;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .btn-back:hover {
        background: #f9fafb;
        border-color: #d1d5db;
    }

    /* CARD */

    .book-detail-card {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 35px;
        padding: 30px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
    }

    /* COVER */

    .book-cover-section {
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .book-cover {
        width: 250px;
        height: 350px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .book-cover-placeholder {
        width: 250px;
        height: 350px;
        border-radius: 8px;
        border: 1px dashed #d1d5db;
        background: #f9fafb;
        color: #9ca3af;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .book-cover-placeholder i {
        font-size: 45px;
    }

    .book-cover-placeholder span {
        font-size: 12px;
    }

    /* BOOK INFO */

    .book-info-section {
        min-width: 0;
    }

    .book-title {
        padding-bottom: 20px;
        border-bottom: 1px solid #e5e7eb;
        margin-bottom: 20px;
    }

    .detail-label {
        display: block;
        margin-bottom: 7px;
        color: #6b7280;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-label i {
        margin-right: 5px;
    }

    .book-title h2 {
        margin: 0;
        color: #111827;
        font-size: 24px;
        line-height: 1.35;
        font-weight: 700;
    }

    /* GRID */

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px 25px;
    }

    .detail-item {
        padding-bottom: 15px;
        border-bottom: 1px solid #f3f4f6;
    }

    .detail-value {
        display: block;
        color: #374151;
        font-size: 14px;
        font-weight: 500;
    }

    /* DESCRIPTION */

    .description-section {
        margin-top: 22px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .description-text {
        color: #4b5563;
        font-size: 14px;
        line-height: 1.7;
    }

    .empty-description {
        color: #9ca3af;
        font-style: italic;
    }

    /* ACTION */

    .book-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border-radius: 8px;
        background: #4f46e5;
        color: #ffffff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .btn-edit:hover {
        background: #4338ca;
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {

        .page-header {
            align-items: flex-start;
            gap: 15px;
        }

        .book-detail-card {
            grid-template-columns: 1fr;
            padding: 20px;
        }

        .book-cover-section {
            justify-content: center;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

    }
</style>

@endsection