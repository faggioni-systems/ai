<?php

namespace App\Jobs\DTOs;

readonly class ProcessIssueDTO
{
    public function __construct(
        public readonly string $repo,
        public readonly string $title,
        public readonly string $context
    ) {}
}
