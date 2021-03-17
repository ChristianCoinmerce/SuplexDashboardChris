<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Posts class instance will refer to posts table in database
class Role extends Model
{
  protected $guarded = []; //restricts columns from modifying

  public function users()
  {
    return $this->belongsToMany(User::class, 'user_role');
  }
  protected $fillable = ['name', 'description'];

  public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
