<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Task_completed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($task)
    {
        $this->task = $task;
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
        $subject = 'Task has been completed';
        return $this->view('emails.task_completed')->with('task',$this->task)
        ->from($address, $name) 
        ->subject($subject);
    }
}
