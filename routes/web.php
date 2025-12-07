<?php

use App\Http\Controllers\QuashtagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/quashtags', QuashtagController::class);