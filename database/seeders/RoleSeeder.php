<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(){
                $perm1 = range(1,27);
                $role = Role::create(
                ['name' => "Admin",
                'description' => "Highest Role",]);
                $role->permission()->attach($perm1);

                $perm2 = [1,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27];
                $role = Role::create(
                ['name' => "Moderator",
                'description' => "Below Admin",]);
                $role->permission()->attach($perm2);

                $perm3 = [1,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27];
                $role = Role::create(
                ['name' => "Staff",
                'description' => "Posts Control Only",]);
                $role->permission()->attach($perm3);

                $perm4 = range(16,27);
                $role = Role::create(
                ['name' => "User",
                'description' => "Basic",]);
                $role->permission()->attach($perm4);
    }
}
