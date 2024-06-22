<?php
// App\Mail\LeadWonEmail.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadWonEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'))
                    ->subject('Notification de lead gagné')
                    ->view('emailleadwon')
                    ->with(['lead' => $this->lead]);
    }
}
