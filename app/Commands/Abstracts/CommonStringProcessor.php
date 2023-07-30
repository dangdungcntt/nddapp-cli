<?php

namespace App\Commands\Abstracts;

use App\Responses\CommonStringResponse;

use function Termwind\{render};

abstract class CommonStringProcessor extends PromptsMissingInputs
{
    abstract public function process(string $string, array $options): string;

    public function handle(): void
    {
        $content = $this->process($this->argumentWithPrompt('string', 'Enter string:'), $this->option());
        $response = new CommonStringResponse($content);

        render($response->toHtml());
    }

    protected function getSignature(): string
    {
        return '{string?}';
    }
}
