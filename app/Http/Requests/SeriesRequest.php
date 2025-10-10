<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class SeriesRequest extends FormRequest
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
            'author_id' => ['required'],
            'name' => ['required'],
            'banner_image'   => ['required'],
        ];
    }
    
    /**
     * Summary of fields
     * @return array{ads_type: mixed, name: mixed}
     */
    public function fields(): array
    {
        return [
            'author_id'            => $this->input('author_id'),
            'name'         => $this->input('name'),
            'banner_image'         => $this->input('banner_image'),
            'status'             => $this->input('status', 1)
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
