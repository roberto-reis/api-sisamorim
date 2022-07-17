<?php

namespace App\Domain\Fornecedor\routes;

use App\Domain\Fornecedor\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.jwt')->group(function () {
    Route::controller(FornecedorController::class)->prefix('fornecedores')->group(function() {
        Route::get('/', 'index')->name('fornecedor.index');
        Route::post('/store', 'store') ->name('fornecedor.store');
        Route::put('{uuid}/update', 'update')->name('fornecedor.update');
        Route::delete('{uuid}/delete', 'delete')->name('fornecedor.delete');
    });
});

