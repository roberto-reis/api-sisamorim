<?php

namespace App\Domain\User\Controllers;

use App\Shared\DTO\User\LoginDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Shared\DTO\User\RegisterDTO;
use App\Domain\User\Actions\LoginAction;
use App\Domain\User\Requests\LoginRequest;
use App\Domain\User\Actions\RegisterAction;
use App\Domain\User\Requests\RegisterRequest;

class AuthController extends Controller
{
    /**
     * Method to login the user.
     * @param LoginRequest $request
     * @param LoginAction $loginAction
     * @return JsonResponse
     */
    public function login(LoginRequest $request, LoginAction $actionLogin, LoginDTO $dto): JsonResponse
    {
        try {

            $credentialsValidated = $dto->fromArray($request->validated());
            $loginToken = $actionLogin($credentialsValidated);

            return response()->json([
                'message' => 'login feito com sucesso',
                'token' => $loginToken
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
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
    public function register(RegisterRequest $registerRequest, RegisterAction $registerAction, RegisterDTO $dto): JsonResponse
    {
        try {
            $dataValidated = $dto->fromArray($registerRequest->validated());
            $userToken = $registerAction($dataValidated);
            $userLogado = auth()->user();

            return response()->json([
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
    public function user(): JsonResponse
    {
        return response()->json([
            'message' => 'Usuário logado',
            'data' => auth()->user()
        ], 200);
    }

    /**
     * Method to logout the user.
     * @return JsonResponse
    */
    public function logout(): JsonResponse
    {
        try {
            auth()->logout();

            return response()->json([
                'message' => 'Logout feito com sucesso'
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Error ao registar usuário: ', [
                'message' => $e->getMessage(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'message' => $e->getMessage(),
            ], 401);
        }
    }

    /**
     * Method to logout the user.
     * @return JsonResponse
    */
    public function refresh(): JsonResponse
    {
        return response()->json([
            'message' => 'Refresh token feito com sucesso',
            'data' => responde_with_token(auth()->refresh())
        ], 200);
    }

}
