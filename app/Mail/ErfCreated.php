<?php

namespace App\Mail;

use App\Models\Erf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ErfCreated extends Mailable
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
        return $this->subject("Arya Noble - You Have New ERF Waiting for Your Approval!")
            ->markdown('emails.ErfCreated');
    }
}
