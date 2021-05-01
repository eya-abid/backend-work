<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\User;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register' , [UserController::class, 'register']);
Route::get('login' , [UserController::class, 'login']);
Route::get('/search' , [UserController::class, 'search']);
Route::get('/show{id}' , [UserController::class, 'show']);