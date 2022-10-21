<?php

namespace App\Commands\Converters;

use App\NddApp;
use App\Requests\ObjectIdParserRequest;
use App\Responses\ObjectIdParserResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\{render};

class ParseObjectId extends Command
{
    protected $signature = 'parse-object-id {objectId}';
    protected $description = 'Parse ObjectId info';

    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(
            new ObjectIdParserRequest(
                objectId: $this->argument('objectId'),
            )
        );
        $response    = ObjectIdParserResponse::create($apiResponse);

        render($response->toHtml());
    }
}
