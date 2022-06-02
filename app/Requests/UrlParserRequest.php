<?php

namespace App\Requests;

class UrlParserRequest implements RequestInterface
{
    public function __construct(
        protected string $url,
    ) {
    }

    public function body(): array
    {
        return [
            'inputs' => [
                'url' => $this->url,
            ]
        ];
    }

    public function path(): string
    {
        return '/url-builder.html';
    }

    public function method(): string
    {
        return 'POST';
    }
}
