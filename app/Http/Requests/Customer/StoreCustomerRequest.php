<?php

namespace App\Http\Requests\Customer;

use Illuminate\Validation\Rules\Password;

class StoreCustomerRequest extends CustomerRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:6', 'max:64'],
            'email' => ['required', 'unique:customers', 'email'],
            'password' => ['required', 'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols()
                    ->numbers()
                    ->uncompromised()
            ],
        ];
    }
}
