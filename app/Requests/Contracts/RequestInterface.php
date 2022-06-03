<?php

namespace App\Requests\Contracts;

interface RequestInterface
{
    public function path(): string;

    public function method(): string;

    public function body(): array;
}
