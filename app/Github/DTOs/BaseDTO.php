<?php

namespace App\Github\DTOs;

class BaseDTO
{
    public function toLivewire(): array
    {
        return (array) $this;
    }
}
