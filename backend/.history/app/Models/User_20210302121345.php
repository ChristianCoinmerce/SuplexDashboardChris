<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Authenticatable implements AuthenticatableContract, CanResetPasswordContract
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function posts()
    {return $this->hasMany('App\Models\Posts', 'author_id');}

    public function comments()
    {return $this->hasMany('App\Models\Comments', 'from_user');}

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function can_post()
    {
        return true;
    }
    public function is_admin()
    {
        return false;
    }

    public function hasPermission($permissions_id) : boolean {
        $userWithRolesAndPermissions = $this->with('roles.permission')->first();

        foreach($userWithRolesAndPermissions->roles AS $role){
            if($role->permission->contains('id', $permissions_id)){
                return true;
            }
        }

        return false;
    }

}
//------------------------------------------------------------------------

//     public function hasRole(... $roles ) {
//         foreach ($roles as $role) {
//             if ($this->roles->contains($role)) {
//                 return true;
//             }
//         }
//         return false;
//     }

