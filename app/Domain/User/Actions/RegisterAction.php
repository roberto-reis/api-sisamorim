<?php

namespace App\Domain\User\Actions;

use App\Domain\User\Models\User;
use App\Domain\User\DTO\RegisterDTO;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterAction
{
    public function __invoke(RegisterDTO $registerDTO): array
    {
        $user = new User();

        $user->first_name = $registerDTO->first_name;
        $user->last_name = $registerDTO->last_name;
        $user->email = $registerDTO->email;
        $user->password = Hash::make($registerDTO->password);
        $user->save();

        event(new Registered($user));
        
        $token = auth()->login($user);
        
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