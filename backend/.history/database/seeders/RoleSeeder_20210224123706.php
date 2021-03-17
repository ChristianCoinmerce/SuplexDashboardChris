<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(){
                $perm = [1,2];
                $role = Role::create(
                ['name' => "Admin",
                'description' => "Highest Role",]);
                $role->permission()->attach($perm);

                $perm = [1,2];
                $role = Role::create(
                ['name' => "Moderator",
                'description' => "Below Admin",]);
                $role->permission()->attach($perm);

                $perm = [1,2];
                $role = Role::create(
                ['name' => "Staff",
                'description' => "Posts Control Only",]);
                $role->permission()->attach($perm);

                $perm = [1,2,3,4,5,6,7,8,9];
                $role = Role::create(
                ['name' => "User",
                'description' => "Basic",]);
                $role->permission()->attach($perm);
    }
}
