<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRoleStoreRequest;
use App\Models\Role;
use App\Models\User;

class UserRoleController extends Controller
{
    public function index()
    {
        $users = User::get();
        $roles = Role::get();
        return view('roles.connect', ['users' => $users], ['roles' => $roles]);
    }

    public function create(Request $request)
    {
        return view('roles.connect');
    }

public function store(UserRoleStoreRequest $request)
{
    $validated = $request->validated();

    $roles_ar = $validated['role_id'];
    $roles="";
    foreach($roles_ar as $key => $role){
        if (isset($role)){
        $roles.= $key . $role . ',';
        };}
        // dd($roles);
    $user = User::find($validated['user_id']);
    $user->roles()->sync($roles_ar);
    return redirect('/user-role');
}

    public function show(Request $request)
    {
        $users = User::get();

        if (auth()->user()) {
            return view('roles.show', ['users' => $users]);}
        else {
            return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }
}
