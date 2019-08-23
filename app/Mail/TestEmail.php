<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'iqah06@gmail.com';
        $subject = 'This is a demo!';
        $name = 'Nor Hazikqah';

        return $this->view('emails.test')
                    ->from($address, $name)
                    ->cc($address, $name) //email cc
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'text' => $this->data['message']
        ]); 

        return $this->view('view.name');
    }
}
