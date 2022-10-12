<?php

namespace Alghobary\LaravelMacros\Commands;

use Illuminate\Console\Command;

class LaravelMacrosCommand extends Command
{
    public $signature = 'laravel-macros';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
