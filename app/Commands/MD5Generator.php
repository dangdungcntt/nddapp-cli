<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringGenerator;

class MD5Generator extends CommonStringGenerator
{
    protected $signature = 'md5 {string}';

    protected $description = 'Generate MD5 from string';

    public function generate(string $string): string
    {
        return md5($string);
    }
}
