<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Lead;
use App\Models\Compagne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SmsController extends Controller
{
    public function sendsms($id)
{
    // Récupérer la compagne correspondant à l'ID donné
    $compagne = Compagne::find($id);

    // Vérifier si la compagne existe
    if (!$compagne) {
        return response()->json(['error' => 'Compagne non trouvée.', 'status' => 404]);
    }

    // Initialiser un tableau pour stocker les résultats de l'envoi de SMS
    $results = [];

    $basic  = new \Vonage\Client\Credentials\Basic("c97c5fb0", "3bhmVrtxj3z5Ynr2");
    $client = new \Vonage\Client($basic);

    // Récupérer les IDs des leads à partir de la table d'association compagne_lead
    $leadIds = DB::table('compagne_lead')->where('compagne_id', $id)->pluck('lead_id');

    // Récupérer tous les leads correspondants aux IDs
    $leads = Lead::whereIn('id', $leadIds)->get();

    // Parcourir les leads de la compagne
    foreach ($leads as $lead) {
        // Vérifier si la personne existe et si elle a un numéro de téléphone
        if ($lead && isset($lead->tel)) {
            // Ajout du var_dump pour débogage
            var_dump($lead->tel);

            // Récupérer directement le numéro de téléphone
            $phoneNumber = $lead->tel;

            // Envoyer le SMS
            $message = $client->sms()->send(
                new \Vonage\SMS\Message\SMS(to: $phoneNumber, from: 'www.toudja.dz', message: $compagne->text_compagne)
            );

            // Ajouter le résultat de l'envoi de SMS au tableau des résultats
            $results[] = ['to' => $phoneNumber, 'status' => $message->current()->getStatus()];
        }
    }

    return redirect()->back()->with('success', 'SMS envoyés avec succès.');
}




   public function showChatifyPage()
{
    $id = Auth::id();

    return view('vendor.Chatify.pages.app', [
        'id' => $id,

    ]);
}
}
