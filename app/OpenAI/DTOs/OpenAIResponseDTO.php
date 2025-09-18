<?php

namespace App\OpenAI\DTOs;

readonly class OpenAIResponseDTO
{
    public function __construct(
        public string $id,
        public string $object,
        public int $createdAt,
        public string $status,
        public string $model,
        public string $outputText,
        public array $output
    ) {}
}
