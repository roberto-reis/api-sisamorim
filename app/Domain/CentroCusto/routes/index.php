<?php

namespace App\Domain\CentroCusto\routes;

use App\Domain\CentroCusto\Controllers\CentroCustoController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth.jwt')->group(function () {

    Route::controller(CentroCustoController::class)->prefix('centro-custo')->group(function() {
        Route::get('/', 'index')->name('centro-custo.index');
        Route::post('/store', 'store')->name('centro-custo.store');
        Route::put('{uuid}/update', 'update')->name('centro-custo.update');
        Route::delete('{uuid}/delete', 'delete')->name('centro-custo.delete');
    });

});
