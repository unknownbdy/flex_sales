<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class verifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $userName;
    public $otp;

    public function __construct( $otp,$userName)
    {
        $this->userName = $userName;
        $this->otp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('deepak.dhakad@gmail.com', 'Insijam')
                    ->subject('OTP')
                    ->view('mails.verify_mail'); // Create a blade template for the email content
    }
}
