<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['borrowings' => function ($query) {
            $query->where('status', 'approved')
                ->whereNull('returned_at');
        }])->get();

        return view('books.index', compact('books'));
    }
}
