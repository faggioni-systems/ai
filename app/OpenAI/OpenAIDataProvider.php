<?php

namespace App\OpenAI;

use App\OpenAI\DTOs\OpenAIOutput;
use App\OpenAI\DTOs\OpenAIOutputContent;
use App\OpenAI\DTOs\OpenAIResponseDTO;

class OpenAIDataProvider
{
    private Connector $connector;


    public function __construct()
    {
        $this->connector = new Connector();
    }

    public function getResponse(string $input): OpenAIResponseDTO
    {
        $response = $this->connector->getResponse($input);
        return new OpenAIResponseDTO(
            id: $response->id,
            object: $response->object,
            createdAt: $response->createdAt,
            status: $response->status,
            model: $response->model,
            outputText: $response->outputText,
            output: collect($response->output)->map(function ($outout) {
                return new OpenAIOutput(
                    id: $outout->id,
                    type: $outout->type,
                    status: $outout->status,
                    role: $outout->role,
                    content: collect($outout->content)->map(function ($content) {
                        return new OpenAIOutputContent(
                            type: $content->type,
                            text: $content->text
                        );
                    })->toArray()
                );
            })->toArray()
        );
    }
}
