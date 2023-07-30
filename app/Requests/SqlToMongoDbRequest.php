<?php

namespace App\Requests;

use App\Requests\Contracts\RequestInterface;

class SqlToMongoDbRequest implements RequestInterface
{
    public function __construct(
        protected string $sql
    )
    {
    }

    public function body(): array
    {
        return [
            'inputs' => [
                'sql' => $this->sql,
            ]
        ];
    }

    public function path(): string
    {
        return '/sql-to-mongodb-query-converter.html';
    }

    public function method(): string
    {
        return 'POST';
    }
}
