<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
     protected $fillable = [
        'author_id',
        'category_id',
        'name',
        'slug',
        'banner_image',
        'status'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function books()
    {
        return $this->hasMany(Book::class, 'series_id');
    }
}
