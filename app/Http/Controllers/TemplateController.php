<?php

namespace App\Http\Controllers;


use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TemplateController extends Controller
{
    /**
     * Display a listing of the templates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::all();
        return view('emails', compact('templates'));
    }


    /**
     * Store a newly created template in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider les données soumises
        $request->validate([
            'nom' => 'required|string',
            'subject' => 'required|string',
            'mobile' => 'required|string',
            'web' => 'required|string',
            'email' => 'required|string',
            'telephone' => 'required|string',
            'adresse' => 'required|string',
        ]);
        try {

        // Créer un nouveau template avec les données validées
        $template = new Template([
            'nom' => $request->nom,
            'subject' => $request->subject,
            'mobile' => $request->mobile,
            'web' => $request->web,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);

         // Traitement de l'image de la compagne
       if ($request->hasFile('logo')) {
        $imagePath = $request->file('logo')->store('public/images');
        $template->logo = $imagePath;
       }

        // Sauvegarder le nouveau template
        $template->save();

        return redirect()->route('emails.index')->with('success', 'Le template a été créée avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Erreur lors de la creation de workflow ' . $e->getMessage());
    }
    }

    /**
     * Show the form for editing the specified template.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = Template::find($id);
        return view('modifiertemplate', compact('template'));
    }

    /**
     * Update the specified template in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
        'nom' => 'required|string',
        'subject' => 'required|string',
        'mobile' => 'required|string',
        'web' => 'required|string',
        'email' => 'required|email',
        'telephone' => 'required|string',
        'adresse' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
            $template = Template::findOrFail($id);
            $template->nom = $request->input('nom');
            $template->subject = $request->input('subject');
        $template->mobile = $request->input('mobile');
            $template->web = $request->input('web');
        $template->email = $request->input('email');
            $template->telephone = $request->input('telephone');
            $template->adresse = $request->input('adresse');

            $template->save();

        return redirect()->route('emails.index')->with('success', 'Le template a été modifié avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Erreur lors de la modification du template : ' . $e->getMessage());
    }
    }

    /**
     * Remove the specified template from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $template = Template::find($id);
        $template->delete();

        return redirect()->route('emails.index')->with('success', 'Template a été supprimer avec  succès.');
    }
}
