<?php

namespace App\Commands\Generators;

use App\NddApp;
use App\Requests\ObjectIdGeneratorRequest;
use App\Responses\CommonStringResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

class ObjectIdGenerator extends Command
{
    protected $signature = 'object-id {count=1} {--c|count}';

    protected $description = 'Generate MongoDB ObjectID';

    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new ObjectIdGeneratorRequest(
            count: $this->option('count') ?? $this->argument('count'),
        ));
        $response = CommonStringResponse::create($apiResponse);

        render($response->toHtml());
    }
}
