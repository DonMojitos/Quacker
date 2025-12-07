<?php

use App\Http\Controllers\QuacksController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuacksController::class, 'index']);

Route::resource('quacks', QuacksController::class);
