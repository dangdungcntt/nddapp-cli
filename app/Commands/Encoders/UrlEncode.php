<?php

namespace App\Commands\Encoders;

use App\Commands\Abstracts\CommonStringProcessor;

class UrlEncode extends CommonStringProcessor
{
    protected $name = 'url-encode';

    protected $description = 'Url encode string';

    public function process(string $string, array $options): string
    {
        return \urlencode($string);
    }
}
