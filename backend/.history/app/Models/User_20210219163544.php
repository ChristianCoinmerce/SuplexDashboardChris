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
        return $this->belongsToMany(Role::class);
    }

    public function users(){}


    public function givePermissionsTo(... $permissions) {

        $permissions = $this->getAllPermissions($permissions);
        dd($permissions);
        if($permissions === null) {
          return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
      }

    public function withdrawPermissionsTo( ... $permissions ) {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions( ... $permissions ) {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
            return true;
        }
    }
    return false;
    }

    public function hasRole( ... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
            return true;
        }
    }
    return false;
    }

    public function roles() {
        return $this->belongsToMany(Role::class,'users_roles');

    }
    public function permissions() {
        return $this->belongsToMany(Permission::class,'users_permissions');

    }
    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    protected function getAllPermissions(array $permissions) {
        return Permission::whereIn('slug',$permissions)->get();
    }
}
