<?php

namespace App\Commands\Transformers;

use App\Commands\Abstracts\CommonStringProcessor;
use Illuminate\Support\Str;

class ToCamelCaseTransformer extends CommonStringProcessor
{
    protected $signature = 'camel {string}';

    protected $description = 'Convert string to camel case';

    public function process(string $string, array $options): string
    {
        return Str::camel(trim($string));
    }
}
