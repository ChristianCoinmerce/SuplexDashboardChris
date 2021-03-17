<?php

namespace App\Providers;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

         // define a admin user role
         Permission::get()->map(function($permission){
            Gate::define($permission->slug, function($user) use ($permission){
               return $user->hasPermissionTo($permission);
            });
         });

         //define a author user role
         Gate::define('isAuthor', function($user) {
             return $user->role == 'author';
         });

         // define a editor role
         Gate::define('isEditor', function($user) {
             return $user->role == 'editor';
         });
    }
}
