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
        $user = User::find($validated['user_id']);
        $user->roles()->attach([$validated['role_id']]);
        return redirect('/user-role');
    }

    public function show(Request $request)
    {
        $users = User::get();
        $roles = Auth::user()->roles->first()->name;

        if (auth()->user()) {
            return view('roles.show', ['users' => $users], $roles);}
        else {
            return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }
}
