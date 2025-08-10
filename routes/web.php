<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Middleware\logged;
use App\Http\Middleware\loggedOut;

//auth routes
Route::middleware([loggedOut::class])->group(function () {
    Route::get(
        '/register',
        [AuthController::class, 'register']
    );

    Route::post(
        '/registerSubmit',
        [AuthController::class, 'registerSubmit']
    );
});


Route::middleware([logged::class])->group(function () {
    Route::get(
        '/logout',
        [AuthController::class, 'logout']
    );

    Route::get(
        '/',
        [MainController::class, 'index']
    );

    Route::get(
        '/newNote',
        [MainController::class, 'newNote']
    );
});
