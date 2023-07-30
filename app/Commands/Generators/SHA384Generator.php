<?php

namespace App\Commands\Generators;

use App\Commands\Abstracts\CommonStringProcessor;

class SHA384Generator extends CommonStringProcessor
{
    protected $name = 'sha384';

    protected $description = 'Generate SHA384 from string';

    public function process(string $string, array $options): string
    {
        return hash("sha384", $string);
    }
}
