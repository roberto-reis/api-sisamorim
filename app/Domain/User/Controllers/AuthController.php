<?php

namespace App\Domain\User\Controllers;

use App\Domain\User\Actions\LoginAction;
use App\Domain\User\DTO\LoginDTO;
use App\Domain\User\Requests\LoginRequest;
use App\Exceptions\AuthException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
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



}
