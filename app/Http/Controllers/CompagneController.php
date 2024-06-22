<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Lead;
use App\Models\Product;
use App\Models\Compagne;
use App\Models\LeadSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class CompagneController extends Controller
{
     /**
     * Afficher la liste des compagnes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user_id = auth()->id();

    // Charger les campagnes de l'utilisateur connecté avec leurs leads associés
    $compagnes = Compagne::where('user_id', $user_id)
                    ->with(['leads' => function ($query) {
                        // Sélectionner les colonnes nécessaires à partir de la table compagne_lead
                        $query->select('leads.*');
                    }])
                    ->get();

           return view('compagnes',compact('compagnes'));


    }
    public function shareOn($id, Request $request)
    {
        // Récupérer la compagnes spécifique par son ID
        $compagne = Compagne::findOrFail($id);

        $sharebuttons=\Share::page(
            $compagne->text_compagne,
            $compagne->image,



        )->facebook()
        ->telegram()
        ->linkedin()
        ->whatsapp()
        ->reddit()
        ->twitter()
        ->pinterest()->getRawLinks();
        // dd($sharebuttons);

        return view('post',compact('compagne','sharebuttons'));

      // return view('compagnes', compact('compagne'));
        }

    /**
     * Afficher le formulaire de création d'une compagne.
     *
     * @return \Illuminate\View\View
     */
    public function creercompagne()
    {
        // $products = Product::all();
        // $sources = LeadSource::all();
        // // $leadTypes = Type::all();

        // // $leads = Lead::all();

        return view('creercompagne');
    }


    public function modifiercompagneindex($id)
    {
        // $compagne = Compagne::find($id);
        // $products = Product::all();
        // $sources = Source::all();
        // $leadTypes = Type::all();

        // $leads = Lead::all();
        // compact('compagne','leads', 'sources', 'leadTypes', 'products')
        $compagne = Compagne::findOrFail($id);

        return view('modifiercompagne',compact('compagne'));
    }

    public function delete($id)
{
    // Chercher la compagne à supprimer par son ID
    $compagne = Compagne::find($id);

    // Vérifier si la compagne existe
    if (!$compagne) {
        return redirect()->back()->with('error', 'La compagne spécifiée n\'existe pas.');
    }

    // Supprimer la compagne
    $compagne->delete();

    return redirect()->back()->with('success', 'La compagne a été supprimée avec succès.');
}

    public function renderNavLeft()
    {
        $compagneId = 123; // Remplacez 123 par l'ID de votre compagne
        return view('layouts.nav-left', compact('compagneId'));
    }


    /**
     * Afficher le formulaire d'édition d'une compagne spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        // Récupérer la compagne à mettre à jour
        $compagne = Compagne::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'compagne_title' => 'required|string',
            'compagne_slogan' => 'nullable|string',
            'text_compagne' => 'nullable|string',
            'compagne_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'compagne_date_limite' => 'required|date',
            'lead_option' => 'required|string', // Ajout d'une validation pour l'option sélectionnée
        ], [
            'compagne_title.required' => 'Le titre de la compagne est requis.',
            'compagne_date_limite.required' => 'La date limite est requise.',
        ]);

        // Vérifier les erreurs de validation
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Récupérer l'option sélectionnée
        $leadOption = $request->input('lead_option');

        // Initialiser la variable pour stocker les identifiants
        $leadIds = [];

        // Récupérer les identifiants en fonction de l'option sélectionnée
        switch ($leadOption) {
            case 'lead_sources':
                // Récupérer l'identifiant de la source sélectionnée
                $leadIds = Lead::where('sources_id', $request->input('source_id'))->pluck('id')->toArray();
                break;
            case 'products':
                // Récupérer tous les lead_id associés au produit sélectionné
                $leadIds = DB::table('lead_products')->where('product_id', $request->input('product_id'))->pluck('lead_id')->toArray();
                break;
            case 'lead_types':
                // Récupérer l'identifiant du type de lead sélectionné
                $leadIds = Lead::where('types_id', $request->input('lead_type_id'))->pluck('id')->toArray();
                break;
            case 'all_leads':
                // Récupérer tous les identifiants de leads
                $leadIds = Lead::pluck('id')->toArray();
                break;
            default:
                // Gérer d'autres cas si nécessaire
                break;
        }

        // Traitement de l'image de la compagne
        if ($request->hasFile('compagne_image')) {
            // Enregistrer l'image
            $imagePath = $request->file('compagne_image')->store('public/images');
            // Mettre à jour le chemin de l'image dans la compagne
            $compagne->image = $imagePath;
        }

        // Mettre à jour les autres champs de la compagne
        $compagne->title = $request->input('compagne_title');
        $compagne->slogan = $request->input('compagne_slogan');
        $compagne->text_compagne = $request->input('text_compagne');
        $compagne->date_limite = $request->input('compagne_date_limite');
        $compagne->save();

        // Dissocier tous les leads actuels de cette compagne
        $compagne->leads()->detach();

        // Associer les nouveaux leads à la compagne
        $compagne->leads()->attach($leadIds);

        // Redirection avec un message de succès
        return redirect()->route('compagnes.index')->with('success', 'La compagne a été mise à jour avec succès.');
    }

/**
 * Enregistrer une nouvelle compagne.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\RedirectResponse
 */
public function store(Request $request)
{
    // Validation des données du formulaire
    $validator = Validator::make($request->all(), [
        'compagne_title' => 'required|string',
        'compagne_slogan' => 'nullable|string',
        'text_compagne' => 'nullable|string|max:50000',
        'compagne_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'compagne_date_limite' => 'required|date',
        'lead_option' => 'required|string', // Ajout d'une validation pour l'option sélectionnée
    ]);

    // Vérifier les erreurs de validation
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Récupérer l'option sélectionnée
    $leadOption = $request->input('lead_option');

    // Initialiser la variable pour stocker les identifiants
    $leadIds = [];

    // Récupérer les identifiants en fonction de l'option sélectionnée
    switch ($leadOption) {
        case 'lead_sources':
            // Récupérer l'identifiant de la source sélectionnée
            $leadIds = Lead::where('sources_id', $request->input('source_id'))->pluck('id')->toArray();
            break;
        case 'products':
            // Récupérer tous les lead_id associés au produit sélectionné
            $leadIds = DB::table('lead_products')->where('product_id', $request->input('product_id'))->pluck('lead_id')->toArray();
            break;
        case 'lead_types':
            // Récupérer l'identifiant du type de lead sélectionné
            $leadIds = Lead::where('types_id', $request->input('lead_type_id'))->pluck('id')->toArray();
            break;
        case 'all_leads':
            // Récupérer tous les identifiants de leads
            $leadIds = Lead::pluck('id')->toArray();
            break;
        default:
            // Gérer d'autres cas si nécessaire
            break;
    }

    $user_id = auth()->id();

    // Création d'une nouvelle compagne
    $compagne = Compagne::create([
        'title' => $request->input('compagne_title'),
        'slogan' => $request->input('compagne_slogan'),
        'text_compagne' => $request->input('text_compagne'),
        'date_limite' => $request->input('compagne_date_limite'),
        'user_id'=>$user_id,
    ]);

    // Traitement de l'image de la compagne
    if ($request->hasFile('compagne_image')) {
        $imagePath = $request->file('compagne_image')->store('public/images');
        $compagne->image = $imagePath;
        $compagne->save();
    }

    // Associer les leads à la compagne
    $compagne->leads()->attach($leadIds);

    return redirect()->route('compagnes.index')->with('success', 'La compagne a été créée avec succès.');
}





}
