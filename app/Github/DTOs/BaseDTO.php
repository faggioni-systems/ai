<?php

namespace App\Github\DTOs;

readonly class BaseDTO
{
    public function toArray(): array
    {
        return (array) $this;
    }
}
