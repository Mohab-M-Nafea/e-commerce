<?php

namespace App\Http\Requests\Collection;

class StoreCollectionRequest extends CollectionRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'unique:collections', 'max:255'],
            'description' => ['max:255']
        ];
    }
}
