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
                'description' => "Dashboard Admin Panel",
                'keyword' => "dashboard",]);

                    //USERS CRUD
                    Permission::create(
                    ['name' => "Create",
                    'description' => "create_user_crud",
                    'keyword' => "user_crud",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_user_crud",
                    'keyword' => "user_crud",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_user_crud",
                    'keyword' => "user_crud",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_user_crud",
                    'keyword' => "user_crud",]);

                    //ROLES CRUD
                    Permission::create(
                    ['name' => "Create",
                    'description' => "create_role_crud",
                    'keyword' => "roles_crud",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_role_crud",
                    'keyword' => "roles_crud",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_role_crud",
                    'keyword' => "roles_crud",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_role_crud",
                    'keyword' => "roles_crud",]);

                    //POSTS CRUD
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_post_crud",
                    'keyword' => "posts_crud",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_post_crud",
                    'keyword' => "posts_crud",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_post_crud",
                    'keyword' => "posts_crud",]);

                    //COMMENTS CRUD
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_comment_crud",
                    'keyword' => "comments_crud",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_comment_crud",
                    'keyword' => "comments_crud",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_comment_crud",
                    'keyword' => "comments_crud",]);


                //HOMEPAGE
                Permission::create(
                ['name' => "User Homepage",
                'description' => "Show Homepage",]);

                    //POSTS
                    Permission::create(
                    ['name' => "Create",
                    'description' => "create_post",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_post",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_post",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_post",]);

                    //COMMENTS
                    Permission::create(
                    ['name' => "Create",
                    'description' => "create_comment",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_comment",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_comment",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_comment",]);

                    //PROFILE USER
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_account",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_account",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_account",]);
    }
}
