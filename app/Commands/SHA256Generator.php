<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringGenerator;

class SHA256Generator extends CommonStringGenerator
{
    protected $signature = 'sha256 {string}';

    protected $description = 'Generate SHA256 from string';

    public function generate(string $string): string
    {
        return hash("sha256", $string);
    }
}
