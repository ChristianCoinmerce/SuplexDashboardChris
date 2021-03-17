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
                    ['name' => "Create",
                    'description' => "Create Post",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "Show Post",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "Edit Post",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "Delete Post",]);

                    //COMMENTS
                    Permission::create(
                    ['name' => "Create",
                    'description' => "Create Comment",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "Show Comment",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "Edit Comment",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "Delete Comment",]);

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
