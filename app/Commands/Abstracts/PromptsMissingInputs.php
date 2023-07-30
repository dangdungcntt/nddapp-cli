<?php

namespace App\Commands\Abstracts;

use Illuminate\Console\Parser;
use LaravelZero\Framework\Commands\Command;
use function Laravel\Prompts\text;

abstract class PromptsMissingInputs extends Command
{
    abstract protected function getSignature(): string;

    protected function argumentWithPrompt(string $name, string $prompt): string
    {
        $arg = $this->argument($name);

        if (empty($arg)) {
            $arg = text($prompt, required: true);
        }

        return $arg;
    }

    protected function getArguments(): array
    {
        return Parser::parse($this->getSignature())[1];
    }

    protected function getOptions(): array
    {
        return Parser::parse($this->getSignature())[2];
    }
}
