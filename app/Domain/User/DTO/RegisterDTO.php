<?php

namespace App\Domain\User\DTO;

use App\Domain\User\Requests\RegisterRequest;

class RegisterDTO
{
    /** @var string */
    public $first_name;

    /** @var string */
    public $last_name;

    /** @var string */
    public $email;

    /** @var string */
    public $password;


    public function __construct(string $first_name, string $last_name, string $email, string $password)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
    }

    public static function register(array $data): RegisterDTO
    {
        return new self(
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['password']
        );
    }


}
