<?php

use App\Domain\CentroCusto\Controllers\CentroCustoController;
use Illuminate\Support\Facades\Route;
use App\Domain\User\Controllers\AuthController;


Route::middleware('auth.jwt')->group(function () {

    Route::controller(CentroCustoController::class)->prefix('centro-custo')->group(function() {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/delete', 'delete');
    });


});
