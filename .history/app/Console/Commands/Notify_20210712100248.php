<?php

namespace App\Console\Commands;
use App\Models\User;

use Illuminate\Console\Command;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Notify:email';

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
     
       // $users = User::celect('email') -> get();
        $emails = User::plunk('email') -> toArray();

        foreach ($emails as $email){
            // كيف ترسل إيميل للمستخدم
 
         $user ->update(['expire' => 1]);

    }
}
