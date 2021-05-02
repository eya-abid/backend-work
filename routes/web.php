<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("register" , [UserControlller::class, 'register']);
Route::get('show/{id}' , [UserController::class, 'show']);
Route::get('search' , [UserController::class, 'search']);
Route::post('login' , [UserController::class, 'login']);
