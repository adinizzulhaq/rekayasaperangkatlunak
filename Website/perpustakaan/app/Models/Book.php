<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Borrowing;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'isbn',
        'description',
        'cover',
        'category_id',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
