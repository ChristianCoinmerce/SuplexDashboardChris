<?php

namespace App\Http\Middleware;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Closure;
use Illuminate\Http\Request;

class MyauthMiddleware
{

    public function handle($request, Closure $next,$permission_id)
    {
        if (Auth::user()) { // if user is logined
            // Do what you want from your tables.
            // Here is the most important part you should use.
            //I wrote sample bellow:
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
