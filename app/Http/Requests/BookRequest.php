<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function messages(): array
    {
        return [
            'author_id' => 'Author is required',
            'category_id' => 'Category is required',
        ];
    }
    
    public function rules(): array
    {

        return [
            'author_id'   => 'required|exists:authors,id',
            'category_id'   => 'required|exists:categories,id',
            'series_id'   => 'required|exists:series,id',
            'name'       => 'required|string|'.Rule::unique('books')->ignore($this->book),
            'book_image'   => 'nullable',
            'description'=> 'nullable|string',
            'status'     => 'nullable|in:1,2'
        ];
    }

    public function fields(): array
    {
        return [
            'slug'   => slug_generator($this->input('name')),
            'author_id'   => $this->input('author_id'),
            'category_id'   => $this->input('category_id'),
            'series_id'   => $this->input('series_id'),
            'name'       => $this->input('name'),
            'book_image'   => $this->input('book_image'),
            'description'=> $this->input('description'),
            'status'     => $this->input('status', 1)
        ];
    }
}
