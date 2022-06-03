<?php

namespace App\Commands\Abstracts;

use App\Responses\CommonStringResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

abstract class CommonStringEncoder extends Command
{
    abstract public function executeAction(string $string, array $options): string;

    public function handle(): void
    {
        $content  = $this->executeAction($this->argument('string'), $this->option());
        $response = new CommonStringResponse($content);

        render($response->toHtml());
    }
}
