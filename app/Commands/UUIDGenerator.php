<?php

namespace App\Commands;

use App\NddApp;
use App\Requests\UUIDGeneratorRequest;
use App\Responses\CommonStringResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

class UUIDGenerator extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'uuid {count=1}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Generate random uuid';

    /**
     * Execute the console command.
     *
     * @param  \App\NddApp  $nddApp
     * @return void
     * @throws \Exception
     */
    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new UUIDGeneratorRequest(
            count: $this->argument('count'),
        ));
        $response    = CommonStringResponse::create($apiResponse);

        render($response->toHtml());
    }
}
