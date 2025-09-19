<?php

namespace App\OpenAI\DTOs;

readonly class OpenAIOutput
{
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly string $status,
        public readonly string $role,
        public readonly array $content,
    ) {}
}
