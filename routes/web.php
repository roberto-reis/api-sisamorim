<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return response()->json([
        'APP' => 'api-sisamorim',
        'version API' => '1.0',
        'Framework version' => app()->version(),
    ], 200);
});

// Route::get('/', function () {
//     return view('welcome');
// });
