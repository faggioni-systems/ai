<?php

namespace App\Github\DTOs;

class GithubRepositoryDTO extends BaseDTO
{
    public int $id;
    public string $name;
    public string $fullName;

    public function __construct(int $id, string $name, string $fullName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->fullName = $fullName;
    }
}
