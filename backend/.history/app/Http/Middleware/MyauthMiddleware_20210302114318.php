<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Authenticate;
use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class MyauthMiddleware
{

    public function handle($request, Closure $next,$permission_id)
    {
        dd(auth()->user()->rolesWithPermissions;
        if (auth()->user()) {
            // dd(Role());
            $roles = auth()->user()->Role()->permission()->find(auth()->user()->id());
            // $roles = Role::where('user_id',auth()->user()->id)->get();
            foreach($roles as $role){
                if($role->permision->id == $permission_id){
                    return $next($request);
                }
            }
        }
        return redirect('/');
    }
}
