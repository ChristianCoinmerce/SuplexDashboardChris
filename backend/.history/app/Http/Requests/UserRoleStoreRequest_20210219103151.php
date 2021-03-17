<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required',
            'email' => 'required',
            'password' => Hash::make($data['password']),
            'user_id' => 'required',
            'role_id' => 'required',
        ];
    }
}
