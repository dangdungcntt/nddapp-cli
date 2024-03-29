<?php

namespace App\Requests;

use App\Requests\Contracts\RequestInterface;

class UUIDGeneratorRequest implements RequestInterface
{
    public function __construct(
        protected int $count = 1,
    )
    {
    }

    public function body(): array
    {
        return [
            'inputs' => [
                'number_of_ids' => $this->count,
            ]
        ];
    }

    public function path(): string
    {
        return '/uuid-generator.html';
    }

    public function method(): string
    {
        return 'POST';
    }
}
