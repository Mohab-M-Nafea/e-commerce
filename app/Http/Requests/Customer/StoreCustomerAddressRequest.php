<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'country' => ['required'],
            'company' => ['nullable'],
            'address' => ['required', 'min:16'],
            'city' => ['required'],
            'state' => ['nullable'],
            'postal_code' => ['nullable']
        ];
    }
}
