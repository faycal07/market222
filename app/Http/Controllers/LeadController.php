<?php

namespace App\Http\Controllers;


use App\Models\Lead;

use App\Models\Product;
use App\Models\Workflow;
use App\Events\LeadUpdate;
use App\Events\LeadCreated;
use App\Models\Opportunite;
use Illuminate\Http\Request;



class LeadController extends Controller
{

    // public function pageajouterlead() {
    //    $opportunites = Opportunite::all();
    //    $products = Product::all();
    //    return view('ajouterlead', compact('products','opportunites'));
    // }

    public function pagemodifierlead(Lead $lead) {
        $opportuniteId = $lead->opportunite_id;



        $products = Product::all();
        $opportunites = Opportunite::all();
        $selectedOpportuniteId = $lead->opportunite_id;

        return view('pagemodifierlead', compact('lead','products','opportunites','selectedOpportuniteId'));
     }


    public function pagelead() {
        $opportunites = Opportunite::all();
        $products = Product::all();
        $opportunites_et_leads = Opportunite::with('leads')->get();
        // $leads = Lead::all();
  // Fetch all leads along with their related information
  $leads = Lead::with(['type', 'source', 'opportunite', 'stage', 'products'])->get();

  // Pass the leads data to the view
  return view('leads', compact('leads','products','opportunites','opportunites_et_leads'));


     }


    public function ajouterlead(Request $request)
    {
        // Valider les données soumises
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email',
            'tel' => 'required|string',
            'types_id' => 'required|exists:lead_types,id',
            'sources_id' => 'required|exists:lead_sources,id',
            'produit_id' => 'required|array', // "produit_id" doit être un tableau
            'produit_id.*' => 'exists:products,id', // Chaque élément de "produit_id" doit exister dans la table "products"
            'opportunite_id' => 'required|exists:opportunites,id',

        ]);
        $opportuniteId = $request->input('opportunite_id');

        // Récupérer le stage ayant le sort le plus petit pour l'opportunité sélectionnée
       $stageId = Opportunite::find($opportuniteId)->stages()->orderBy('sort')->first()->id;
        $lead = new Lead([
            'nom' => $request->nom,
            'email' => $request->email,
            'tel' => $request->tel,
            'types_id' => $request->types_id,
            'sources_id' => $request->sources_id,
            'opportunite_id' => $opportuniteId,
            'stage_id' => $stageId,

        ]);

        // Sauvegarder le nouveau lead
        $lead->save();


        $workflows = Workflow::where('event', 'LeadCreated')->get();

        foreach ($workflows as $workflow) {
            if ($workflow->status == 'active') {
                LeadCreated::dispatch($lead);
                break; // arrête la boucle après le premier workflow actif trouvé
            }
        }


  // Ajouter les opportunités associées au lead
  if ($request->has('opportunite_id') && is_array($request->opportunite_id)) {
    // Attacher chaque opportunité au lead
    foreach ($request->opportunite_id as $opportuniteId) {
        $lead->opportunite()->attach($opportuniteId);
    }
}
         // Step 2: Retrieve the ID of the newly inserted lead
    $leadId = $lead->id;

    // Step 3: Insert product IDs associated with the lead into the pivot table
    if ($request->has('produit_id') && is_array($request->produit_id)) {
        $productIds = $request->produit_id;

        // Sync the product IDs with the lead using the pivot table
        $lead->products()->sync($productIds);
    }

    // Optionally, you can return a response or redirect the user
    // return response()->json(['message' => 'Lead created with products'], 201);


        // Redirection avec un message de succès
        return redirect()->route('pageleads')->with('success', 'Lead  a été créé avec succès!');
    }


    public function modifierlead(Request $request, Lead $lead)
{
    // Validate the submitted data
    $request->validate([
        'nom' => 'required|string',
        'email' => 'required|email',
        'tel' => 'required|string',
        'types_id' => 'required|exists:lead_types,id',
        'sources_id' => 'required|exists:lead_sources,id',
        'produit_id' => 'required|array', // "produit_id" must be an array
        'produit_id.*' => 'exists:products,id', // Each element of "produit_id" must exist in the "products" table
        'opportunite_id' => 'exists:opportunites,id'
    ]);

    // Get the ID of the selected opportunity
    $opportuniteId = $request->input('opportunite_id');

    // Retrieve the stage with the smallest sort value for the selected opportunity
    $stageId = Opportunite::findOrFail($opportuniteId)->stages()->orderBy('sort')->first()->id;

    // Update the lead attributes
    $lead->nom = $request->nom;
    $lead->email = $request->email;
    $lead->tel = $request->tel;
    $lead->types_id = $request->types_id;
    $lead->sources_id = $request->sources_id;
    $lead->opportunite_id = $opportuniteId;
    $lead->stage_id = $stageId;

    // Save the updated lead
    $lead->save();

    // Dispatch workflow event if active
    $workflows = Workflow::where('event', 'LeadUpdate')->get();
    foreach ($workflows as $workflow) {
        if ($workflow->status == 'active') {
            LeadUpdate::dispatch($lead);
            break; // arrête la boucle après le premier workflow actif trouvé
        }
    }

    // Update the associated products
    if ($request->has('produit_id') && is_array($request->produit_id)) {
        $productIds = $request->produit_id;
        // Sync the product IDs with the lead using the pivot table
        $lead->products()->sync($productIds);
    }

    // Redirect with a success message
    return redirect()->route('pageleads')->with('success', 'Lead a été modifier avec succès !!');
}


public function supprimerlead($id)
{
    // Find the lead by ID
    $lead = Lead::findOrFail($id);

    // Delete the lead
    $lead->delete();

    // Optionally, you can detach all associated products
    $lead->products()->detach();

    // Redirect with a success message
    return redirect()->route('pageleads')->with('success', 'Lead a été supprimeé avec succès!');
 }
public function movelead(Request $request, Lead $lead)
{
    // Validate the request data if necessary
    $request->validate([
        'stage_id' => 'required|exists:stages,id', // Assuming stages table has an 'id' column
    ]);

    // Update the lead's stage
    $lead->stage_id = $request->input('stage_id');
    $lead->save();

    // Redirect back or return a response as needed
    return redirect()->back()->with('success', 'le stage e lead a été mis a jour avec succès.')->with('scrollToDiv', 'suivileads');
}

}
