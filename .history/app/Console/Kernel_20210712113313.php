<?php

namespace App\Console;

use App\Console\Command\command_name;
use App\Console\Command\Notify;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        
        //استدعاء الدالة التي بها الأمر أستعدادا لإعطاءعا مواقيت التنفيق في الدالة التالية
        //\App\Console\Commands\command_name::class,
        \App\Console\Commands\Notify::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        
        $schedule->command(command: 'notify:email')
                    ->Daily();
        $schedule->command(command: 'user:expire')
                  ->everyMinute();

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
