<?php

namespace App\Domain\Produto\Controllers;

use App\Domain\Produto\Actions\CreateProdutoAction;
use App\Domain\Produto\Actions\UpdateProdutoAction;
use App\Domain\Produto\DTO\ProdutoDTO;
use App\Domain\Produto\Requests\ProdutoRequest;
use App\Exceptions\ProdutoException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ProdutoController extends Controller
{
    public function index()
    {
        return 'ProdutoController index';
    }

    public function store(ProdutoRequest $request, CreateProdutoAction $createAction)
    {
        try {
            $produtoValidado = ProdutoDTO::fromRequest($request);
            $produto = $createAction($produtoValidado);

            return response()->json([
                'success' => true,
                'message' => 'Produto criado com sucesso',
                'data' => $produto
            ], 201);

        } catch (\Exception $exception) {
            Log::error('Erro ao cadastrar produto: ', [$exception->getMessage()]);
        }
    }

    public function update($uuid, ProdutoRequest $request, UpdateProdutoAction $updateAction)
    {
        try {
            $produtoCustoValidado = ProdutoDTO::fromRequest($request);
            $produto = $updateAction($produtoCustoValidado, $uuid);

            return response()->json([
                'success' => true,
                'message' => 'Produto atualizado com sucesso',
                'data' => $produto
            ], 200);

        } catch (ProdutoException $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        } catch (\Exception $exception) {
            Log::error('error ao atualizar Produto: ', [$exception->getMessage()]);
        }
    }
}
