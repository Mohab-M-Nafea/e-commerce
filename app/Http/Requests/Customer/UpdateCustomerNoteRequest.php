<?php

namespace App\Http\Requests\Customer;

class UpdateCustomerNoteRequest extends CustomerRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'note' => ['nullable', 'string']
        ];
    }
}
