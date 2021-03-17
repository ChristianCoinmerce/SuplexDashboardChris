<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Posts class instance will refer to posts table in database
class Dashboard extends Model
{
  protected $guarded = []; //restricts columns from modifying



  protected $fillable = ['name', 'description'];

  public function permission()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
