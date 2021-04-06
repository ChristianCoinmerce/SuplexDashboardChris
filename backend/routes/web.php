<?php

use Illuminate\Support\Facades\Route;

//Users
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\PostUserController;
use App\Http\Controllers\Users\RoleUserController;

//Posts
use App\Http\Controllers\Posts\UserPostController;
use App\Http\Controllers\Posts\AdminPostController;

//Comments
use App\Http\Controllers\Comments\AdminCommentController;
use App\Http\Controllers\Comments\UserCommentController;

//Roles
use App\Http\Controllers\Roles\RoleController;

//Leftover Directions
use App\Http\Controllers\Direction\DashboardController;




Route::auth();
Route::get('auth/logout', [UserController::class, 'logout']);
Route::get('/', [DashboardController::class, 'core'])->name('dashboard.core');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/home', [DashboardController::class, 'welcome'])->where('any', '.*');

    Route::group(['middleware' => ['auth', 'myauthcheck:1']], function () {
        Route::get('/dashboard', [DashboardController::class, 'pop'])->name('dashboard.pop');
        Route::get('/dashboard/ether', [DashboardController::class, 'index'])->name('dashboard.index');

        //USERS CRUD
        Route::group(['middleware' => 'myauthcheck:3'], function () {
            Route::get('/dashboard/users', [RoleUserController::class, 'index'])->name('connect.roles');
        });
        Route::group(['middleware' => 'myauthcheck:4'], function () {
            Route::post('/dashboard/users/store', [RoleUserController::class, 'store_userrole'])->name('user-role.store_userrole');
        });
        Route::group(['middleware' => 'myauthcheck:2'], function () {
            Route::post('/dashboard/users/create', [RoleUserController::class, 'store_user'])->name('user-role.store_user');
        });
        Route::group(['middleware' => 'myauthcheck:5'], function () {
            Route::get('/dashboard/users/delete/{id}', [RoleUserController::class, 'destroy'])->name('user-role.destroy');
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
            Route::get('/dashboard/posts', [AdminPostController::class, 'show'])->name('posts.index');
            Route::get('/dashboard/posts/{slug}', [AdminPostController::class, 'display'])->where('slug', '[A-Za-z0-9-_]+')->name('posts.show');
        });
        Route::group(['middleware' => 'myauthcheck:11'], function () {
            Route::get('/dashboard/posts/edit/{slug}', [AdminPostController::class, 'edit']);
            Route::post('/dashbpard/posts/update', [AdminPostController::class, 'update'])->name('yeye123');
        });
        Route::group(['middleware' => 'myauthcheck:12'], function () {
            Route::get('/dashboard/posts/destroy/{id}', [AdminPostController::class, 'destroy'])->name('posts.destroy');
        });

        //COMMENTS CRUD
        Route::group(['middleware' => 'myauthcheck:13'], function () {
            Route::get('/dashboard/comments', [AdminCommentController::class, 'show'])->name('comments.index');
        });
        Route::group(['middleware' => 'myauthcheck:14'], function () {
            Route::post('/dashboard/comments/update', [AdminCommentController::class, 'update'])->name('comments.update');
        });
        Route::group(['middleware' => 'myauthcheck:15'], function () {
            Route::get('/dashboard/comments/destroy/{id}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
        });

    });




    Route::group(['middleware' => ['auth','myauthcheck:16']], function () {
        Route::get('/home1', [UserPostController::class, 'index']);

        Route::group(['middleware' => 'myauthcheck:17'], function () {
            Route::get('/home/new-post', [UserPostController::class, 'create'])->name('post.create');
            Route::post('/home/new-post', [UserPostController::class, 'store'])->name('post.store');
        });
        Route::group(['middleware' => 'myauthcheck:18'], function () {
            Route::get('/home/{slug}', [UserPostController::class, 'show'])->where('slug', '[A-Za-z0-9-_]+');
            Route::get('/home/my-all-posts', [PostUserController::class, 'user_posts_all']);
            Route::get('/home/my-drafts', [PostUserController::class, 'user_posts_draft']);
        });
        Route::group(['middleware' => 'myauthcheck:19'], function () {
            Route::get('/home/edit/{slug}', [UserPostController::class, 'edit']);
            Route::post('/home/update', [UserPostController::class, 'update']);
        });
        Route::group(['middleware' => 'myauthcheck:20'], function () {
            Route::get('/home/delete/{id}', [UserPostController::class, 'destroy']);
        });
        Route::group(['middleware' => 'myauthcheck:21'], function () {
            Route::post('/home/comment/add', [UserCommentController::class, 'store']);
        });
        Route::group(['middleware' => 'myauthcheck:24'], function () {
            Route::get('/home/comment/delete/{id}', [UserCommentController::class, 'destroy']);
        });
    });

    Route::group(['middleware' => 'myauthcheck:25'], function () {
        Route::get('home/user/{id}', [UserController::class, 'profile'])->where('id', '[0-9]+')->name('profile');
        Route::get('home/user/{id}/posts', [PostUserController::class, 'index'])->where('id', '[0-9]+');
    });


});
