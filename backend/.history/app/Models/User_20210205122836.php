<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Authenticatable implements AuthenticatableContract, CanResetPasswordContract
{
  //    @var string
  protected $table = 'users';
  //    @var array
  protected $fillable = ['name', 'email', 'password'];
    //    @var array
  protected $hidden = ['password', 'remember_token'];
  // user has many posts
  public function posts()
  {
    return $this->hasMany('App\Models\Posts', 'author_id');
  }
  // user has many comments
  public function comments()
  {
    return $this->hasMany('App\Models\Comments', 'from_user');
  }

  public function can_post()
  {
    true
  }

  public function is_admin()
  {
    $role = $this->role;
    if ($role == 'admin') {
      return true;
    }
    return false;
  }
}
