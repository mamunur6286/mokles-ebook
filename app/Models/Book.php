<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
     protected $fillable = [
        'author_id',
        'category_id',
        'series_id',
        'book_image',
        'description',
        'status',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo( Author::class, 'author_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo( Category::class, 'category_id');
    }
    public function series(): BelongsTo
    {
        return $this->belongsTo( Series::class, 'series_id');
    }
}
