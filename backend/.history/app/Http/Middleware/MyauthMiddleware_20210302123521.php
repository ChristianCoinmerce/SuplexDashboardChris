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
        if(auth()->user()->hasPermission($permission_id) == true){
            return redirect('/home');
        }

    }
}
