<?php

namespace App\Commands\Generators;

use App\Commands\Abstracts\CommonStringProcessor;

class MD5Generator extends CommonStringProcessor
{
    protected $signature = 'md5 {string}';

    protected $description = 'Generate MD5 from string';

    public function process(string $string, array $options): string
    {
        return md5($string);
    }
}
