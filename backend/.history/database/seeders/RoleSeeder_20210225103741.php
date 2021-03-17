<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(){
                $perm1 = [1,27];
                $role = Role::create(
                ['name' => "Admin",
                'description' => "Highest Role",]);
                $role->permission()->attach($perm1);

    }
}
