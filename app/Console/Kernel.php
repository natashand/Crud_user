<?php

namespace App\Console;

use App\Console\Commands\ColorParseCommand;
use App\Console\Commands\ParserCommand;
use App\Console\Commands\ParseTitle;
use App\Console\Commands\UserDelCommand;
use App\Console\Commands\UserPostCommand;
use App\Console\Commands\UserPutCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\UserGetCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        UserGetCommand::class,
        UserDelCommand::class,
        UserPostCommand::class,
        UserPutCommand::class,
        ParserCommand::class,
        ColorParseCommand::class,
        ParseTitle::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
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
