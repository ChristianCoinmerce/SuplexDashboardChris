<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    public function run(){

                //ADMIN PANEL DASHBOARD
                Permission::create(
                ['name' => "AdminPanel",
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
                'description' => "Show Homepage",
                'keyword' => "homepage",]);

                    //POSTS
                    Permission::create(
                    ['name' => "Create",
                    'description' => "create_post",
                    'keyword' => "posts_user",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_post",
                    'keyword' => "posts_user",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_post",
                    'keyword' => "posts_user",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_post",
                    'keyword' => "posts_user",]);

                    //COMMENTS
                    Permission::create(
                    ['name' => "Create",
                    'description' => "create_comment",
                    'keyword' => "comments_user",]);
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_comment",
                    'keyword' => "comments_user",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_comment",
                    'keyword' => "comments_user",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_comment",
                    'keyword' => "comments_user",]);

                    //PROFILE USER
                    Permission::create(
                    ['name' => "Read",
                    'description' => "read_account",
                    'keyword' => "profile_user",]);
                    Permission::create(
                    ['name' => "Update",
                    'description' => "update_account",
                    'keyword' => "profile_user",]);
                    Permission::create(
                    ['name' => "Delete",
                    'description' => "delete_account",
                    'keyword' => "profile_user",]);
    }
}
