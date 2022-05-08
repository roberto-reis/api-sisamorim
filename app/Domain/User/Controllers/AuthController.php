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
     * Method to login the user.
     * @param LoginRequest $request
     * @param LoginAction $loginAction
     * @return JsonResponse
     */
    public function login(LoginRequest $request, LoginAction $actionLogin): JsonResponse
    {
        try {

            $credentialsValidated = LoginDTO::fromRequest($request);
            $loginToken = $actionLogin($credentialsValidated);
            $userLogado = auth()->user();

            return response()->json([
                'error' => false,
                'message' => 'login feito com sucesso',
                'token' => $loginToken,
                'user' => $userLogado
            ], 200);

        } catch (AuthException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }

    /**
     * Method to register the user.
     * @param RegisterRequest $request
     * @param RegisterAction $actionRegister
     * @return JsonResponse
     */
    public function register(RegisterRequest $registerRequest, RegisterAction $registerAction): JsonResponse
    {
        try {
            $dataValidated = RegisterDTO::fromRequest($registerRequest);
            $userToken = $registerAction($dataValidated);
            $userLogado = auth()->user();

            return response()->json([
                'error' => false,
                'message' => 'registro feito com sucesso',
                'token' => $userToken,
                'user' => $userLogado
            ], 201);

        } catch (\Exception $e) {
            \Log::error('Error ao registar usuário: ', [
                'message' => $e->getMessage(),
                'line' => $e->getLine()
            ]);
        }
    }

    /**
     * Method to logout the user.
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json([
            'message' => 'Logout feito com sucesso'
        ], 200);
    }

}
