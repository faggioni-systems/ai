<?php

namespace App\OpenAI;

class OpenAIDataHelper
{
    public function getResponsesParams(string $input): array
    {
        return [
            'model' => 'gpt-4o-mini',
            'tools' => [
                [
                    'type' => 'web_search_preview'
                ]
            ],
            'input' => $input,
            'temperature' => 0.7,
            'max_output_tokens' => 10000,
            'tool_choice' => 'auto',
            'parallel_tool_calls' => true,
            'store' => true,
        ];
    }
}
