<?php

namespace App\Requests;

interface RequestInterface
{
    public function path(): string;

    public function method(): string;

    public function body(): array;
}
