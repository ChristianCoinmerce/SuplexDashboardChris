<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(){
            $user = Role::create(
                ['name' => "Admin",
                'description' => "Highest Role",],
                ['name' => "Moderator",
                'description' => "Below Admin",],
                ['name' => "Staff",
                'description' => "Posts Control Only",],
                ['name' => "User",
                'description' => "Basic",]);
    }
}
