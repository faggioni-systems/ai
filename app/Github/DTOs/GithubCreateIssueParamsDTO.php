<?php

namespace App\Github\DTOs;

use App\Github\Enums\Repositories;

readonly class GithubCreateIssueParamsDTO
{
    public function __construct(
        public readonly string $repo,
        public readonly string $title,
        public readonly string $body
    ){ }
}
