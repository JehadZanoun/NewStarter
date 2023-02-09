<?php

namespace App\Console;

use App\Console\Commands\expiration;
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

    protected $commands = [
        expiration::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('user:expire')->everyMinute();


        // $schedule->command('inspire')->hourly();

//        $schedule->call(function () {
//            DB::table('users')-> update(['expire' => 1]);
//        })->everyMinute();

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
    }

}
