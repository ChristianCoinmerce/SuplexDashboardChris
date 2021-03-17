<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
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
            'permission_id' => 'required',
        ];
    }
}
