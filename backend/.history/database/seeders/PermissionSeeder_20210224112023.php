<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    public function run(){
                Permission::create(
                ['name' => "Admin",
                'description' => "Highest Role",]);
                Permission::create(
                ['name' => "Moderator",
                'description' => "Below Admin",]);
                Permission::create(
                ['name' => "Staff",
                'description' => "Posts Control Only",]);
                Role::create(
                ['name' => "User",
                'description' => "Basic",]);
    }
}
