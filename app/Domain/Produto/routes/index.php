<?php

namespace App\Domain\Produto\routes;

use App\Domain\Produto\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth.jwt')->group(function () {

    Route::controller(ProdutoController::class)->prefix('produtos')->group(function() {
        Route::get('/', 'index')->name('produto.index');
        Route::post('/store', 'store')->name('produto.store');
        Route::put('{uuid}/update', 'update')->name('produto.update');
        Route::delete('{uuid}/delete', 'delete')->name('produto.delete');
    });

});
