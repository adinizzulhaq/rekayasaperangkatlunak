<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')
            ->latest()
            ->get();

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:' . date('Y')],
            'isbn' => ['nullable', 'string', 'max:255', 'unique:books,isbn'],
            'description' => ['nullable', 'string'],
            'cover' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')
                ->store('covers', 'public');
        }

        Book::create($validated);

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book)
    {
        $book->load('category');

        return view('admin.books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.books.edit', compact(
            'book',
            'categories'
        ));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['nullable', 'string', 'max:255'],
            'year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:' . date('Y')
            ],
            'isbn' => [
                'nullable',
                'string',
                'max:255',
                'unique:books,isbn,' . $book->id,
            ],
            'description' => ['nullable', 'string'],
            'cover' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
        ]);

        $oldCover = $book->cover;

        if ($request->hasFile('cover')) {

            $newCover = $request->file('cover')
                ->store('covers', 'public');

            $validated['cover'] = $newCover;

            $book->update($validated);

            if ($oldCover && Storage::disk('public')->exists($oldCover)) {
                Storage::disk('public')->delete($oldCover);
            }
        } else {

            $book->update($validated);
        }

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $cover = $book->cover;

        $book->delete();

        if ($cover && Storage::disk('public')->exists($cover)) {
            Storage::disk('public')->delete($cover);
        }

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
