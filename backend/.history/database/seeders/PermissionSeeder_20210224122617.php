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
                    ['name' => "Create",
                    'description' => "Create User CRUD",]);

                    Permission::create(
                    ['name' => "Read",
                    'description' => "Show User CRUD",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "Edit User CRUD",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "Delete User CRUD",]);

                    //ROLES CRUD
                    Permission::create(
                    ['name' => "Create",
                    'description' => "Create Role CRUD",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "Show Role CRUD",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "Edit Role CRUD",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "Delete Role CRUD",]);

                    //POSTS CRUD
                    Permission::create(
                    ['name' => "Read",
                    'description' => "Show Post CRUD",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "Edit Post CRUD",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "Delete Post CRUD",]);

                    //COMMENTS CRUD
                    Permission::create(
                    ['name' => "Read",
                    'description' => "Show Comment CRUD",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "Edit Comment CRUD",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "Delete Comment CRUD",]);


                //HOMEPAGE
                Permission::create(
                ['name' => "User Homepage",
                'description' => "Show Homepage",]);

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
