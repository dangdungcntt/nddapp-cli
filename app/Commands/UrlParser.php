<?php

namespace App\Commands;

use App\NddApp;
use App\Requests\UrlParserRequest;
use App\Responses\UrlParserResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

class UrlParser extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'url-parser {url}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Parse url info';

    /**
     * Execute the console command.
     *
     * @param  \App\NddApp  $nddApp
     * @return void
     * @throws \Exception
     */
    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new UrlParserRequest(
            url: $this->argument('url'),
        ));
        $response    = UrlParserResponse::create($apiResponse);

        render($response->toHtml());
    }
}
