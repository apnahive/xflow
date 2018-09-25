<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class User_approved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'noreply@xflow.com'; 
        $name = 'X-Flow'; 
        $subject = 'Admin has approved your registration'; 
        return $this->view('emails.user_approved')->with('user',$this->user)
        ->from($address, $name) 
        ->subject($subject);
    }
}
