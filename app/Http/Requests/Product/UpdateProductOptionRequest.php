<?php

namespace App\Http\Requests\Product;

class UpdateProductOptionRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['exists:product_options'],
            'type' => ['required', 'in:text,color'],
            'option' => ['required', 'string', 'max:120']
        ];
    }
}
