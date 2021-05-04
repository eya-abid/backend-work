<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\User;
use App\Models\Post;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register' , [UserController::class, 'register']);
Route::post('login' , [UserController::class, 'login']);
Route::get('/search' , [UserController::class, 'search']);
Route::get('/show{id}' , [UserController::class, 'show']);
Route::post('create' , [PostController::class, 'createPost']);
Route::get('followers' , [UserController::class, 'followers']);
Route::get('followed' , [UserController::class, 'followed']);

