<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringProcessor;

class SHA384Generator extends CommonStringProcessor
{
    protected $signature = 'sha384 {string}';

    protected $description = 'Generate SHA384 from string';

    public function process(string $string, array $options): string
    {
        return hash("sha384", $string);
    }
}
