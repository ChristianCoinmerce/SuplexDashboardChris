<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Posts class instance will refer to posts table in database
class Role extends Model
{
  protected $guarded = []; //restricts columns from modifying



  protected $fillable = ['name', 'description'];

  public function permissions()
{
    return $this->belongsToMany(
        InstitutionRecord::class,
        'permission_roles',
        'role_id',
        'permission_id'
    );
}
}
