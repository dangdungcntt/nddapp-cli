<?php

namespace App\Commands\Generators;

use App\Commands\Abstracts\CommonStringProcessor;

class SHA512Generator extends CommonStringProcessor
{
    protected $signature = 'sha512 {string}';

    protected $description = 'Generate SHA512 from string';

    public function process(string $string, array $options): string
    {
        return hash("sha512", $string);
    }
}
