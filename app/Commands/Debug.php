<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class Debug extends Command
{
    protected $signature = 'debug';

    protected $description = 'Log config';

    public function handle(): void
    {
        $this->info(json_encode(config()->all(), JSON_PRETTY_PRINT));
    }
}
