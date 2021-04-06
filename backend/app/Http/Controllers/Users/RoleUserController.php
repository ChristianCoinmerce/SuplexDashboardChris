<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRoleStoreRequest;

class RoleUserController extends Controller {

    public function index(Request $request){
        $user = User::paginate($request->get('per_page'));
        return view('adminpage/access/users', ['users' => $user], ['roles' => Role::get()]);
    }

    public function store_userrole(UserRoleStoreRequest $request){
        $validated = $request->validated();
        $roles = $validated['role_id'];
        $user = User::find($validated['user_id']);
        $user->update(["name" => $validated["name"],"email" => $validated["email"]]);
        if($validated["password"] != null) {
            $password = Hash::make($validated["password"]);
            $array = collect($request->validated())->forget(['password'])->put('password',$password)->all();
            $user->update($array);
        }
        $user->roles()->sync($roles);
        return redirect('dashboard/users');
    }

    public function store_user(UserRoleStoreRequest $request){
        $validated = $request->validated();
        $password = Hash::make($validated["password"]);
        $array = collect($request->validated())->forget(['password'])->put('password',$password)->all();
        $user = User::create($array);
        $roles = $validated['role_id'];
        $user->roles()->attach($roles);
        return redirect('dashboard/users');
    }

    public function destroy(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
  }
