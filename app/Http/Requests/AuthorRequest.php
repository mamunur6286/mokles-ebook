<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required',
            'status'      => 'nullable|in:1,2'
        ];
    }

    public function fields(): array
    {
        return [
            'name'        => $this->input('name'),
            'status'      => $this->input('status', 1),
        ];
    }
}
