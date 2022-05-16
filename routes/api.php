<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::post("/register", [UserController::class, 'register']);
Route::post("/login", [UserController::class, 'login']);

Route::post("/addPost", [PostController::class, 'addPost']);
Route::get("/posts", [PostController::class, 'index']);
Route::post("/deletePost", [PostController::class, 'deletePost']);


Route::get("/categories", [CategoryController::class, 'index']);


Route::post("/addComment", [CommentController::class, 'addComment']);
Route::get("/getComments/{postId}", [CommentController::class, 'getComments']);


// Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum'], function () {
//     Route::get('/', [BookController::class, 'index']);
//     Route::post('add', [BookController::class, 'add']);
//     Route::get('edit/{id}', [BookController::class, 'edit']);
//     Route::post('update/{id}', [BookController::class, 'update']);
//     Route::delete('delete/{id}', [BookController::class, 'delete']);
// });