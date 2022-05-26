<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::post("/register", [UserController::class, 'register']);
Route::post("/login", [UserController::class, 'login']);
Route::post("/updateProfile", [UserController::class, 'updateProfile']);
Route::get("/users", [UserController::class, 'users']);
Route::post("/deleteUser", [UserController::class, 'deleteUser']);


Route::post("/addPost", [PostController::class, 'addPost']);
Route::get("/posts", [PostController::class, 'index']);
Route::post("/deletePost", [PostController::class, 'deletePost']);


Route::get("/categories", [CategoryController::class, 'index']);


Route::post("/addComment", [CommentController::class, 'addComment']);
Route::get("/getComments/{postId}", [CommentController::class, 'getComments']);
Route::post("/deleteComment", [CommentController::class, 'deleteComment']);

