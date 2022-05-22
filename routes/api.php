<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function(){
    Route::get('/', function () {
        return response()->json([
            'APP' => 'api-sisamorim',
            'version API' => '1.0',
            'Framework version' => app()->version(),
        ], 200);
    });


    // Rotas Domain User
    require base_path('/app/Domain/User/routes/index.php');

    // Rotas Domain Centro de Custo
    require base_path('/app/Domain/CentroCusto/routes/index.php');

});


