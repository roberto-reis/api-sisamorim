<?php

namespace App\Domain\User\Actions;

use App\Domain\User\DTO\LoginDTO;
use App\Exceptions\AuthException;

class LoginAction
{
    /**
     * execute the action
     * @param LoginDTO $dto
     * @return array
     */
    public function __invoke(LoginDTO $dto): array
    {
        $credentials = [
            'email' => $dto->email,
            'password' => $dto->password,
        ];

        if (! $token = auth()->attempt($credentials)) {
            throw new AuthException('Email ou senha inválidos', 401);
        }

        return $this->respondWithToken($token); // TODO: Criar um helper para retornar o token
    }

    /**
     * Get the token array structure.
     * @param string $token
     * @return array
     */
    protected function respondWithToken(string $token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL()
        ];
    }

}
