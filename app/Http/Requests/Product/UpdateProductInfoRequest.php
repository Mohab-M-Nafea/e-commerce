<?php

namespace App\Http\Requests\Product;

class UpdateProductInfoRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'unique:products,name,' . $this->route('product'),
                'max:255'
            ],
            'price' => [
                'required',
                'numeric',
                'min:0'
            ],
            'excerpt' => ['max:255'],
            'stock' => [
                'required',
                'integer',
                'min:0'
            ]
        ];
    }
}
