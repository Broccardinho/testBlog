<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Public property to hold the form data

    public function __construct($data)
    {
        $this->data = $data; // Pass the form data to the Mailable
    }

    public function build()
    {
        return $this->subject('New Contact Form Submission') // Email subject
        ->view('emails.contact-form') // Blade template for the email body
        ->with(['data' => $this->data]); // Pass data to the view
    }
}
