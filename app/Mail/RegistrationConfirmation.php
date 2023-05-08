<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $mobile;

    public function __construct($name, $email, $mobile)
    {
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
    }

    public function build()
    {
        return $this->view('emails.registration_confirmation')
            ->subject('Registration Confirmation');
    }
}