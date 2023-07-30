<?php

namespace App\Commands\Transformers;

use App\Commands\Abstracts\CommonStringProcessor;
use Illuminate\Support\Str;

class ToStudlyCaseTransformer extends CommonStringProcessor
{
    protected $name = 'studly';

    protected $description = 'Convert string to studly case';

    public function process(string $string, array $options): string
    {
        return Str::studly(trim($string));
    }
}
