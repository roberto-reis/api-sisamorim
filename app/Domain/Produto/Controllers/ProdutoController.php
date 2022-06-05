<?php

namespace App\Domain\Produto\Controllers;

use App\Domain\Produto\Actions\CreateProdutoAction;
use App\Domain\Produto\Actions\DeleteProdutoAction;
use App\Domain\Produto\Actions\UpdateProdutoAction;
use App\Domain\Produto\DTO\ProdutoDTO;
use App\Domain\Produto\Repositories\ProdutoRepository;
use App\Domain\Produto\Requests\ProdutoRequest;
use App\Exceptions\ProdutoException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProdutoController extends Controller
{
    public function index(Request $request, ProdutoRepository $repository)
    {
        try {
            $produto = $repository->getProdutos($request);

            return response()->json([
                'success' => true,
                'message' => 'Dados retornados com sucesso.',
                'data' => $produto,
            ], 200);

        } catch (\Exception $e) {
            Log::error('Ocorreu um erro ao buscar produto: ', [$e->getMessage()]);
        }
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

    public function delete($uuid, DeleteProdutoAction $actionProduto)
    {
        try {
            $produto = $actionProduto($uuid);

            return response()->json([
                'success' => true,
                'message' => 'Produto deletado com sucesso',
                'data' => $produto
            ], 200);

        } catch (ProdutoException $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        } catch (\Exception $exception) {
            Log::error('error ao deletado Produto: ', [$exception->getMessage()]);
        }
    }
}
