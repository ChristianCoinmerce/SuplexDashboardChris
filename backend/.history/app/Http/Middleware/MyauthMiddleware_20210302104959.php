<?php

namespace App\Http\Middleware;
use App\Model\Role;
use App\Http\Middleware\Authenticate;
use Closure;
use Illuminate\Http\Request;

class MyauthMiddleware
{

    public function handle($request, Closure $next,$permission_id)
    {
        if (auth()->user()) {
            $roles = Role::where('user_id',auth()->user()->id)->get();
            foreach($roles as $role){
                if($role->permision->id == $permission_id){
                    return $next($request);
                }
            }
        }
        return redirect('/');
    }
}
