<?php

namespace App\Domain\Produto\Controllers;

use App\Domain\Produto\Actions\CreateProdutoAction;
use App\Domain\Produto\DTO\ProdutoDTO;
use App\Domain\Produto\Requests\ProdutoRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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

        } catch (\Exception $e) {
            Log::error('Erro ao cadastrar produto: ', [$e->getMessage()]);
        }
    }
}
