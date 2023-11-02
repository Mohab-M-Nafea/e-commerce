<?php

namespace App\Http\Requests\Product;

use Illuminate\Validation\Rule;

class DeleteProductImageRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'images' => ['required', 'array', ],
            'images.*' => ['required',
                Rule::exists('product_images', 'id')
                    ->where('product_id', $this->route('product')),
            ]
        ];
    }
}
