<?php

namespace App\OpenAI\DTOs;

readonly class OpenAIOutputContent
{
    public function __construct(
        public readonly string $type,
        public readonly string $text,
        public readonly string $annotations
    )
    { }
}
