<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Task_assigned extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $project)
    {
        $this->user = $user;
        $this->project = $project;
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
        $subject = 'You have been assigned Tasks';
        return $this->view('emails.task_assigned')->with('project',$this->project)->with('user',$this->user)
        ->from($address, $name) 
        ->subject($subject);
    }
}
