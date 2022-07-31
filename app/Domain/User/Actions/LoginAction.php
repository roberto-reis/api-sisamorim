<?php

namespace App\Domain\User\Actions;

use App\Shared\DTO\User\LoginDTO;

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
            throw new \Exception('Email ou senha inválidos', 400);
        }

        return responde_with_token($token);
    }

}
