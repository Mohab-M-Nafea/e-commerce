<?php

namespace App\Http\Requests\Product;

class UpdateProductCollectionsRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'collections.*' => ['exists:collections,id']
        ];
    }
}
