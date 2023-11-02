<?php

namespace App\Http\Requests\Collection;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class CollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ], Response::HTTP_BAD_REQUEST));
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.unique' => 'Title is already exist',
            'title.max' => 'Title is too long',
            'url.required' => 'URL is required',
            'url.unique' => 'URL is already exist',
            'url.max' => 'URL is too long',
            'description.max' => 'Description is too long',
            'status.in' => 'Unknown status',
            'image.image' => 'Uploaded file is not an image',
            'image.mimes' => 'Only accept JPG,JPEG,PNG image types',
            'image.max' => 'Image size larger than 2MB'
        ];
    }
}
