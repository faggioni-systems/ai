<?php

namespace App\Github\DTOs;

readonly class BaseDTO
{
    public function toLivewire(): array
    {
        return (array) $this;
    }
}
