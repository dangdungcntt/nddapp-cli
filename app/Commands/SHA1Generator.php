<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringGenerator;

class SHA1Generator extends CommonStringGenerator
{
    protected $signature = 'sha1 {string}';

    protected $description = 'Generate SHA1 from string';

    public function generate(string $string): string
    {
        return sha1($string);
    }
}
