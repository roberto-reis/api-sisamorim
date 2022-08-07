<?php

use Illuminate\Support\Facades\Route;
use App\Domain\User\Controllers\AuthController;

Route::prefix('auth')->group(function() {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::controller(AuthController::class)->middleware('auth.jwt')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
        Route::get('/user', 'user')->name('user');
        Route::get('/refresh', 'refresh')->name('refresh');
    });
});
