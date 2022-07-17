<?php

namespace App\Domain\User\DTO;

use App\Domain\User\Requests\RegisterRequest;
use App\Shared\DTO\DTOAbstract;

class RegisterDTO extends DTOAbstract
{
    /** @var string */
    public $first_name;

    /** @var string */
    public $last_name;

    /** @var string */
    public $email;

    /** @var string */
    public $password;


    public function register(string $first_name, string $last_name, string $email, string $password): self
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;

        return $this;
    }

}
