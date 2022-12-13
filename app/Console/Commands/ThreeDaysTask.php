<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TaskController;

class ThreeDaysTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'threedays:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this task eveery three days';

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

        $eventChecker->weeklyOnMondayWednesdayFriday();

        $this->info('Task successfully executed');
    }
}
