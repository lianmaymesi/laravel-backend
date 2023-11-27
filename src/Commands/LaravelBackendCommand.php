<?php

namespace Lianmaymesi\LaravelBackend\Commands;

use Illuminate\Console\Command;

class LaravelBackendCommand extends Command
{
    public $signature = 'laravel-backend';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
