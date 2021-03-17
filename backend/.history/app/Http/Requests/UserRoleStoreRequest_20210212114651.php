<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRoleStoreRequest extends FormRequest
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
            'user_id' => 'required',
            'role_id' => 'required|unique:role_user(role_id)',
        ];
    }
}
