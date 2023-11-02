<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ProductRequest extends FormRequest
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
            'name.required' => 'Name is required',
            'name.unique' => 'Name is already exist',
            'name.max' => 'Name is too long',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a numeric',
            'price.min' => 'Price cannot be negative',
            'excerpt.max' => 'Excerpt is too long',
            'stock.required' => 'Stock is required',
            'stock.integer' => 'Stock must be an integer',
            'stock.min' => 'Stock cannot be negative',
            'status.required' => 'Status is required',
            'status.in' => 'Unknown status',
            'image.image' => 'Uploaded file is not an image',
            'image.mimes' => 'Only accept JPG,JPEG,PNG image types',
            'image.max' => 'Image size larger than 2MB',
            'images.*.required' => 'Must have at least one image to delete',
            'images.*.exist' => "Image doesn't exist in this product",
            'option.required' => 'Option is required',
            'option.exist' => "Option doesn't exist in this product",
            'option.string' => "Option must be a string type",
            'option.max' => "Option is too long",
            'type.required' =>'Type is required',
            'type.in' => 'Unknown type',
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string type',
            'title.max' => 'Title is too long',
            'specification.required' => 'Specification is required',
            'specification.exist' => "Specification doesn't exist in this product",
            'specification.string' => 'Specification must be a string type',
            'collections.*.exist' => "Collection doesn't exist",
        ];
    }
}
