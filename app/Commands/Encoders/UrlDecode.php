<?php

namespace App\Commands\Encoders;

use App\Commands\Abstracts\CommonStringProcessor;

class UrlDecode extends CommonStringProcessor
{
    protected $signature = 'url-decode {string}';

    protected $description = 'Url decode string';

    public function process(string $string, array $options): string
    {
        return \urldecode($string);
    }
}
