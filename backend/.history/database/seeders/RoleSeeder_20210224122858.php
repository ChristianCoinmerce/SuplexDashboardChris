<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(){
                $role = Role::create(
                ['name' => "Admin",
                'description' => "Highest Role",]);
                $role->permissions()->attach($roles[array_rand($roles)]);
                Role::create(
                ['name' => "Moderator",
                'description' => "Below Admin",]);
                Role::create(
                ['name' => "Staff",
                'description' => "Posts Control Only",]);
                Role::create(
                ['name' => "User",
                'description' => "Basic",]);
    }
}
