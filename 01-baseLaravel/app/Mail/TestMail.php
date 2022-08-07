<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $body = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('mailtest');
        return $this->view('mailtest')->attach(url('img/1.jpg'));
    }
}
