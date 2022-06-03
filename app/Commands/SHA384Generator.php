<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringGenerator;

class SHA384Generator extends CommonStringGenerator
{
    protected $signature = 'sha384 {string}';

    protected $description = 'Generate SHA384 from string';

    public function generate(string $string): string
    {
        return hash("sha384", $string);
    }
}
