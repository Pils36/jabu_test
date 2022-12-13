<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TaskController;

class FifthOfTheMonthTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fifthofthemonth:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this task fifth of the month';

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

        $eventChecker->fifthOfTheMonth();

        $this->info('Task successfully executed');
    }
}
