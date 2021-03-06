<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = []; //restricts columns from modifying
    // protected $table = 'permission';

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_permission');
    }
}
