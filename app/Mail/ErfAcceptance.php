<?php

namespace App\Mail;

use App\Models\Erf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ErfAcceptance extends Mailable
{
    use Queueable, SerializesModels;

    public $erf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Erf $erf)
    {
        $this->erf = $erf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("You have new ERF waiting for your review!")
            ->view('emails.erfAcceptance');
    }
}
