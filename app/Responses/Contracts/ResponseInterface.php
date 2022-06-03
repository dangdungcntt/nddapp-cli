<?php

namespace App\Responses\Contracts;

interface ResponseInterface
{
    public function toHtml(): string;
}
