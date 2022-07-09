<?php

namespace App\Domain\Fornecedor\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Domain\Fornecedor\DTO\FornecedorDTO;
use App\Domain\Fornecedor\Requests\FornecedorRequest;
use App\Domain\Fornecedor\Action\CreateFornecedorAction;
use App\Domain\Fornecedor\Action\UpdateFornecedorAction;
use App\Exceptions\FornecedorException;
use Exception;
use Illuminate\Validation\ValidationException;

class FornecedorController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'FornecedorController']);
    }

    public function store(FornecedorRequest $request, CreateFornecedorAction $createFornecedor)
    {
        try {
            $fornecedorValidado = FornecedorDTO::register($request->validated());
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

    public function update(string $uuid, FornecedorRequest $request, UpdateFornecedorAction $updateFonecedor)
    {
        try {
            $dadosValidados = FornecedorDTO::register($request->validated());
            $fornecedor = $updateFonecedor($uuid, $dadosValidados);

            return response()->json([
                'success' => true,
                'message' => 'Fornecedor atualizado com sucesso',
                'data' => $fornecedor
            ], 200);


        } catch (FornecedorException $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], $exception->getCode());
        } catch (\Exception $exception) {
            Log::error('Erro ao atualizar fornecedor: ', [$exception->getMessage()]);
        }
    }

    public function delete()
    {

    }
}
