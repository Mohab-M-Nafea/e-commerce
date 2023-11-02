<?php

namespace App\Http\Requests\Collection;

class StoreCollectionImageRequest extends CollectionRequest
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
