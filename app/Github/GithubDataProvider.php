<?php

namespace App\Github;

use App\Github\DTOs\GithubCreateIssueParamsDTO;
use App\Github\DTOs\GithubIssueDTO;
use App\Github\DTOs\GithubRepositoryDTO;
use GuzzleHttp\Exception\GuzzleException;

class GithubDataProvider
{
    private Connector $connector;

    private string $baseUrl = 'https://api.github.com/';

    private GithubDataHelper $helper;

    public function __construct()
    {
        $this->connector = new Connector($this->baseUrl);
        $this->helper = new GithubDataHelper;
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
            return (new GithubRepositoryDTO(
                $repo['id'],
                $repo['name'],
                $repo['full_name']
            ))->toArray();
        })->toArray();
    }

    public function createIssue(GithubCreateIssueParamsDTO $data): GithubIssueDTO
    {
        $requestData = $this->helper->getIssuesParams($data);
        $issue = $this->connector->post(
            $this->helper->getCreateIssueEndpoint($data->repo),
            $requestData
        );

        return new GithubIssueDTO(
            $issue['id'],
            $issue['title'],
            $issue['body'],
            $issue['html_url']
        );
    }
}
