<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\CommentController;
use App\Models;



Route::get('auth/logout', [UserController::class, 'logout']);
Route::group(['prefix' => 'auth'], function () {
  Auth::routes();
});

Route::middleware(['auth'])->group(function () {
#dashboard

#roles
Route::get('/dashboard/roles', [RoleController::class, 'create'])->name('roles.index');
Route::post('/dashboard/roles/store', [RoleController::class, 'store'])->name('roles.store');
Route::post('/dashboard/roles/update', [RoleController::class, 'update'])->name('roles.update');
Route::get('/dashboard/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
// user_role
Route::get('/dashboard/users', [UserController::class, 'connect_roles'])->name('connect.roles');
Route::post('/dashboard/users/store', [UserController::class, 'store_userrole'])->name('user-role.store_userrole');
Route::post('/dashboard/users/create', [UserController::class, 'store_user'])->name('user-role.store_user');
Route::get('/dashboard/users/delete/{id}', [UserController::class, 'destroy'])->name('user-role.destroy');
Route::get('/dashboard/users/destroyAll', [UserController::class, 'destroyAll'])->name('user-role.destroyAll');
});


#forms
Route::get('/form', [FormController::class, 'create']);
Route::get('new-form', [FormController::class, 'create'])->name('new-form');
Route::post('/users/store_role', [FormController::class, 'store'])->name('form.store');



// check for logged in user
Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', [PostController::class, 'index']);
  Route::get('/dashboard/home', [PostController::class, 'index']);
  // show new post form
  Route::get('new-post', [PostController::class, 'create']);
  // save new post
  Route::post('new-post', [PostController::class, 'store']);
  // edit post form
  Route::get('edit/{slug}', [PostController::class, 'edit']);
  // update post
  Route::post('update', [PostController::class, 'update']);
  // delete post
  Route::get('delete/{id}', [PostController::class, 'destroy']);
  // display user's all posts
  Route::get('my-all-posts', [UserController::class, 'user_posts_all']);
  // display user's drafts
  Route::get('my-drafts', [UserController::class, 'user_posts_draft']);
  // add comment
  Route::post('comment/add', [CommentController::class, 'store']);
  // delete comment
  Route::get('comment/delete/{id}', [CommentController::class, 'destroy']);
});

//users profile
Route::get('user/{id}', [UserController::class, 'profile'])->where('id', '[0-9]+');
// display list of posts
Route::get('user/{id}/posts', [UserController::class, 'user_posts'])->where('id', '[0-9]+');
// display single post
Route::get('/{slug}', [PostController::class, 'show'])->where('slug', '[A-Za-z0-9-_]+');

