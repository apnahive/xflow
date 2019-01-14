<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Candidate_interview_confirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job, $user)
    {
        $this->job = $job;
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
        $subject = 'Candidate has confirmed the date of interview'; 
        return $this->view('emails.interview_confirmed')->with('job',$this->job)->with('user',$this->user)
        ->from($address, $name) 
        ->subject($subject);
    }
}
