<?php

use Illuminate\Support\Facades\Route;
use App\Domain\User\Controllers\AuthController;



Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
});
