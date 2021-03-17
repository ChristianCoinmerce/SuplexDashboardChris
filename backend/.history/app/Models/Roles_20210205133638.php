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
    return $this->hasMany('App\Models\User', 'user_id');
  }

  // returns the instance of the user who is author of that post
  public function author()
  {
    return $this->belongsTo('App\Models\User', 'author_id');
  }

  protected $fillable = ['name', 'description'];
}
