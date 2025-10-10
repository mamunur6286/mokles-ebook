<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'name' => 'Name is required',
        ];
    }
    
    public function rules(): array
    {
        return [
            'book_id'     => 'required|exists:books,id',
            'name'     => 'required',
            'description' => 'nullable|string',
            'status'      => 'nullable|in:1,2'
        ];
    }

    public function fields(): array
    {
        return [
            'book_id'      => $this->input('book_id'),
            'name'      => $this->input('name'),
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
