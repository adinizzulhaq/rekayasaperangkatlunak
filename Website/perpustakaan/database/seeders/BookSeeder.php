<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Laravel Dasar',
            'author' => 'Andi',
            'publisher' => 'Informatika',
            'year' => 2025,
            'isbn' => '978000000001',
            'description' => 'Buku dasar untuk mempelajari Laravel.',
        ]);

        Book::create([
            'title' => 'Pemrograman PHP',
            'author' => 'Budi',
            'publisher' => 'Elex Media',
            'year' => 2024,
            'isbn' => '978000000002',
            'description' => 'Buku untuk mempelajari pemrograman PHP.',
        ]);

        Book::create([
            'title' => 'Belajar MySQL',
            'author' => 'Citra',
            'publisher' => 'Gramedia',
            'year' => 2023,
            'isbn' => '978000000003',
            'description' => 'Buku dasar untuk mempelajari database MySQL.',
        ]);
    }
}
