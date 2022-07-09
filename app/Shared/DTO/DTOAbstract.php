<?php

namespace App\Shared\DTO;

abstract class DTOAbstract
{
    /**
     * @param array $except
     * @return array
     */
    public function toArray(array $except = []): array
    {
        $fromCollect = collect(get_object_vars($this));

        return $fromCollect->except($except)->toArray();
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

}
