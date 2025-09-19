<?php

namespace App\OpenAI;

use OpenAI;
use OpenAI\Client;
use OpenAI\Responses\Responses\CreateResponse;

class Connector
{
    private Client $client;

    private OpenAIDataHelper $helper;

    public function __construct()
    {
        $this->client = OpenAI::client(
            config('services.openai.token')
        );
        $this->helper = new OpenAIDataHelper;
    }

    public function getResponse(string $input): CreateResponse
    {
        return $this->client->responses()->create(
            $this->helper->getResponsesParams($input)
        );
    }
}
