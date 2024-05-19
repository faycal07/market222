<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Email;
use App\Mail\SendEmail;
use App\Models\Compagne;
use App\Mail\EnvoyerEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendCompagneEmail;


class SendEmailController extends Controller
{
    /**
     * Show the form for sending mail.
     *
     * @return \Illuminate\View\View
     */
    public function emailsindex()
    {
        return view('emails');
    }


    public function saveEmail(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required',
            'body' => 'required',
            'attachments' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:10240'
        ]);

        if ($request->hasFile('attachments')) {
            // Récupérer le fichier joint
            $attachment = $request->file('attachments');

            // Stocker le fichier dans le stockage local (storage/app)
            $path = $attachment->store('public/attachments');

            // Vous pouvez également stocker le fichier dans un stockage personnalisé ou dans le cloud ici
        } else {
            $path = null; // Aucun fichier joint
        }

        try {
            // Créer un nouvel objet Email et enregistrer dans la base de données
            $email = new Email();
            $email->from = $request->input('from');
            $email->to = $request->input('to');
            $email->subject = $request->input('subject');
            $email->body = $request->input('body');
            $email->attachments = $path; // Ajoutez la logique pour gérer les pièces jointes
            $email->template_id = $request->input('template_id');
            $email->save();

            Mail::to($request->input('to'))->send(new EnvoyerEmail($email));

            return redirect()->route('emails.index')->with('success', 'email est envoyé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erreur lors de l\'envoye de l\'email: ' . $e->getMessage());
        }
    }


    public function deleteEmail($id)
{
    // Récupérer l'email à supprimer
    $email = Email::find($id);

    // Vérifier si l'email existe
    if (!$email) {
        return redirect()->back()->with('error', 'Email n\'existe pas.');
    }

    // Supprimer le fichier joint s'il existe
    if ($email->attachments) {
        Storage::delete($email->attachments);
    }

    // Supprimer l'email de la base de données
    $email->delete();

    return redirect()->back()->with('success', 'Email a été supprimer avec succes.');
}

    /**
     * Send mail.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendemail($id)
    {
        $compagne = Compagne::find($id);
        if (!$compagne) {
            return redirect()->back()->with('error', 'Compagne non trouvée.');
        }

        // Récupérer les IDs des leads associés à la compagne à partir de la table compagne_lead
        $leadIds = DB::table('compagne_lead')
                    ->where('compagne_id', $id)
                    ->pluck('lead_id')
                    ->toArray();

        // Récupérer les adresses e-mail des leads associés à la compagne
        $leadEmails = Lead::whereIn('id', $leadIds)->pluck('email')->toArray();

        // Dispatch the job to the queue
        SendCompagneEmail::dispatch($compagne, $leadEmails);

        return redirect()->back()->with('success', 'Les e-mails sont en cours d\'envoi.');
    }

}
