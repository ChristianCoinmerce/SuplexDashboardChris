<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            // 'logo' => 'mimes:jpeg,png,bmp',
            // 'banner' => 'mimes:jpeg,png,bmg',
            'port' => 'string|max:50',
            'lat' => 'string|max:15',
            'long' => 'string|max:15',
            'ranking' => 'required|string|max:50',
            'street' => 'required|string|max:50',
            'house_number' => 'required|string|max:20',
            'zipcode' => 'required|string|max:50',
            'city' => 'required|string|max:40',
            'state' => 'required|string|max:40',
            'country' => 'required|string|max:50',
            'phone_countrycode' => 'required|string|max:5',
            'phone_number' => 'required|string|max:30',
            'email' => 'required|string|max:30',
            'website' => 'string|max:50',
            'payment_method' => 'required|string|max:50',
            'iban_name' => 'string|max:50',
            'iban_number' => 'string|max:50',
            'bic_swift' => 'string|max:50',
            'contact_name' => 'string|max:50',
            'category' => 'required|string|max:50',
            'subcategory' => 'required|string|max:50',
            'language' => 'required|string|max:50',
            'opening_days' => 'min:1',
            'total_hours' => 'max:24',
        ];
    }
}
