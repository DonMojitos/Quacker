<?php

use App\Http\Controllers\QuackController;
use App\Http\Controllers\QuashtagController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(QuackController::class) ->group(function() {
    Route::get('/feed', 'feed')
    ->name('quacks.feed')
    ->middleware('auth');
    Route::post('/quacks/{quack}/requack', 'requackUnrequack')
    ->middleware('auth');
    Route::post('/quacks/{quack}/quav', 'quavUnquav')
    ->middleware('auth');
    Route::get('/quacks', 'index');
    Route::get('/quacks/create', 'create')
    ->middleware('auth');
    Route::get('/quacks/{quack}', 'show');
    Route::get('/quacks/{quack}/edit', 'edit')
    ->middleware('auth')
    ->can('edit', 'quack');
    Route::post('/quacks', 'store')
    ->middleware('auth');
    Route::patch('/quacks/{quack}', 'update')
    ->middleware('auth')
    ->can('edit', 'quack');
    Route::delete('/quacks/{quack}', 'destroy')
    ->middleware('auth')
    ->can('edit', 'quack');
});
Route::get('/users/{user}/quacks',[UserController::class, 'quacksUsuario']);
Route::controller(UserController::class) ->group(function() {
    Route::get('/users', 'index');
    Route::get('/users/create', 'create');
    Route::post('/users/{user}/follow', 'followUnfollow')
    ->middleware('auth')
    ->name('users.follow');
    Route::get('/users/{user}', 'show')
    ->middleware('auth');
    Route::get('/users/{user}/edit', 'edit')
    ->middleware('auth')
    ->can('edit', 'user');
    Route::post('/users', 'store')
    ->middleware('auth');
    Route::patch('/users/{user}', 'update')
    ->middleware('auth')
    ->can('edit', 'user');
    Route::delete('/users/{user}', 'destroy')
    ->middleware('auth')
    ->can('edit', 'user');
});
Route::get('/quashtags/{quashtag}/quacks', [QuashtagController::class, 'quacksByQuashtag']);
Route::resource('quashtags', QuashtagController::class);

Route::get('/', [SessionController::class, 'redirect']);
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy']);