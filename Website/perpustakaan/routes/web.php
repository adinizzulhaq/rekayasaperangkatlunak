<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| Dashboard User
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Books
        |--------------------------------------------------------------------------
        */

        Route::get('/books', [AdminBookController::class, 'index'])
            ->name('books.index');

        Route::get('/books/create', [AdminBookController::class, 'create'])
            ->name('books.create');

        Route::post('/books', [AdminBookController::class, 'store'])
            ->name('books.store');

        Route::get('/books/{book}/edit', [AdminBookController::class, 'edit'])
            ->name('books.edit');

        Route::put('/books/{book}', [AdminBookController::class, 'update'])
            ->name('books.update');

        Route::delete('/books/{book}', [AdminBookController::class, 'destroy'])
            ->name('books.destroy');

        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');

        /*
        |--------------------------------------------------------------------------
        | Borrowings
        |--------------------------------------------------------------------------
        */

        Route::get('/borrowings', [BorrowingController::class, 'index'])
            ->name('borrowings.index');

        Route::get('/borrowings/active', [BorrowingController::class, 'active'])
            ->name('borrowings.active');

        Route::post(
            '/borrowings/{borrowing}/approve',
            [BorrowingController::class, 'approve']
        )->name('borrowings.approve');

        Route::post(
            '/borrowings/{borrowing}/reject',
            [BorrowingController::class, 'reject']
        )->name('borrowings.reject');

        Route::post(
            '/borrowings/{borrowing}/return',
            [BorrowingController::class, 'returnBook']
        )->name('borrowings.return');
    });

/*
|--------------------------------------------------------------------------
| User - Daftar Buku
|--------------------------------------------------------------------------
*/

Route::get('/books', [BookController::class, 'index'])
    ->middleware('auth')
    ->name('books.index');

/*
|--------------------------------------------------------------------------
| User - Ajukan Peminjaman
|--------------------------------------------------------------------------
*/

Route::post('/books/{book}/borrow', [BorrowingController::class, 'store'])
    ->middleware('auth')
    ->name('borrowings.store');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
