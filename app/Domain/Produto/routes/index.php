<?php

namespace App\Domain\Produto\routes;

use App\Domain\Produto\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth.jwt')->group(function () {

    Route::controller(ProdutoController::class)->prefix('produto')->group(function() {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::put('{uuid}/update', 'update');
        Route::delete('{uuid}/delete', 'delete');
    });

});
