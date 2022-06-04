<?php

namespace App\Domain\CentroCusto\routes;

use App\Domain\CentroCusto\Controllers\CentroCustoController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth.jwt')->group(function () {

    Route::controller(CentroCustoController::class)->prefix('centro-custo')->group(function() {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::put('{uuid}/update', 'update');
        Route::delete('{uuid}/delete', 'delete');
    });

});
