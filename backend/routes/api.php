<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts\VuePostController;


    // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //     return $request->user();
    // });

    // Route::post('/login', function (Request $request) {
    //     $data = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     $user = User::where('email', $request->email)->first();

    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         return response([
    //             'message' => ['These credentials do not match our records.']
    //         ], 404);
    //     }

    //     $token = $user->createToken('my-app-token')->plainTextToken;

    //     $response = [
    //         'user' => $user,
    //         'token' => $token
    //     ];

    //     return response($response, 201);
    // });




    Route::post("/login", [Auth\AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
      Route::get("/users", [UserController::class, 'index']);
    });




    Route::get('posts', [VuePostController::class, 'index']);


    Route::get('post/{id}', [VuePostController::class, 'show']);
    Route::post('post', [VuePostController::class, 'store']);
    Route::put('post', [VuePostController::class, 'store']);
    Route::delete('post/{id}', [VuePostController::class, 'destroy']);

