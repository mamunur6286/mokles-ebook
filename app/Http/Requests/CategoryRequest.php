<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function messages(): array
    {
        return [
            'name' => 'Name is required',
        ];
    }
    
    public function rules(): array
    {
        return [
            'name'       => 'required|string|'.Rule::unique('categories')->ignore($this->category),
            'status'      => 'nullable|in:1,2', // 1=Active, 2=Inactive
        ];
    }

    public function fields(): array
    {
        return [
            'name'        => $this->input('name'),
            'slug'        => slug_generator($this->input('name')),
            'status'      => $this->input('status', 1),
        ];
    }
}
