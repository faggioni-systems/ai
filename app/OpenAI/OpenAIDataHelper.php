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
            'input' => $this->getResponseInstruction($input),
            'temperature' => 0.7,
            'max_output_tokens' => 10000,
            'tool_choice' => 'auto',
            'parallel_tool_calls' => true,
            'store' => true,
        ];
    }
    private function getResponseInstruction(string $input): string
    {
        return "You are a helpful project manager. Use the following pieces of
                information to give a broader context on how to fix issues from the developer stand point.
                You don't need to give the answer, you just need to re-write the context on a readable way. Context: "
                . $input;
    }
}
