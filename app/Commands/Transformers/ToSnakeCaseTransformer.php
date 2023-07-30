<?php

namespace App\Commands\Transformers;

use App\Commands\Abstracts\CommonStringProcessor;
use Illuminate\Support\Str;

class ToSnakeCaseTransformer extends CommonStringProcessor
{
    protected $name = 'snake';
    protected $description = 'Convert string to snake case';

    protected function getSignature(): string
    {
        return parent::getSignature() . ' {--d|dot}';
    }

    public function process(string $string, array $options): string
    {
        $string = trim($string);

        if (isset($options['dot']) && $options['dot']) {
            $string = str_replace('.', '_', $string);
        }

        return Str::snake(trim($string));
    }
}
