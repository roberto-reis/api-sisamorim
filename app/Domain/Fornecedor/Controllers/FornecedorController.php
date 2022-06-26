<?php

namespace App\Domain\Fornecedor\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Domain\Fornecedor\DTO\FornecedorDTO;
use App\Domain\Fornecedor\Requests\FornecedorRequest;
use App\Domain\Fornecedor\Action\CreateFornecedorAction;

class FornecedorController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'FornecedorController']);
    }

    public function store(FornecedorRequest $request, CreateFornecedorAction $createFornecedor)
    {
        try {
            $fornecedorValidado = FornecedorDTO::fromRequest($request);
            $fornecedor = $createFornecedor($fornecedorValidado);
            return response()->json([
                'success' => true,
                'message' => 'Fornecedor criado com sucesso',
                'data' => $fornecedor
            ], 201);
        } catch (\Exception $exception) {
            Log::error('Erro ao cadastrar fornecedor: ', [$exception->getMessage()]);
        }
    }
}
