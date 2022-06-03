<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringGenerator;

class SHA512Generator extends CommonStringGenerator
{
    protected $signature = 'sha512 {string}';

    protected $description = 'Generate SHA512 from string';

    public function generate(string $string): string
    {
        return hash("sha512", $string);
    }
}
