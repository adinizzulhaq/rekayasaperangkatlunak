<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $currentBorrowings = Borrowing::with('book')
            ->where('user_id', $user->id)
            ->where('status', 'approved')
            ->whereNull('returned_at')
            ->latest()
            ->get();

        $historyBorrowings = Borrowing::with('book')
            ->where('user_id', $user->id)
            ->where(function ($query) {
                $query->where('status', 'returned')
                    ->orWhere('status', 'rejected');
            })
            ->latest()
            ->get();

        $pendingBorrowings = Borrowing::with('book')
            ->where('user_id', $user->id)
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('user.dashboard', compact(
            'currentBorrowings',
            'historyBorrowings',
            'pendingBorrowings'
        ));
    }
}
