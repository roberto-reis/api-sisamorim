<?php

namespace App\Domain\Cliente\routes;

use Illuminate\Support\Facades\Route;
use App\Domain\Cliente\Controllers\ClienteController;

Route::middleware('auth.jwt')->group(function () {
    Route::controller(ClienteController::class)->prefix('clientes')->group(function() {
        Route::get('/', 'index')->name('clientes.index');
        Route::post('/store', 'store') ->name('clientes.store');
        Route::put('{uuid}/update', 'update')->name('clientes.update');
        Route::delete('{uuid}/delete', 'delete')->name('clientes.delete');
    });
});

