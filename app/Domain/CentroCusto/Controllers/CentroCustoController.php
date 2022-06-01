<?php

namespace App\Domain\CentroCusto\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Domain\CentroCusto\DTO\CentroCustoDTO;
use App\Domain\CentroCusto\Requests\CentroCustoRequest;
use App\Domain\CentroCusto\Actions\CreateCentroCustoAction;
use App\Domain\CentroCusto\Actions\DeleteCentroCustoAction;
use App\Domain\CentroCusto\Actions\UpdateCentroCustoAction;

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

    public function update($uid, CentroCustoRequest $request, UpdateCentroCustoAction $updateCentroCusto)
    {
        try {
            $centroCusto = CentroCustoDTO::fromRequest($request);
            $updateCentroCusto($centroCusto, $uid);
        } catch (\PDOException | \Exception $e) {
            if ($e instanceof \PDOException) {
                Log::error('error ao atualizar Centro de Custo: ', [$e->getMessage()]);
            }
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Centro de Custo atualizado com sucesso',
        ], 200);
    }

    public function delete($uid, DeleteCentroCustoAction $deleteCentroCusto)
    {
        try {
            $deleteCentroCusto($uid);
        } catch (\PDOException | \Exception $e) {
            if ($e instanceof \Exception) {
                Log::error('error ao deletar Centro de Custo: ', [$e->getMessage()]);
            }
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Centro de Custo deletado com sucesso',
        ], 200);
    }


}
