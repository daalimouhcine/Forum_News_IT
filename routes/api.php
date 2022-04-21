<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);

// Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum'], function () {
//     Route::get('/', [BookController::class, 'index']);
//     Route::post('add', [BookController::class, 'add']);
//     Route::get('edit/{id}', [BookController::class, 'edit']);
//     Route::post('update/{id}', [BookController::class, 'update']);
//     Route::delete('delete/{id}', [BookController::class, 'delete']);
// });