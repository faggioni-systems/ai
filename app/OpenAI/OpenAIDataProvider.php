<?php

namespace App\OpenAI;

use App\OpenAI\DTOs\OpenAIResponseDTO;

class OpenAIDataProvider
{
    private Connector $connector;

    public function __construct(Connector $connector)
    {
        $this->connector = new Connector();
    }
    public function getResponse(string $input): OpenAIResponseDTO
    {
        $response = $this->connector->getResponse($input);

    }
}
