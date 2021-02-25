<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permissions;

class PermissionController extends Controller
{

    // public function create(Request $request)
    // {
    //     if (auth()->user()) {
    //         return view('roles.create');}
    //     else {
    //         return redirect('/')->withErrors('You have not sufficient permissions for writing post');
    //     }
    // }

    // public function store(RoleStoreRequest $request)
    // {
    //     $validated = $request->validated();
    //     Role::create($validated);
    //     return redirect('/user-role');
    // }

}
