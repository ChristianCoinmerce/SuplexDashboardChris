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
            'name' => 'required',
            'email' => 'required',
            Hash::make($request->newPassword),
            'user_id' => 'required',
            'role_id' => 'required',
        ];
    }
}
