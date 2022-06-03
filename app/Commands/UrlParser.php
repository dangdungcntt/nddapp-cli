<?php

namespace App\Commands;

use App\NddApp;
use App\Requests\UrlParserRequest;
use App\Responses\UrlParserResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

class UrlParser extends Command
{
    protected $signature = 'url-parser {url}';

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
