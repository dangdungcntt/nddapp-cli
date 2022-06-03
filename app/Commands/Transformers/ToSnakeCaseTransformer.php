<?php

namespace App\Commands\Transformers;

use App\Commands\Abstracts\CommonStringProcessor;
use Illuminate\Support\Str;

class ToSnakeCaseTransformer extends CommonStringProcessor
{
    protected $signature = 'snake {string}';

    protected $description = 'Convert string to snake case';

    public function process(string $string, array $options): string
    {
        return Str::snake(trim($string));
    }
}
