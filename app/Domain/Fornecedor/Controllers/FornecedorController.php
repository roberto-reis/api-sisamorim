<?php

namespace App\Domain\Fornecedor\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Exceptions\FornecedorException;
use App\Domain\Fornecedor\DTO\FornecedorDTO;
use App\Domain\Fornecedor\Requests\FornecedorRequest;
use App\Domain\Fornecedor\Action\CreateFornecedorAction;
use App\Domain\Fornecedor\Action\DeleteFornecedorAction;
use App\Domain\Fornecedor\Action\ListFornecedorAction;
use App\Domain\Fornecedor\Action\UpdateFornecedorAction;

class FornecedorController extends Controller
{
    public function index(Request $request, ListFornecedorAction $listAction)
    {
        $dataSearch = $request->only(['search', 'per_page', 'with_paginate']);
        try {

            $fornecedores = $listAction($dataSearch);

            return response()->json([
                'success' => true,
                'message' => 'Dados retornados com sucesso.',
                'data' => $fornecedores,
            ], 200);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
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

    public function delete(string $uuid, DeleteFornecedorAction $deleteFonecedor)
    {
        try {

            $fornecedorDeleted = $deleteFonecedor($uuid);

            return response()->json([
                'success' => true,
                'message' => 'Fornecedor deletado com sucesso',
            ], 200);

        } catch (FornecedorException $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], $exception->getCode());
        } catch (\Exception $exception) {
            Log::error('Erro ao deletar fornecedor: ', [$exception->getMessage()]);
        }
    }
}
