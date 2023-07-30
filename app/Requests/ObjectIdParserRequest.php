<?php

namespace App\Requests;

use App\Requests\Contracts\RequestInterface;

class ObjectIdParserRequest implements RequestInterface
{
    public function __construct(
        protected string $objectId,
    )
    {
    }

    public function body(): array
    {
        return [
            'inputs' => [
                'object_id' => $this->objectId,
            ]
        ];
    }

    public function path(): string
    {
        return '/object-id-parser-converter.html';
    }

    public function method(): string
    {
        return 'POST';
    }
}
