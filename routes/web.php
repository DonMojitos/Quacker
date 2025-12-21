<?php

use App\Http\Controllers\QuackController;
use App\Http\Controllers\QuashtagController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('quacks', QuackController::class)->middleware('auth');;
Route::resource('quashtags', QuashtagController::class);
Route::resource('users', UserController::class);
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy']);
