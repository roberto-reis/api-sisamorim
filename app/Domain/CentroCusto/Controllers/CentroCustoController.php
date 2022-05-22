<?php

namespace App\Domain\CentroCusto\Controllers;

use App\Http\Controllers\Controller;

class CentroCustoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth.jwt');
    }

    public function index()
    {

        return response()->json([
            'message' => 'centro-custos'
        ]);
    }
}
