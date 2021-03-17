<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    public function run(){
                Permission::create(
                ['name' => "Show CRUD",
                'description' => "Highest Role",]);
                Permission::create(
                ['name' => "Limited CRUD",
                'description' => "Below Admin",]);
                Permission::create(
                ['name' => "Edited",
                'description' => "Posts Control Only",]);
                Permission::create(
                ['name' => "User",
                'description' => "Basic",]);
                Permission::create(
                ['name' => "Limited CRUD",
                'description' => "Below Admin",]);
                Permission::create(
                ['name' => "Edited",
                'description' => "Posts Control Only",]);
                Permission::create(
                ['name' => "User",
                'description' => "Basic",]);
    }
}
