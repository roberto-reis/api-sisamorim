<?php

namespace App\Domain\User\Actions;

use App\Infrastructure\Models\User;
use App\Shared\DTO\User\RegisterDTO;
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

        return responde_with_token($token);
    }
}
