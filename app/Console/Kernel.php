<?php

namespace App\Console;

use App\Jobs\PruneOldPostsJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\PruneOldPostsJob as deleteOld;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        
        // $schedule->job(new PruneOldPostsJob())->daily();

        $schedule->call(function () {

            deleteOld::dispatch();
            
        })->daily();

        $schedule->command('make:work')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
