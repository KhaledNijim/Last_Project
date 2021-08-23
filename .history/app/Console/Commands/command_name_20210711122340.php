<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

App\Console\Commands\command_name::class;

class command_name extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
       User::where('expire', 0) -> get();
       foreach ($users as $user){

        $user ->update(['xepire' => 1]);

       }


    }
}
