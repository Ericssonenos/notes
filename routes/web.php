<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Middleware\logged;
use App\Http\Middleware\loggedOut;

//auth routes
//Route::middleware([loggedOut::class])->group(function () {
    Route::get(
        '/login',
        [AuthController::class, 'login']
    )->name('login');

    Route::post(
        '/loginSubmit',
        [AuthController::class, 'loginSubmit']
    );
//});


Route::middleware([logged::class])->group(function () {
    Route::get(
        '/logout',
        [AuthController::class, 'logout']
    )->name('logout');

    Route::get(
        '/',
        [MainController::class, 'index']
    )->name('home');

    Route::get(
        '/newNote',
        [MainController::class, 'newNote']
    )->name('new');

    Route::get(
        '/edit/{id}',
        [MainController::class, 'editNote']
    )->name('edit');
    Route::post(
        '/newNoteSubmit',
        [MainController::class, 'newNoteSubmit']
    )->name('newNoteSubmit');
    Route::post(
        '/editNoteSubmit',
        [MainController::class, 'editNoteSubmit']
    )->name('editNoteSubmit');

    Route::get(
        '/delete/{id}',
        [MainController::class, 'deleteNote']
    )->name('delete');

    Route::post(
        '/delete/{id}',
        [MainController::class, 'destroyNote']
    );
});
