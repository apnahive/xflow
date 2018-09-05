<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Form_sign extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form, $user)
    {
        $this->form = $form;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        dd($this->form);
        $address = 'noreply@xflow.com'; 
        $name = 'X-Flow'; 
        $subject = 'Project Form need sign'; 
        return $this->view('emails.sign')->with('form',$this->form)->with('user',$this->user)
        ->from($address, $name) 
        ->subject($subject);

        /*return $this->view('view.name');*/
    }
}
