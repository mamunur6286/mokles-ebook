<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
        protected $fillable = [
            'book_id',
            'name',
            'description',
            'sort_order',
            'status',
            'created_by',
            'updated_by',
        ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
