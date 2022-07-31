<?php

use Illuminate\Support\Facades\Route;
use App\Domain\User\Controllers\AuthController;



Route::prefix('auth')->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::controller(AuthController::class)->middleware('auth.jwt')->group(function () {
        Route::post('/register', 'register')->name('auth.register');
        Route::post('/logout', 'logout')->name('auth.logout');
        Route::get('/user', 'user')->name('auth.user');
    });
});
