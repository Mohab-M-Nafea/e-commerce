<?php

namespace App\Http\Requests\Product;

class StoreProductImageRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048',
            ]
        ];
    }
}
