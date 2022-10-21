<?php

namespace App\Commands\Transformers;

use App\Commands\Abstracts\CommonStringProcessor;
use Illuminate\Support\Str;

class ToSnakeCaseTransformer extends CommonStringProcessor
{
    protected $signature = 'snake {string} {--d|dot}';
    protected $description = 'Convert string to snake case';

    public function process(string $string, array $options): string
    {
        $string = trim($string);

        if (isset($options['dot']) && $options['dot']) {
            $string = str_replace('.', '_', $string);
        }

        return Str::snake(trim($string));
    }
}
