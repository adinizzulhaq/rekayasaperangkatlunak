<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with([
            'user',
            'book',
            'approvedBy',
            'rejectedBy',
            'returnedBy',
        ])
            ->latest()
            ->get();

        return view('admin.borrowings.index', compact('borrowings'));
    }

    public function active()
    {
        $borrowings = Borrowing::with([
            'user',
            'book',
            'approvedBy',
        ])
            ->where('status', 'approved')
            ->whereNull('returned_at')
            ->latest('borrowed_at')
            ->get();

        return view('admin.borrowings.active', compact('borrowings'));
    }

    public function store(Request $request, Book $book)
    {
        $request->validate([
            'due_at' => [
                'required',
                'date',
                'after:now',
            ],
        ]);

        $user = auth()->user();

        $isBorrowed = $book->borrowings()
            ->where('status', 'approved')
            ->whereNull('returned_at')
            ->exists();

        if ($isBorrowed) {
            return back()->with(
                'error',
                'Buku sedang dipinjam.'
            );
        }

        $hasPending = $book->borrowings()
            ->where('user_id', $user->id)
            ->whereIn('status', [
                'pending',
                'approved',
            ])
            ->whereNull('returned_at')
            ->exists();

        if ($hasPending) {
            return back()->with(
                'error',
                'Anda sudah memiliki pengajuan untuk buku ini.'
            );
        }

        Borrowing::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'status' => 'pending',
            'due_at' => $request->due_at,
        ]);

        return back()->with(
            'success',
            'Pengajuan peminjaman berhasil dikirim.'
        );
    }

    public function approve(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'pending') {
            return back()->with(
                'error',
                'Pengajuan ini sudah diproses.'
            );
        }

        $isBorrowed = Borrowing::where('book_id', $borrowing->book_id)
            ->where('status', 'approved')
            ->whereNull('returned_at')
            ->exists();

        if ($isBorrowed) {
            return back()->with(
                'error',
                'Buku sedang dipinjam oleh pengguna lain.'
            );
        }

        $borrowing->update([
            'status' => 'approved',
            'borrowed_at' => now(),

            'approved_by' => auth()->id(),
            'approved_at' => now(),

            'rejected_by' => null,
            'rejected_at' => null,
        ]);

        return back()->with(
            'success',
            'Peminjaman berhasil disetujui.'
        );
    }

    public function reject(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'pending') {
            return back()->with(
                'error',
                'Pengajuan ini sudah diproses.'
            );
        }

        $borrowing->update([
            'status' => 'rejected',

            'rejected_by' => auth()->id(),
            'rejected_at' => now(),

            'approved_by' => null,
            'approved_at' => null,

            'borrowed_at' => null,
        ]);

        return back()->with(
            'success',
            'Pengajuan peminjaman ditolak.'
        );
    }

    public function returnBook(Borrowing $borrowing)
    {
        if (
            $borrowing->status !== 'approved'
            || $borrowing->returned_at !== null
        ) {
            return back()->with(
                'error',
                'Peminjaman ini tidak dapat diproses.'
            );
        }

        $borrowing->update([
            'status' => 'returned',
            'returned_at' => now(),
            'returned_by' => auth()->id(),
        ]);

        return back()->with(
            'success',
            'Buku berhasil dikembalikan.'
        );
    }
}
