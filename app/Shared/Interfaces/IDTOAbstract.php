<?php

namespace App\Shared\Interfaces;

interface IDTOAbstract
{
    public function toArray(array $except): array;

    public function toJson(): string;
}

