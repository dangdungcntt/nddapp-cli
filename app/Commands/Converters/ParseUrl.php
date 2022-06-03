<?php

namespace App\Commands\Converters;

use App\NddApp;
use App\Requests\UrlParserRequest;
use App\Responses\UrlParserResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

class ParseUrl extends Command
{
    protected $signature = 'parse-url {url}';

    protected $description = 'Parse url info';

    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new UrlParserRequest(
            url: $this->argument('url'),
        ));
        $response    = UrlParserResponse::create($apiResponse);

        render($response->toHtml());
    }
}
