<?php

namespace App\Http\Requests\Product;

class StoreProductRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:products', 'max:255']
        ];
    }
}
