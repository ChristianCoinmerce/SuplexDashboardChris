<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(){
                Role::create(
                ['name' => "Admin",
                'description' => "Highest Role",]);
                Role::create(
                ['name' => "Moderator",
                'description' => "Below Admin",])
                Role::create(
                ['name' => "Staff",
                'description' => "Posts Control Only",]);
                ['name' => "User",
                'description' => "Basic",]);
    }
}
