<?php

namespace App\Domain\User\Controllers;

use App\Domain\User\Actions\LoginAction;
use App\Domain\User\Actions\RegisterAction;
use App\Domain\User\DTO\LoginDTO;
use App\Domain\User\DTO\RegisterDTO;
use App\Domain\User\Requests\LoginRequest;
use App\Domain\User\Requests\RegisterRequest;
use App\Exceptions\AuthException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @param LoginAction $loginAction
     * @return JsonResponse
     */
    public function login(LoginRequest $request, LoginAction $actionLogin): JsonResponse
    {
        try {

            $credentialsValidated = LoginDTO::fromRequest($request);
            $loginToken = $actionLogin($credentialsValidated);

            return response()->json([
                'error' => false,
                'message' => 'login feito com sucesso',
                'token' => $loginToken,
            ], 401);

        } catch (AuthException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }

    public function register(RegisterRequest $registerRequest, RegisterAction $registerAction): JsonResponse
    {

        $dataValidated = RegisterDTO::fromRequest($registerRequest);

        $userToken = $registerAction($dataValidated);

        $userLogado = auth()->user();

        return response()->json([
            'error' => false,
            'message' => 'registro feito com sucesso',
            'token' => $userToken,
            'user' => $userLogado
        ], 201);
    }

}
