<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class ContactMessage extends Mailable
{
    public $name;
    public $email;
    public $body;

    public function __construct($name, $email, $body)
    {
        $this->name = $name;
        $this->email = $email;
        $this->body = $body;
    }

    public function build()
    {
        return $this->from($this->email, $this->name)
            ->text('emails.contact');
    }
}
