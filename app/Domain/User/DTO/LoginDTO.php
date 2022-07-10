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

    public static function register(array $data): LoginDTO
    {
        return new self(
            $data['email'],
            $data['password']
        );
    }

}



