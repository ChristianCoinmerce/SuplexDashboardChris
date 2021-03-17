<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Posts class instance will refer to posts table in database
class Roles extends Model
{
  //restricts columns from modifying
  protected $guarded = [];

  // posts has many comments
  // returns all comments on that post
  public function user()
  {
    return $this->belongsToMany(RoleController:class);
  }

  // returns the instance of the user who is author of that post
//   public function roles()
//   {
//     return $this->belongsTo('App\Models\User', 'roles_id');
//   }

  protected $fillable = ['name', 'description'];
}
