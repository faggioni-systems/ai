<?php

namespace App\Github\DTOs;

readonly class GithubIssueDTO extends BaseDTO
{
    public function __construct(
        public readonly int $github_id,
        public readonly string $title,
        public readonly string $body,
        public readonly string $url
    ) {}
}
