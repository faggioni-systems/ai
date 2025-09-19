<?php

namespace App\Github\DTOs;

readonly class GithubRepositoryDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $fullName
    ) {}
}
