<?php

namespace App\Commands;

use App\NddApp;
use App\Requests\ObjectIdGeneratorRequest;
use App\Requests\PasswordGeneratorRequest;
use App\Responses\CommonStringResponse;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

class ObjectIdGenerator extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'object-id {count=1}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Generate MongoDB ObjectID';

    /**
     * Execute the console command.
     *
     * @param  \App\NddApp  $nddApp
     * @return void
     * @throws \Exception
     */
    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new ObjectIdGeneratorRequest(
            count: $this->argument('count'),
        ));
        $response    = CommonStringResponse::create($apiResponse);

        render($response->toHtml());
    }
}
