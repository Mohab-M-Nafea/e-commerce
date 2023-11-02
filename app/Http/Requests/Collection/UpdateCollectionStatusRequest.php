<?php

namespace App\Http\Requests\Collection;

class UpdateCollectionStatusRequest extends CollectionRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['in:Publish,Unavailable']
        ];
    }
}
