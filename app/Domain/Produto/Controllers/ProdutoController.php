<?php

namespace App\Domain\Produto\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Exceptions\ProdutoException;
use App\Http\Controllers\Controller;
use App\Shared\DTO\Produto\ProdutoDTO;
use App\Domain\Produto\Requests\ProdutoRequest;
use App\Domain\Produto\Actions\CreateProdutoAction;
use App\Domain\Produto\Actions\DeleteProdutoAction;
use App\Domain\Produto\Actions\UpdateProdutoAction;
use App\Domain\Produto\Repositories\ProdutoRepository;

class ProdutoController extends Controller
{
    public function index(Request $request, ProdutoRepository $repository)
    {
        try {
            $produto = $repository->getProdutos($request);

            return response()->json([
                'message' => 'Dados retornados com sucesso.',
                'data' => $produto,
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Ocorreu um erro ao buscar produto: ', [$exception->getMessage()]);
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }
    }

    public function store(ProdutoRequest $request, CreateProdutoAction $createAction, ProdutoDTO $dto)
    {
        try {
            $produtoValidado = $dto->fromArray($request->validated());
            $produto = $createAction($produtoValidado);

            return response()->json([
                'message' => 'Produto criado com sucesso',
                'data' => $produto
            ], 201);

        } catch (\Exception $exception) {
            Log::error('Erro ao cadastrar produto: ', [$exception->getMessage()]);
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }
    }

    public function update($uuid, ProdutoRequest $request, UpdateProdutoAction $updateAction, ProdutoDTO $dto)
    {
        try {
            $produtoCustoValidado = $dto->fromArray($request->validated());
            $produto = $updateAction($produtoCustoValidado, $uuid);

            return response()->json([
                'message' => 'Produto atualizado com sucesso',
                'data' => $produto
            ], 200);

        } catch (ProdutoException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        } catch (\Exception $exception) {
            Log::error('error ao atualizar Produto: ', [$exception->getMessage()]);
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }
    }

    public function delete($uuid, DeleteProdutoAction $actionProduto)
    {
        try {
            $produto = $actionProduto($uuid);

            return response()->json([
                'message' => 'Produto deletado com sucesso',
                'data' => $produto
            ], 200);

        } catch (ProdutoException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        } catch (\Exception $exception) {
            Log::error('error ao deletado Produto: ', [$exception->getMessage()]);
        }
    }
}
