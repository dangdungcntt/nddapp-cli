<?php

namespace App\Commands\Generators;

use App\Commands\Abstracts\CommonStringProcessor;

class SHA1Generator extends CommonStringProcessor
{
    protected $signature = 'sha1 {string}';

    protected $description = 'Generate SHA1 from string';

    public function process(string $string, array $options): string
    {
        return sha1($string);
    }
}
