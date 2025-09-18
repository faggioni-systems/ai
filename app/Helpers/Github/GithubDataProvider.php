<?php

namespace App\Helpers\Github;

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
    public function getIssues()
    {
        $response = $this->connector->get(
            'issues'
        );
        dd($response);
    }
}
