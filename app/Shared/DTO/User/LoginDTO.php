<?php

namespace App\Shared\DTO\User;

use App\Shared\DTO\DTOAbstract;

class LoginDTO extends DTOAbstract
{
    /** @var string */
    public $email;

    /** @var string */
    public $password;

    public function register(string $email, string $password): self
    {
        $this->email = $email;
        $this->password = $password;

        return $this;
    }

}



