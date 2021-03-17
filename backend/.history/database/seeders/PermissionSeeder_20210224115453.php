<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    public function run(){
                Permission::create(
                ['name' => "Admin Panel",
                'description' => "Highest Role",]);



                Permission::create(
                ['name' => "Edit Users/Roles CRUD",
                'description' => "Below Admin",]);
                Permission::create(
                ['name' => "Edit Posts CRUD",
                'description' => "Posts Control Only",]);
                Permission::create(
                ['name' => "User",
                'description' => "Add Posts/Comments",]);
                Permission::create(
                ['name' => "Limited CRUD",
                'description' => "Below Admin",]);



                Permission::create(
                ['name' => "Edit Users/Roles CRUD",
                'description' => "Below Admin",]);
                Permission::create(
                ['name' => "Edit Posts CRUD",
                'description' => "Posts Control Only",]);
                Permission::create(
                ['name' => "User",
                'description' => "Add Posts/Comments",]);
                Permission::create(
                ['name' => "Limited CRUD",
                'description' => "Below Admin",]);
    }
}
