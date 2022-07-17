<?php

namespace App\Shared\DTO;

use App\Shared\Interfaces\IDTOAbstract;

abstract class DTOAbstract implements IDTOAbstract
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

    /**
     * @param array $data
     * @return self
    */
    public function fromArray(array $data): self
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key) && !blank($value)) {
                $this->{$key} = $value;
            }
        }

        return $this;
    }

}
