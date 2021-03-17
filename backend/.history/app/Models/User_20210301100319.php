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

    public function posts()
  {
    return $this->hasMany('App\Posts', 'author_id');
  }

  // user has many comments
  public function comments()
  {
    return $this->hasMany('App\Comments', 'from_user');
  }

  public function can_post()
  {
    $role = $this->role;
    if ($role == 'author' || $role == 'admin') {
      return true;
    }
    return false;
  }

  public function is_admin()
  {
    $role = $this->role;
    if ($role == 'admin') {
      return true;
    }
    return false;
  }

//------------------------------------------------------------------------

    public function hasRole(... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
}
