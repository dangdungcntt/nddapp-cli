<?php

namespace App\Commands\Converters;

use App\Commands\Abstracts\PromptsMissingInputs;
use App\NddApp;
use App\Requests\ObjectIdParserRequest;
use App\Responses\ObjectIdParserResponse;

use function Termwind\{render};

class ParseObjectId extends PromptsMissingInputs
{
    protected $name = 'parse-object-id';
    protected $description = 'Parse ObjectId info';

    protected function getSignature(): string
    {
        return ' {objectId?}';
    }

    /**
     * @throws \Exception
     */
    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(
            new ObjectIdParserRequest(
                objectId: $this->argumentWithPrompt('objectId', 'Enter ObjectId:'),
            )
        );
        $response = ObjectIdParserResponse::create($apiResponse);

        render($response->toHtml());
    }
}
