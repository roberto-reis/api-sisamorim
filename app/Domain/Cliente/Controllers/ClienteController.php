<?php

namespace App\Domain\Cliente\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shared\DTO\Cliente\ClienteDTO;
use App\Domain\Cliente\Requests\ClienteRequest;
use App\Domain\Cliente\Action\CreateClienteAction;
use App\Domain\Cliente\Action\DeleteClienteAction;
use App\Domain\Cliente\Action\ListClienteAction;
use App\Domain\Cliente\Action\UpdateClienteAction;
use App\Domain\Cliente\Requests\ListClienteRequest;

class ClienteController extends Controller
{
    public function index(ListClienteRequest $request, ListClienteAction $action)
    {
        try {
            $parametrosValidados = $request->validated();

            $clientes = $action->execute($parametrosValidados);
            return response()->json([
                'message' => 'Dados retornados com sucesso.',
                'data' => $clientes,
            ], 200);
        } catch (\Exception $exception) {
            \Log::error('Erro ao listar clientes: ', [$exception->getMessage()]);
            return response()->json([
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function store(ClienteRequest $request, ClienteDTO $dto, CreateClienteAction $action)
    {
        try {
            $dadosValidados = $dto->fromArray($request->validated());
            $cliente = $action($dadosValidados);

            return response()->json([
                'message' => 'Cliente cadastrado com sucesso',
                'data' => $cliente
            ], 201);
        } catch (\Exception $excepion) {
            return response()->json([
                'message' => 'Erro ao cadastrar cliente',
                'data' => $excepion->getMessage()
            ], 500);
        }
    }

    public function update($uuid, ClienteRequest $request, ClienteDTO $dto, UpdateClienteAction $action)
    {
        try {
            $dadosValidados = $dto->fromArray($request->validated());
            $cliente = $action($uuid, $dadosValidados);

            return response()->json([
                'message' => 'Cliente atualizado com sucesso',
                'data' => $cliente
            ], 200);
        } catch (\Exception $excepion) {
            return response()->json([
                'message' => 'Erro ao atualizar cliente',
                'data' => $excepion->getMessage()
            ], $excepion->getCode());
        }
    }

    public function delete($uuid, DeleteClienteAction $action)
    {
        try {
            $action($uuid);
            return response()->json([
                'message' => 'Cliente removido com sucesso'
            ], 200);

        } catch (\Exception $excepion) {
            return response()->json([
                'message' => 'Erro ao remover cliente',
                'data' => $excepion->getMessage()
            ], $excepion->getCode());
        }
    }
}
