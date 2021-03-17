<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    public function run(){

                //ADMIN PANEL DASHBOARD
                Permission::create(
                ['name' => "Admin Panel",
                'description' => "Highest Role",]);

                    //USERS CRUD
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

                    //ROLES CRUD
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

                    //POSTS CRUD
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


                //HOMEPAGE
                Permission::create(
                ['name' => "User Homepage",
                'description' => "Below Admin",]);

                    //POSTS
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

                    //COMMENTS
                    Permission::create(
                    ['name' => "Create",
                    'description' => "Below Admin",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "Posts Control Only",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "Add Posts/Comments",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "Below Admin",]);

                    //PROFILE USER
                    Permission::create(
                    ['name' => "Read",
                    'description' => "Show Account Info",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "Edit Account Info",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "Delete Account",]);
    }
}
