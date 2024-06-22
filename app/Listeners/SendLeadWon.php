<?php
// App\Listeners\SendLeadWon.php
namespace App\Listeners;

use App\Events\LeadWon;
use App\Mail\LeadWonEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLeadWon implements ShouldQueue
{
    public $tries = 5;

    public function handle(LeadWon $event): void
    {
        $lead = $event->lead;
        Mail::to($lead->email)->send(new LeadWonEmail($lead));
    }
}
