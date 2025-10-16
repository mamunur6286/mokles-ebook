<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class LessonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function messages(): array
    {
        return [
            'book_id' => 'Book is required',
            'name:required' => 'Name is required',
            'name:unique' => 'Name must be unique',
        ];
    }
    
    public function rules(): array
    {
        return [
            'book_id'     => 'required|exists:books,id',
            'name'       => 'required|'.Rule::unique('lessons')->where('book_id', $this->input('book_id'))->ignore($this->lesson),
            'description' => 'nullable|string',
            'status'      => 'nullable|in:1,2'
        ];
    }

    public function fields(): array
    {
        return [
            'book_id'      => $this->input('book_id'),
            'name'      => $this->input('name'),
            'slug'      => slug_generator($this->input('name')),
            'sort_order'      => $this->input('sort_order'),
            'description'      => $this->input('description'),
            'status'       => $this->input('status', 1),
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors'  => $validator->errors(),
            ], 422)
        );
    }
}
