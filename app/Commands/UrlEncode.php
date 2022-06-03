<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringEncoder;

class UrlEncode extends CommonStringEncoder
{
    protected $signature = 'url-encode {string}';

    protected $description = 'Url encode string';

    public function executeAction(string $string, array $options): string
    {
        return \urlencode($string);
    }
}
