<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
   Route::view('/login', 'auth.login')->name('login');
   Route::get('/login_user/{id}', [AuthController::class, 'login_user'])->name('login_user');
});

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/home');
    Route::get('home', [MainController::class, 'index'])->name('home');

    Route::get('/post_create', [MainController::class, 'create'])->name('create');

    Route::get('/post_update/{id}', [MainController::class, 'update'])->name('update');

    Route::get('/post_delete/{id}', [MainController::class, 'delete'])->name('delete');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
