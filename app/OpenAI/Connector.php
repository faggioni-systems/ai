<?php

namespace App\OpenAI;

use OpenAI\Responses\Responses\CreateResponse;
use OpenAI\Client;
use OpenAI;

class Connector
{
    private Client $client;
    private OpenAIDataHelper $helper;

    public function __construct()
    {
        $this->client = OpenAI::client(
            config('services.openai.token')
        );
        $this->helper = new OpenAIDataHelper();
    }

    public function getResponse(string $input): CreateResponse
    {
        return $this->client->responses()->create(
            $this->helper->getResponsesParams($input)
        );
    }
}
