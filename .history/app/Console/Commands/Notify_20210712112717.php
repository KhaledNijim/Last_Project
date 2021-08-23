<?php

namespace App\Console\Commands;
use App\Models\User;
use App\Mail\Notify_email;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sind email for Users';

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
        $emails = User::pluck('email') -> ToArray();
        Mail::To(kalednjm06@gmail.com)-> send(new App\Mail\Notify_email());
        //$data=['title'=> 'progrmming', 'body'=> 'php'];
        foreach ($emails as $email){
            // كي ف ترسل إيميل للمستخدم
            Mail::To(kalednjm06@gmail.com)-> send(new App\Mail\Notify_email());
 

    }
}
}
