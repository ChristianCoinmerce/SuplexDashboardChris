<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPostController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {

    Route::post('/login', function (Request $request) {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    });




    Route::get('posts', [UserPostController::class, 'index_vue']);
    Route::get('post/{id}', [UserPostController::class, 'show_vue']);
    Route::post('post', [UserPostController::class, 'store_vue']);
    Route::put('post', [UserPostController::class, 'store_vue']);
    Route::delete('post/{id}', [UserPostController::class, 'destroy_vue']);


});
