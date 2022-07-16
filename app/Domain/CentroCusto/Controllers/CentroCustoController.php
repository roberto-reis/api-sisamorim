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
use App\Exceptions\CentroCustoException;
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
                'message' => 'Dados retornados com sucesso.',
                'data' => $centroCustos,
            ], 200);

        } catch (\Exception $e) {
            Log::error('Ocorreu um erro ao buscar os centros de custo: ', [$e->getMessage()]);
        }
    }

    public function store(CentroCustoRequest $request, CreateCentroCustoAction $createCentroCusto, CentroCustoDTO $dto)
    {
        try {
            $centroCustoValidado = $dto->fromArray($request->validated());
            $centroCusto = $createCentroCusto($centroCustoValidado);

            return response()->json([
                'message' => 'Centro de Custo criado com sucesso',
                'data' => $centroCusto
            ], 201);
        } catch (\Exception $exception) {
            Log::error('error ao savar Centro de Custo: ', [$exception->getMessage()]);
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }


    }

    public function update($uuid, CentroCustoRequest $request, UpdateCentroCustoAction $updateCentroCusto, CentroCustoDTO $dto)
    {
        try {
            $centroCustoValidado = $dto->fromArray($request->validated());
            $centroCusto = $updateCentroCusto($centroCustoValidado, $uuid);

            return response()->json([
                'message' => 'Centro de Custo atualizado com sucesso',
                'data' => $centroCusto
            ], 200);

        } catch (CentroCustoException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getCode());

        } catch (\Exception $exception) {
            Log::error('error ao atualizar Centro de Custo: ', [$exception->getMessage()]);
        }
    }

    public function delete($uuid, DeleteCentroCustoAction $deleteCentroCusto)
    {
        try {
            $centroCusto = $deleteCentroCusto($uuid);

            return response()->json([
                'message' => 'Centro de Custo deletado com sucesso',
                'data' => $centroCusto
            ], 200);

        } catch (CentroCustoException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getCode());

        } catch (\Exception $exception) {
            Log::error('error ao deletar Centro de Custo: ', [$exception->getMessage()]);
        }
    }


}
