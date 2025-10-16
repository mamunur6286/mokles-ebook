<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Book extends Model
{
     protected $fillable = [
        'author_id',
        'category_id',
        'series_id',
        'book_image',
        'name',
        'slug',
        'meta_data',
        'description',
        'status',
    ];

    protected $casts = [
        'meta_data' => 'array',
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
    public function lessons(): HasMany
    {
        return $this->hasMany( Lesson::class, 'book_id')->orderBy('sort_order', 'asc');
    }
}
