<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TaskController;

class MondayTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mondays:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this task on mondays';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $eventChecker = new TaskController();

        $eventChecker->mondays();

        $this->info('Task successfully executed');
    }
}
