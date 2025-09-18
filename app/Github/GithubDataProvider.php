<?php

namespace App\Github;

use App\Github\DTOs\GithubIssueDTO;
use App\Github\DTOs\GithubRepositoryDTO;
use GuzzleHttp\Exception\GuzzleException;

class GithubDataProvider
{
    private Connector $connector;
    private string $baseUrl = 'https://api.github.com/';

    public function __construct()
    {
        $this->connector = new Connector($this->baseUrl);
    }

    /**
     * @throws GuzzleException
     */
    public function getIssues(): array
    {
        return $this->connector->get(
            'issues'
        );
    }

    /**
     * @throws GuzzleException
     */
    public function getRepositories(): array
    {
        $repos = $this->connector->get(
            'orgs/faggioni-systems/repos'
        );

        return collect($repos)->map(function ($repo) {
            return new GithubRepositoryDTO(
                $repo['id'],
                $repo['name'],
                $repo['full_name']
            )->toLivewire();
        })->toArray();
    }

    public function createIssue(string $repository): GithubIssueDTO
    {
        $data = [
            'owner' => 'faggioni-systems',
            'repo' => $repository,
            'title' => '$title',
            'body' => '$body',
            'assignees' => [
                'faggioni'
            ],
        ];
        $issue = $this->connector->post(
            "repos/faggioni-systems/$repository/issues",
            $data
        );
        dd($issue);
    }
}
