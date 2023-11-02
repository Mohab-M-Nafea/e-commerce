<?php

namespace App\Http\Requests\Collection;

class UpdateCollectionInfoRequest extends CollectionRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'unique:collections,title,' . $this->route('collection'),
                'max:255'
            ],
            'url' => [
                'required',
                'unique:collections,url,' . $this->route('collection'),
                'max:255'
            ],
            'description' => ['max:255']
        ];
    }
}
