<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Series;

class DropdownService
{
    public function seriesList(): array
    {
        return Series::select('id as value', 'name as text')->get()->toArray();
    }
    public function categoryList(): array
    {
        return Category::select('id as value', 'name as text')->get()->toArray();
    }
    public function authorList(): array
    {
        return Author::select('id as value', 'name as text')->get()->toArray();
    }
    public function bookList(): array
    {
        return Book::select('id as value', 'name as text')->get()->toArray();
    }

}
