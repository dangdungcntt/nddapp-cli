<?php

namespace App\Responses;

interface ResponseInterface
{
    public function toHtml(): string;
}
