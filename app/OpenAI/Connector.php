<?php

namespace App\OpenAI;

use OpenAI\Responses\Chat\CreateResponse;
use OpenAI\Client;
use OpenAI;

class Connector
{
    private Client $client;

    public function __construct()
    {
        $this->client = OpenAI::client(
            config('services.openai.token')
        );
    }

    public function getResponse(string $input): CreateResponse
    {
        return $this->client->responses()->create([
            'model' => 'gpt-4o-mini',
            'tools' => [
                [
                    'type' => 'web_search_preview'
                ]
            ],
            'input' => $input,
            'temperature' => 0.7,
            'max_output_tokens' => 150,
            'tool_choice' => 'auto',
            'parallel_tool_calls' => true,
            'store' => true,
        ]);
    }
}
