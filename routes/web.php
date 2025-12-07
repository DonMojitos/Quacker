<?php

use App\Http\Controllers\QuackController;
use App\Http\Controllers\QuashtagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('quacks', QuackController::class);
Route::resource('quashtags', QuashtagController::class);
Route::resource('users', UserController::class);



