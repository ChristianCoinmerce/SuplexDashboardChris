<?php

namespace App\Http\Middleware;
use App\Models\Role;
use App\Http\Middleware\Authenticate;
use Closure;
use Illuminate\Http\Request;

class MyauthMiddleware
{

    public function handle($request, Closure $next,$permission_id)
    {
        if (auth()->user()) {
            $roles = RoleUser::where('user_id',Auth::user()->id)->get();
        foreach($roles as $role_user){
            if($role_user->role->permision->id == $permission_id){
                return $next($request);
            }
            }
        }
        return redirect('/');
    }
}
