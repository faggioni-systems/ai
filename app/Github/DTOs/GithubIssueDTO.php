<?php

namespace App\Github\DTOs;

use App\Jobs\DTOs\ProcessIssueDTO;

readonly class GithubIssueDTO
{
    public function __construct(
       public readonly int $id,
       public readonly string $title,
       public readonly string $body,
       public readonly string $url
    ){ }
}
