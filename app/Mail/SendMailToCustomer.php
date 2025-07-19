<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $dataToCustomer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataToCustomer)
    {
        $this->dataToCustomer = $dataToCustomer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('golekpetshop.id@gmail.com')
            ->subject('Booking Confirmation')
            ->view('emails.to_customer')
            ->with('data', $this->dataToCustomer);
    }
}
