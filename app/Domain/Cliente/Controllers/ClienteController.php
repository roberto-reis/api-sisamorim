<?php

namespace App\Domain\Cliente\Controllers;

use App\Domain\Cliente\Action\CreateClienteAction;
use App\Domain\Cliente\Requests\ClienteRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shared\DTO\Cliente\ClienteDTO;

class ClienteController extends Controller
{
    public function index()
    {

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
}
