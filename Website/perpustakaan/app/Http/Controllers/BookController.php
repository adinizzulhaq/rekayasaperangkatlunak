<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $books = Book::with(['category', 'borrowings'])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%');
                });
            })
            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->latest()
            ->get();

        $categories = Category::orderBy('name')->get();

        return view('books.index', compact(
            'books',
            'categories',
            'search',
            'category'
        ));
    }

    public function show(Book $book)
    {
        $book->load([
            'category',
            'borrowings',
        ]);

        return view('books.show', compact('book'));
    }
}
