<?php

namespace App\Commands\Transformers;

use App\Commands\Abstracts\CommonStringProcessor;
use Illuminate\Support\Str;

class ToUpperCaseTransformer extends CommonStringProcessor
{
    protected $signature = 'upper {string}';

    protected $description = 'Convert string to upper case';

    public function process(string $string, array $options): string
    {
        return Str::upper(trim($string));
    }
}
