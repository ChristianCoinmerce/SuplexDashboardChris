<?php

namespace App\Providers;

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
         Gate::define('dashboard', function($role) {
            return $role->permission == 'admin';
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
