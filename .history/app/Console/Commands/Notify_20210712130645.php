<?php

namespace App\Console\Commands;
use App\Models\User;
use App\Mail\Notify_email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;


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
     
       // $emails = User::celect('email') -> get();
        $emails = User::pluck('email','mobile') -> toArray();
  
        $data=['title'=> 'رسالة مهمة', 'body'=> 'رسالة ترسل كل فترة زمنية أنا أحدهها مثل أنتهاء الاشتراك بعد شهر'];

        foreach ($emails as $email){
            // كي ف ترسل إيميل للمستخدم
        Mail::To($email)-> send(new Notify_email($data,$email,$mobile));
 
        
    }
}
}
