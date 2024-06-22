<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Opportunite;
use Illuminate\Http\Request;

class OpportuniteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupérer l'ID de l'utilisateur connecté
        $user_id = auth()->id();

        // Charger les opportunités avec leurs stages associés
        $opportunites = Opportunite::with('stages')->where('user_id', $user_id)->get();
        $stages = Stage::all();

        return view('opportunites', compact('opportunites','stages'));
    }
    // public function creeropportuniteindex()
    // {

    //     $stages= Stage::all();
    //     return view('creeropportunite',compact('stages'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'stages_id' => 'required|array',
        'stages_id.*' => 'exists:stages,id', // Vérifie que chaque identifiant de stage existe dans la table des stages
    ]);

    // Récupérer l'ID de l'utilisateur connecté
    $user_id = auth()->id();

    // Créer une nouvelle opportunité et lui attribuer l'ID de l'utilisateur connecté
    $opportunite = new Opportunite();
    $opportunite->nom = $request->input('nom');
    $opportunite->user_id = $user_id; // Attribuer l'ID de l'utilisateur connecté
    $opportunite->save();

    // Attacher les stages sélectionnés à l'opportunité nouvellement créée
    $opportunite->stages()->attach($request->input('stages_id'));

    return redirect()->route('opportunites.index')->with('success', 'Opportunité créée avec succès !');
}

    public function modifieropportuniteindex($id)
    {
        $opportunite=Opportunite::findOrFail($id);
        $stages= Stage::all();
        return view('modifieropporrtunite',compact('stages','opportunite'));
    }

    public function modifierOpportunite(Request $request, Opportunite $opportunite)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'stages_id' => 'required|array',
            'stages_id.*' => 'exists:stages,id', // Vérifie que chaque identifiant de stage existe dans la table des stages
        ]);

        try { // Mettre à jour le nom de l'opportunité
        $opportunite->nom = $request->input('nom');
        $opportunite->save();

        // Attacher les stages sélectionnés à l'opportunité
        $opportunite->stages()->sync($request->input('stages_id'));

        return redirect()->route('opportunites.index')->with('success', 'Opportunité modifiée avec succès !');


    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Erreur lors de la  modification d opportunité: ' . $e->getMessage());
    }

    }

public function supprimerOpportunite(Opportunite $opportunite)
{
    // Supprimer l'opportunité
    $opportunite->delete();

    return redirect()->route('opportunites.index')->with('success', 'Opportunité supprimée avec succès !');
}

}
