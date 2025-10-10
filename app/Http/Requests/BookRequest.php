<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'       => 'required|string|max:255',
            'banner_image'   => 'required',
            'description'=> 'nullable|string',
            'status'     => 'nullable|in:1,2'
        ];
    }

    public function fields(): array
    {
        return [
            'author_id'   => $this->input('author_id'),
            'category_id'   => $this->input('category_id'),
            'series_id'   => $this->input('series_id'),
            'name'       => $this->input('name'),
            'banner_image'   => $this->input('banner_image'),
            'description'=> $this->input('description'),
            'status'     => $this->input('status', 1)
        ];
    }
}
