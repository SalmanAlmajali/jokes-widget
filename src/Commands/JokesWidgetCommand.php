<?php

namespace SalmanAlmajali\JokesWidget\Commands;

use Illuminate\Console\Command;

class JokesWidgetCommand extends Command
{
    public $signature = 'jokes-widget';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
