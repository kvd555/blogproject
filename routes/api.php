<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/post/', [PostController::class, 'index']);
Route::put('/post/{post:id}', [PostController::class, 'update']);
Route::delete('/post/{post:id}', [PostController::class, 'destroy']);

