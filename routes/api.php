<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::put('/post/{post:id}', [PostController::class, 'update']);
    Route::delete('/post/{post:id}', [PostController::class, 'destroy']);
    Route::post('/post/', [PostController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('/post/', [PostController::class, 'index']);
    Route::post('/login/', [AuthController::class, 'login']);
    Route::post('/register/', [AuthController::class, 'register']);
});




