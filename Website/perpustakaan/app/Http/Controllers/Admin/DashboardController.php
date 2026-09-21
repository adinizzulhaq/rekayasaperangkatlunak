<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();

        $activeBorrowings = Borrowing::where('status', 'approved')
            ->whereNull('returned_at')
            ->count();

        $pendingBorrowings = Borrowing::where('status', 'pending')
            ->count();

        $returnedBorrowings = Borrowing::where('status', 'returned')
            ->count();

        $latestPending = Borrowing::with(['user', 'book'])
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        $activeBorrowingList = Borrowing::with([
            'user',
            'book',
            'approvedBy'
        ])
            ->where('status', 'approved')
            ->whereNull('returned_at')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBooks',
            'activeBorrowings',
            'pendingBorrowings',
            'returnedBorrowings',
            'latestPending',
            'activeBorrowingList'
        ));
    }
}
