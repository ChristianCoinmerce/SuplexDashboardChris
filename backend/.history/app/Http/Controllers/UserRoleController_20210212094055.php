<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $user = User::find($validated['user_id']);
        $user->roles()->attach([$validated['role_id']]);
        return redirect('/user-role');
    }

    public function show(Request $request)
    {
        $user = User::find($validated['user_id']);
        $roles = Role::get();

        if (auth()->user()) {
            return view('roles.show', ['users' => $users], ['roles' => $roles]);}
        else {
            return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }
}
