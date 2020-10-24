<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Arya Noble - You Have Received Our Form!")
            ->attachFromStorage('form/application.xls', 'DGV_Application.xls', [
                'mime' => 'application/vnd.ms-excel'
            ])
            ->markdown('emails.FormEmail');
    }
}
