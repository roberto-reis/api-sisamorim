<?php

namespace App\Domain\CentroCusto\Controllers;

use App\Domain\CentroCusto\Actions\CreateCentroCustoAction;
use App\Domain\CentroCusto\DTO\CentroCustoDTO;
use App\Domain\CentroCusto\Requests\CentroCustoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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

    public function store(CentroCustoRequest $request, CreateCentroCustoAction $createCentroCusto)
    {
        try {
            $centroCusto = CentroCustoDTO::fromRequest($request);
            $createCentroCusto($centroCusto);
        } catch (\Exception $e) {
            Log::error('error ao savar Centro de Custo: ', [$e->getMessage()]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Centro de Custo criado com sucesso',
        ], 201);
    }
}
