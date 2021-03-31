<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Models;


Auth::routes();
Route::get('auth/logout', [UserController::class, 'logout']);

Route::get('/', [DashboardController::class, 'core'])->name('dashboard.core');


Route::middleware('auth:sanctum')->group(function () {


    Route::get('/home', [DashboardController::class, 'welcome'])->where('any', '.*');



    // --------------------------------------------------------------------------------------


    Route::group(['middleware' => ['auth', 'myauthcheck:1']], function () {
        Route::get('/dashboard', [DashboardController::class, 'pop'])->name('dashboard.pop');
        Route::get('/dashboard/ether', [DashboardController::class, 'index'])->name('dashboard.index');

        //USERS CRUD
        Route::group(['middleware' => 'myauthcheck:3'], function () {
            Route::get('/dashboard/users', [UserController::class, 'connect_roles'])->name('connect.roles');
        });
        Route::group(['middleware' => 'myauthcheck:4'], function () {
            Route::post('/dashboard/users/store', [UserController::class, 'store_userrole'])->name('user-role.store_userrole');
        });
        Route::group(['middleware' => 'myauthcheck:2'], function () {
            Route::post('/dashboard/users/create', [UserController::class, 'store_user'])->name('user-role.store_user');
        });
        Route::group(['middleware' => 'myauthcheck:5'], function () {
            Route::get('/dashboard/users/delete/{id}', [UserController::class, 'destroy'])->name('user-role.destroy');
        });

        //ROLES CRUD
        Route::group(['middleware' => 'myauthcheck:7'], function () {
            Route::get('/dashboard/roles', [RoleController::class, 'create'])->name('roles.index');
        });
        Route::group(['middleware' => 'myauthcheck:6'], function () {
            Route::post('/dashboard/roles/store', [RoleController::class, 'store'])->name('roles.store');
        });
        Route::group(['middleware' => 'myauthcheck:8'], function () {
            Route::post('/dashboard/roles/update', [RoleController::class, 'update'])->name('roles.update');
        });
        Route::group(['middleware' => 'myauthcheck:9'], function () {
            Route::get('/dashboard/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
        });

        //POSTS CRUD
        Route::group(['middleware' => 'myauthcheck:10'], function () {
            Route::get('/dashboard/posts', [AdminPostController::class, 'show_crud'])->name('posts.index');
            Route::get('/dashboard/posts/{slug}', [AdminPostController::class, 'display_crud'])->where('slug', '[A-Za-z0-9-_]+')->name('posts.show');
        });
        Route::group(['middleware' => 'myauthcheck:11'], function () {
            Route::get('/dashboard/posts/edit/{slug}', [AdminPostController::class, 'edit_crud']);
            Route::post('/dashbpard/posts/update', [AdminPostController::class, 'update_crud'])->name('yeye123');

        });
        Route::group(['middleware' => 'myauthcheck:12'], function () {
            Route::get('/dashboard/posts/destroy/{id}', [AdminPostController::class, 'destroy_crud'])->name('posts.destroy');
        });

        //COMMENTS CRUD
        Route::group(['middleware' => 'myauthcheck:13'], function () {
            Route::get('/dashboard/comments', [CommentController::class, 'show_crud'])->name('comments.index');
        });
        Route::group(['middleware' => 'myauthcheck:14'], function () {
            Route::post('/dashboard/comments/update', [CommentController::class, 'update_crud'])->name('comments.update');
        });
        Route::group(['middleware' => 'myauthcheck:15'], function () {
            Route::get('/dashboard/comments/destroy/{id}', [CommentController::class, 'destroy_crud'])->name('comments.destroy');
        });

    });




    // check for logged in user
    Route::group(['middleware' => ['auth','myauthcheck:16']], function () {
        Route::get('/home1', [UserPostController::class, 'index']);

        Route::group(['middleware' => 'myauthcheck:17'], function () {
            Route::get('/home/new-post', [UserPostController::class, 'create'])->name('post.create');
            Route::post('/home/new-post', [UserPostController::class, 'store'])->name('post.store');
        });
        Route::group(['middleware' => 'myauthcheck:18'], function () {
            Route::get('/home/{slug}', [UserPostController::class, 'show'])->where('slug', '[A-Za-z0-9-_]+');
            Route::get('/home/my-all-posts', [UserController::class, 'user_posts_all']);
            Route::get('/home/my-drafts', [UserController::class, 'user_posts_draft']);
        });
        Route::group(['middleware' => 'myauthcheck:19'], function () {
            Route::get('/home/edit/{slug}', [UserPostController::class, 'edit']);
            Route::post('/home/update', [UserPostController::class, 'update']);
        });
        Route::group(['middleware' => 'myauthcheck:20'], function () {
            Route::get('/home/delete/{id}', [UserPostController::class, 'destroy']);
        });
        Route::group(['middleware' => 'myauthcheck:21'], function () {
            Route::post('/home/comment/add', [CommentController::class, 'store']);
        });
        Route::group(['middleware' => 'myauthcheck:24'], function () {
            Route::get('/home/comment/delete/{id}', [CommentController::class, 'destroy']);
        });
    });

    Route::group(['middleware' => 'myauthcheck:25'], function () {
        Route::get('home/user/{id}', [UserController::class, 'profile'])->where('id', '[0-9]+')->name('profile');
        Route::get('home/user/{id}/posts', [UserController::class, 'user_posts'])->where('id', '[0-9]+');
    });


});
