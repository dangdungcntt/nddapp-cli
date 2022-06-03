<?php

namespace App\Commands\Abstracts;

use App\Responses\CommonStringResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

abstract class CommonStringGenerator extends Command
{
    abstract public function generate(string $string): string;

    public function handle(): void
    {
        $content  = $this->generate($this->argument('string'));
        $response = new CommonStringResponse($content);

        render($response->toHtml());
    }
}
