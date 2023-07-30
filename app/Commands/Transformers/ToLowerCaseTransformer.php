<?php

namespace App\Commands\Transformers;

use App\Commands\Abstracts\CommonStringProcessor;
use Illuminate\Support\Str;

class ToLowerCaseTransformer extends CommonStringProcessor
{
    protected $name = 'lower';

    protected $description = 'Convert string to lower case';

    public function process(string $string, array $options): string
    {
        return Str::lower(trim($string));
    }
}
