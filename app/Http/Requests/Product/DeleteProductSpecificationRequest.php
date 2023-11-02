<?php

namespace App\Http\Requests\Product;

use Illuminate\Validation\Rule;

class DeleteProductSpecificationRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'specification' => ['required',
                Rule::exists('product_specifications', 'id')
                    ->where('product_id', $this->route('product'))
            ]
        ];
    }
}
