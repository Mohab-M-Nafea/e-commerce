<?php

namespace App\Http\Requests\Product;

class UpdateProductSpecificationRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'specification' => ['required', 'string']
        ];
    }
}
