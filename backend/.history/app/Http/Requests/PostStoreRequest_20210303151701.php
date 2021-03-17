<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'role_id' => '',
            'permission_id' => '',
        ];
    }
}
