<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */




    protected function schedule(Schedule $schedule)
    {
        $schedule->command('everyday:run')->daily();
        $schedule->command('fifthofmarchyear:run')->yearlyOn(3, 5, '00:00');
        $schedule->command('fifthofthemonth:run')->monthlyOn(5, '00:00');
        $schedule->command('mondays:run')->mondays();
        $schedule->command('threedays:run')->cron('0 0 * * 1,3,5');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');

        Commands\EverydayTask::class;
        Commands\FifthOfMarchInTheYearTask::class;
        Commands\FifthOfTheMonthTask::class;
        Commands\MondayTask::class;
        Commands\ThreeDaysTask::class;
    }
}
