<?php

namespace App\Mail;

use App\Models\Compagne;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $compagne;

    public function __construct(Compagne $compagne)
    {
        $this->compagne = $compagne;
    }

    public function build()
    {
        // Chemin de l'image dans le stockage
        $imagePath = storage_path('app/' . $this->compagne->image);

        // Vérifier si l'image existe dans le stockage
        if (file_exists($imagePath)) {
            // L'image existe, obtenir le contenu et le type MIME de l'image
            $imageContent = file_get_contents($imagePath);
            $mime = mime_content_type($imagePath);

            // Utiliser l'adresse e-mail de l'expéditeur par défaut
            $senderEmail = config('mail.from.address');

                    return $this->from($senderEmail)
                        ->view('compagneemail', [
                            'imageContent' => $imageContent,
                            'mime' => $mime,
                        ])
                        ->attachData($imageContent, 'image.jpg', ['mime' => $mime]);
        } else {
            // Gérer l'absence de l'image en envoyant un email d'erreur
            throw new \Exception("L'image spécifiée n'existe pas : $imagePath");
        }
    }
}
