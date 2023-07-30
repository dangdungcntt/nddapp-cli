<?php

namespace App\Commands\Generators;

use App\NddApp;
use App\Requests\UUIDGeneratorRequest;
use App\Responses\CommonStringResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

class UUIDGenerator extends Command
{
    protected $signature = 'uuid {count=1} {--c|count}';

    protected $description = 'Generate random uuid';

    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new UUIDGeneratorRequest(
            count: $this->option('count') ?? $this->argument('count'),
        ));
        $response = CommonStringResponse::create($apiResponse);

        render($response->toHtml());
    }
}
