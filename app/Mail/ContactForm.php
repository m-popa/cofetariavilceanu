<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $first_name;

    public $last_name;

    public $email;

    public $subject;

    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     * @param  mixed $first_name
     * @param  mixed $last_name
     * @param  mixed $email
     * @param  mixed $subject
     * @param  mixed $message
     */
    public function __construct($first_name, $last_name, $email, $subject, $message)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact');
    }
}
