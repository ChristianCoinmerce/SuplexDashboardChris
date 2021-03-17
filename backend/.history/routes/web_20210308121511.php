<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Models;





Route::get('auth/logout', [UserController::class, 'logout']);
Route::group(['prefix' => 'auth'], function () {
  Auth::routes();
});


Route::group(['middleware' => ['auth', 'myauthcheck:1']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


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
        Route::get('/dashboard/posts', [PostController::class, 'show_crud'])->name('posts.index');
    });
    Route::group(['middleware' => 'myauthcheck:11'], function () {
        Route::post('/dashboard/posts/update', [PostController::class, 'update_crud'])->name('posts.update');
    });
    Route::group(['middleware' => 'myauthcheck:12'], function () {
        Route::get('/dashboard/posts/destroy/{id}', [PostController::class, 'destroy_crud'])->name('posts.destroy');
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

Route::get('/', [DashboardController::class, 'core'])->name('dashboard.core');

#forms
// Route::get('/form', [FormController::class, 'create']);
// Route::get('new-form', [FormController::class, 'create'])->name('new-form');
// Route::post('/users/store_role', [FormController::class, 'store'])->name('form.store');



// check for logged in user
Route::group(['middleware' => ['auth','myauthcheck:16']], function () {
    Route::get('/home', [PostController::class, 'index']);

    Route::group(['middleware' => 'myauthcheck:17'], function () {
        Route::get('/home/new-post', [PostController::class, 'create'])->name('post.create');
        Route::post('/home/new-post', [PostController::class, 'store'])->name('post.store');
    });
    Route::group(['middleware' => 'myauthcheck:18'], function () {
        Route::get('/home/{slug}', [PostController::class, 'show'])->where('slug', '[A-Za-z0-9-_]+');
        Route::get('/home/my-all-posts', [UserController::class, 'user_posts_all']);
        Route::get('/home/my-drafts', [UserController::class, 'user_posts_draft']);
    });
    Route::group(['middleware' => 'myauthcheck:19'], function () {
        Route::get('/home/edit/{slug}', [PostController::class, 'edit']);
        Route::post('/home/update', [PostController::class, 'update']);
    });
    Route::group(['middleware' => 'myauthcheck:20'], function () {
        Route::get('/home/delete/{id}', [PostController::class, 'destroy']);
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
