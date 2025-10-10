<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'book_id',
        'name',
        'email',
        'comment'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
