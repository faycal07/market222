<?php

namespace App\Http\Controllers;

use App\Models\Workflow;
use App\Events\LeadCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the workflows.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workflows = Workflow::all();
        return view('workflows', compact('workflows'));
    }

    public function pagemodifier($id)
    {
        $workflow = Workflow::findOrFail($id);
        return view('modifierworkflow', compact('workflow'));
    }


     /**
     * Store a newly created workflow in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Valider les données soumises
    $request->validate([
        'name' => 'required|string',
        'event' => 'required|string', // Ajouter "LeadCreated" à la liste des valeurs autorisées
    ]);
    try {
    // Créer le workflow en utilisant les données du formulaire
    $workflow = Workflow::create([
        'name' => $request->input('name'),
        'event' => $request->input('event'),
        'status' => 'active', // Statut par défaut à la création
    ]);


    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'Workflow créé avec succès!');

} catch (\Exception $e) {
    return redirect()->back()->withInput()->with('error', 'Erreur lors de la creation de workflow ' . $e->getMessage());
}
}
/**
     * Supprimer un workflow.
     *
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $workflow = Workflow::findOrFail($id);
        $workflow->delete();

        return redirect()->route('workflows.index')->with('success', 'Le workflow a été supprimé avec succès.');
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'event' => 'required|string',
            'status'=>'required|string',
             // Ajoutez vos règles de validation appropriées ici
        ]);
        try {
        $workflow = Workflow::findOrFail($id);

        // Mettre à jour les attributs du workflow
        $workflow->name = $request->input('name');
        $workflow->event = $request->input('event');
        $workflow->status=$request->input('status');


        // Enregistrer les modifications dans la base de données
        $workflow->save();

        // Redirection avec un message de succès
        return redirect()->route('workflows.index')->with('success', 'Le workflow a été modifier avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Erreur lors de la modification de workflow ' . $e->getMessage());
    }
 }

}
