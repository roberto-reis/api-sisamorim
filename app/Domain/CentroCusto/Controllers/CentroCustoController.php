<?php

namespace App\Domain\CentroCusto\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Domain\CentroCusto\DTO\CentroCustoDTO;
use App\Domain\CentroCusto\Requests\CentroCustoRequest;
use App\Domain\CentroCusto\Actions\CreateCentroCustoAction;
use App\Domain\CentroCusto\Actions\DeleteCentroCustoAction;
use App\Domain\CentroCusto\Actions\UpdateCentroCustoAction;
use App\Domain\CentroCusto\Repositories\CentroCustoRepository;
use Illuminate\Http\Request;

class CentroCustoController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth.jwt');
    }

    public function index(Request $request, CentroCustoRepository $repository)
    {
        try {
            $centroCustos = $repository->getCentroCusto($request);

            return response()->json([
                'success' => true,
                'message' => 'Dados retornados com sucesso.',
                'data' => $centroCustos,
            ], 200);

        } catch (\Exception $e) {
            Log::error('Ocorreu um erro ao buscar os centros de custo', [$e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro ao buscar os centros de custo.'
            ], 500);
        }
    }

    public function store(CentroCustoRequest $request, CreateCentroCustoAction $createCentroCusto)
    {
        try {
            $centroCustoValidado = CentroCustoDTO::fromRequest($request);
            $centroCusto = $createCentroCusto($centroCustoValidado);
        } catch (\Exception $e) {
            Log::error('error ao savar Centro de Custo: ', [$e->getMessage()]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Centro de Custo criado com sucesso',
            'data' => $centroCusto
        ], 201);
    }

    public function update($uid, CentroCustoRequest $request, UpdateCentroCustoAction $updateCentroCusto)
    {
        try {
            $centroCustoValidado = CentroCustoDTO::fromRequest($request);
            $centroCusto = $updateCentroCusto($centroCustoValidado, $uid);

            return response()->json([
                'success' => true,
                'message' => 'Centro de Custo atualizado com sucesso',
                'data' => $centroCusto
            ], 200);

        } catch (\PDOException | \Exception $e) {
            if ($e instanceof \PDOException) {
                Log::error('error ao atualizar Centro de Custo: ', [$e->getMessage()]);
            }
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function delete($uid, DeleteCentroCustoAction $deleteCentroCusto)
    {
        try {
            $centroCusto = $deleteCentroCusto($uid);

            return response()->json([
                'success' => true,
                'message' => 'Centro de Custo deletado com sucesso',
                'data' => $centroCusto
            ], 200);

        } catch (\PDOException | \Exception $e) {
            if ($e instanceof \Exception) {
                Log::error('error ao deletar Centro de Custo: ', [$e->getMessage()]);
            }
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }


}
