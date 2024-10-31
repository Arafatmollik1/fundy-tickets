<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $info;

    public function __construct($info)
    {
        $this->info = $info;
    }

    public function build()
    {
        return $this
            ->subject('Payment Confirmation')
            ->view('emails.payment_confirmation')
            ->with(['info' => $this->info]);
    }
}
