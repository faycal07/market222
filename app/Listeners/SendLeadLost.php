<?php

namespace App\Listeners;

use App\Events\LeadLost;
use App\Mail\LeadLostEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLeadLost implements ShouldQueue
{
    use InteractsWithQueue;

    public $tries = 5;

    /**
     * Handle the event.
     */
    public function handle(LeadLost $event): void
    {
        $lead = $event->lead;
        Mail::to($lead->email)->send(new LeadLostEmail($lead));
    }
}
