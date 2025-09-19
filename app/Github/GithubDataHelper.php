<?php

namespace App\Github;

use App\Github\DTOs\GithubCreateIssueParamsDTO;
use App\Github\Enums\Users;

class GithubDataHelper
{
    private string $repoOwner = 'faggioni-systems';

    public function getIssuesParams(GithubCreateIssueParamsDTO $data): array
    {
        return [
            'owner' => $this->repoOwner,
            'repo' => $data->repo,
            'title' => $data->title,
            'body' => $data->body,
            'assignees' => [
                Users::FAGGIONI->value,
            ],
        ];
    }

    public function getCreateIssueEndpoint(string $repo): string
    {
        return "repos/$this->repoOwner/$repo/issues";
    }
}
