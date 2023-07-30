<?php

namespace App\Commands\Converters;

use App\Commands\Abstracts\PromptsMissingInputs;
use App\NddApp;
use App\Requests\SqlToMongoDbRequest;
use App\Responses\SqlToMongoDbQueryResponse;

use function Termwind\render;

class SqlToMongoDbQuery extends PromptsMissingInputs
{
    protected $name = 'sql2mongo';

    protected $description = 'Convert SQL query to find/aggregate MongoDB query';


    protected function getSignature(): string
    {
        return '{sql?} {--p|pretty}';
    }

    /**
     * @throws \Exception
     */
    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new SqlToMongoDbRequest(
            sql: $this->argumentWithPrompt('sql', 'Enter SQL query:'),
        ));
        $response = SqlToMongoDbQueryResponse::create($apiResponse);

        render($this->option('pretty') ? $response->toPrettyHtml() : $response->toHtml());
    }
}
