<?php

namespace App\Commands\Converters;

use App\NddApp;
use App\Requests\SqlToMongoDbRequest;
use App\Responses\SqlToMongoDbQueryResponse;
use LaravelZero\Framework\Commands\Command;

use function Termwind\render;

class SqlToMongoDbQuery extends Command
{
    protected $signature = 'sql2mongo {sql} {--p|pretty}';

    protected $description = 'Convert SQL query to find/aggregate MongoDB query';

    public function handle(NddApp $nddApp): void
    {
        $apiResponse = $nddApp->send(new SqlToMongoDbRequest(
            sql: $this->argument('sql')
        ));
        $response    = SqlToMongoDbQueryResponse::create($apiResponse);

        render($this->option('pretty') ? $response->toPrettyHtml() : $response->toHtml());
    }
}
