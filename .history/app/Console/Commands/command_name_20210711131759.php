<?php

namespace App\Console\Commands;

use App\Users;
use Illuminate\Console\Command;
use Illuminate\Console\Command;

class command_name extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

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
       $users = User::where('expire', 0) -> get();
       foreach ($users as $user){

        $user ->update(['expire' => 1]);

       }


    }
}
