<?php

namespace App\Github\DTOs;

readonly class GithubCreateIssueParamsDTO
{
    public function __construct(
        public readonly string $repo,
        public readonly string $title,
        public readonly string $body
    ) {}
}
