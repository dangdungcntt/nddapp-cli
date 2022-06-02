<?php

namespace App\Commands;

use App\NddApp;
use App\Requests\PasswordGeneratorRequest;
use App\Responses\CommonStringResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

class PasswordGenerator extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'password {length=24} {--c|count=1} {--s|symbols=0} {--N|number=1} {--l|lower=1} {--u|upper=1}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Generate random password';

    /**
     * Execute the console command.
     *
     * @param  \App\NddApp  $nddApp
     * @return void
     * @throws \Exception
     */
    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new PasswordGeneratorRequest(
            length: $this->argument('length'),
            count: $this->option('count'),
            symbols: $this->option('symbols') ?? true,
            number: $this->option('number'),
            lower: $this->option('lower'),
            upper: $this->option('upper'),
        ));
        $response    = CommonStringResponse::create($apiResponse);

        render($response->toHtml());
    }
}
