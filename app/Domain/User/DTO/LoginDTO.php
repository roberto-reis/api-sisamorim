<?php

namespace App\Domain\User\DTO;

use App\Domain\User\Requests\LoginRequest;

class LoginDTO
{
    /** @var string */
    public $email;

    /** @var string */
    public $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromRequest(LoginRequest $request): LoginDTO
    {
        return new self(
            $request->email, 
            $request->password
        );
    }

    // public function toArray(): array
    // {
    //     return [
    //         'email' => $this->email,
    //         'password' => $this->password,
    //     ];
    // }

}



