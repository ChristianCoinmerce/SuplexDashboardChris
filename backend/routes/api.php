<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => ['auth'], function () {

    Route::get('posts', [UserPostController::class, 'index_vue']);
    Route::get('post/{id}', [UserPostController::class, 'show_vue']);
    Route::post('post', [UserPostController::class, 'store_vue']);
    Route::put('post', [UserPostController::class, 'store_vue']);
    Route::delete('post/{id}', [UserPostController::class, 'destroy_vue']);
