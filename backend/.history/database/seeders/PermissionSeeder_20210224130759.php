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
                'description' => "dashboard",]);

                    //USERS CRUD
                    Permission::create(
                    ['name' => "Create",
                    'description' => "create_user_crud",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "show_user_crud",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_user_crud",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_user_crud",]);

                    //ROLES CRUD
                    Permission::create(
                    ['name' => "Create",
                    'description' => "create_role_crud",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "show_role_crud",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_role_crud",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_role_crud",]);

                    //POSTS CRUD
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_post_crud",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_post_crud",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_post_crud",]);

                    //COMMENTS CRUD
                    Permission::create(
                    ['name' => "Read",
                    'description' => "show_comment_crud",]);
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
