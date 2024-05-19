<?php

namespace App\Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeadInsertedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Utiliser l'adresse e-mail de l'expéditeur par défaut définie dans la configuration de messagerie
        $senderEmail = config('mail.from.address');

        return $this->from($senderEmail)
                    ->subject('Lead create Notification')
                    ->view('emailleadcreated');
    }
}
