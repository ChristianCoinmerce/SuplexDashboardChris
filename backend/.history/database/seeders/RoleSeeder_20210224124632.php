<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(){

                $perm = range(1,20);
                $role = Role::create(
                ['name' => "User",
                'description' => "Basic",]);
                $role->permission()->attach($perm);
    }
}
