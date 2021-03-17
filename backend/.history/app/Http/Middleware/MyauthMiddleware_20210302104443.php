<?php

namespace App\Http\Middleware;
use App\Http\Middleware\Auth;
use Closure;
use Illuminate\Http\Request;

class MyauthMiddleware
{

    public function handle($request, Closure $next,$permission_id)
    {
        if (Auth::user()) {
            $roles = Role::where('user_id',Auth::user()->id)->get();
            foreach($roles as $role){
                if($role->permision->id == $permission_id){
                    return $next($request);
                }
            }
        }
        return redirect('/');
    }
}
