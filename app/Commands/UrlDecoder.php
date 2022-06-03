<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringEncoder;

class UrlDecoder extends CommonStringEncoder
{
    protected $signature = 'url-decode {string}';

    protected $description = 'Url decode string';

    public function executeAction(string $string, array $options): string
    {
        return \urldecode($string);
    }
}
