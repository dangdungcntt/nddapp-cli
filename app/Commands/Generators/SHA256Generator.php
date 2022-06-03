<?php

namespace App\Commands\Generators;

use App\Commands\Abstracts\CommonStringProcessor;

class SHA256Generator extends CommonStringProcessor
{
    protected $signature = 'sha256 {string}';

    protected $description = 'Generate SHA256 from string';

    public function process(string $string, array $options): string
    {
        return hash("sha256", $string);
    }
}
