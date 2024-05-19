<?php
namespace App\Jobs;

use App\Mail\SendEmail;
use App\Models\Compagne;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCompagneEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $compagne;
    protected $leadEmails;

    public function __construct(Compagne $compagne, array $leadEmails)
    {
        $this->compagne = $compagne;
        $this->leadEmails = $leadEmails;
    }

    public function handle()
    {
        foreach ($this->leadEmails as $leadEmail) {
            Mail::to($leadEmail)->send(new SendEmail($this->compagne));
        }
    }
}
