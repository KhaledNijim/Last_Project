<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use resources\views;

class Notify_email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */ 
    public $data2;
    public $data3;
    public $data4;

    public function __construct($data,$email,$mobile)
    {
        $this -> data2  =$data;
        $this -> data3  =$email;
        $this -> data4  =$mobile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(view :'emails.emailusers');
    }
}
