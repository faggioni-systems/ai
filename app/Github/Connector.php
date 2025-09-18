<?php

namespace App\Github;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Connector
{
    private Client $client;

    public function __construct($baseUrl = '')
    {
        $key = config('services.github.token');
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $key
            ]
        ]);
    }

    /**
     * @throws GuzzleException
     * @throws \Exception
     */
    public function get(string $url): mixed
    {
        $response = $this->client->get($url);
        return $this->resolveResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \Exception
     */
    public function post(string $url): mixed
    {
        $response = $this->client->post($url);
        return $this->resolveResponse($response);
    }

    /**
     * @throws \Exception
     */
    private function resolveResponse(ResponseInterface $response): mixed
    {
        if($response->getStatusCode() !== 200) {
            throw new \RuntimeException('Error Processing Request', $response->getStatusCode());
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
