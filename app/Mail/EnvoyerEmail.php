<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvoyerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $senderEmail = config('mail.from.address');
        $email = $this->from($senderEmail)
                      ->view('emails.simpleemail')
                      ->subject($this->email->subject)
                      ->to($this->email->to);

        // Vérifiez si l'attachement existe
        if (!empty($this->email->attachments)) {
            $attachmentPath = storage_path('app/' . $this->email->attachments);
            if (file_exists($attachmentPath)) {
                $email->attach($attachmentPath, [
                    'as' => 'attachment_name.pdf', // Nom de l'attachement
                    'mime' => 'application/pdf', // Type MIME de l'attachement
                ]);
            }
        }

        return $email;
    }


}
