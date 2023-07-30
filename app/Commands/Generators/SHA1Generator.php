<?php

namespace App\Commands\Generators;

use App\Commands\Abstracts\CommonStringProcessor;

class SHA1Generator extends CommonStringProcessor
{
    protected $name = 'sha1';

    protected $description = 'Generate SHA1 from string';

    public function process(string $string, array $options): string
    {
        return sha1($string);
    }
}
