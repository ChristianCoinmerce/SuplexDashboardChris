<?php

namespace App\Http\Controllers\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    public function create(Request $request)
    {
        return view('adminpage/access/roles', ['roles' => Role::get()], ['permissions' => Permission::get()]);
    }

    public function store(RoleStoreRequest $request)
    {
        $validated = $request->validated();
        $role = Role::create($validated);
        $permissions = $validated['permission_id'];
        $role->permission()->attach($permissions);
        return redirect('adminpage/roles');
    }

    public function update(RoleStoreRequest $request){
        $validated = $request->validated();
        $permissions = $validated['permission_id'];
        $role = Role::find($validated['role_id']);
        $role->update($validated);
        $role->permission()->sync($permissions);
        return redirect('adminpage/roles');
    }

    public function destroy(Request $request, $id){
        $role = Role::find($id);
        $role->delete();
        return redirect('adminpage/roles');
    }
}
