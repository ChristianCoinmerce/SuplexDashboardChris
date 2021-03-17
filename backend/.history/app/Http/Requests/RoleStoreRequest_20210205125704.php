<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormStoreRequest extends FormRequest
{

    //   @return bool

    public function authorize()
    {
        return true;
    }

    // @return array

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
        ];
    }
}
