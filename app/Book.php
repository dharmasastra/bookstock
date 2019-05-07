<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'book_name', 
        'book_cover',
        'author', 
        'isbn_no', 
        'format', 
        'publication_date',
        'language',
        'publisher', 
        'book_price',
        'stock',
        'category_id',
        'user_id'
    ];

    public function categories() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function user() {
        return $this->belongsTO('App\User', 'user_id');
    }
} 
