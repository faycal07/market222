<?php

namespace App\Listeners;

use App\Events\LeadCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\LeadInsertedEmail; // Assurez-vous d'importer la classe du Mailable approprié
use Illuminate\Support\Facades\Mail;

class SendLeadCreated implements ShouldQueue
{

    use InteractsWithQueue;

    public $tries = 5;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LeadCreated $event): void
    {
        // Récupérer le lead créé à partir de l'événement
        $lead = $event->lead;

        // Envoyer un e-mail au lead avec les détails
        Mail::to($lead->email)->send(new LeadInsertedEmail($lead));

        // Vous pouvez également effectuer d'autres opérations avec le lead ici
    }
}
