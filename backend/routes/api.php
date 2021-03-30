<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPostController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {


    Route::get('posts', [UserPostController::class, 'index_vue']);
    Route::get('post/{id}', [UserPostController::class, 'show_vue']);
    Route::post('post', [UserPostController::class, 'store_vue']);
    Route::put('post', [UserPostController::class, 'store_vue']);
    Route::delete('post/{id}', [UserPostController::class, 'destroy_vue']);


});
