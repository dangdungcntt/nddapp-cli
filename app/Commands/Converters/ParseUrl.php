<?php

namespace App\Commands\Converters;

use App\Commands\Abstracts\PromptsMissingInputs;
use App\NddApp;
use App\Requests\UrlParserRequest;
use App\Responses\UrlParserResponse;

use function Termwind\{render};

class ParseUrl extends PromptsMissingInputs
{
    protected $name = 'parse-url';

    protected $description = 'Parse url info';


    protected function getSignature(): string
    {
        return '{url?}';
    }

    /**
     * @throws \Exception
     */
    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new UrlParserRequest(
            url: $this->argumentWithPrompt('url', 'Enter url:'),
        ));
        $response = UrlParserResponse::create($apiResponse);

        render($response->toHtml());
    }
}
