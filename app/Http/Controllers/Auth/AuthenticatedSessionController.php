<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }



    /**
 * Handle an incoming authentication request.
 */
public function store(LoginRequest $request): RedirectResponse
{
    // Authentifier l'utilisateur
    $request->authenticate();

    // Vérifier l'attribut 'archiver' de l'utilisateur
    $user = $request->user();
    if ($user->archiver === 'oui') {
        // Si l'attribut 'archiver' est égal à 'oui', déconnecter l'utilisateur et rediriger avec un message d'erreur
        Auth::logout();
        return redirect()->route('login')->withErrors(['email' => 'Votre compte est archivé et ne peut pas se connecter.']);
    }

    // Régénérer la session pour éviter les attaques de fixation de session
    $request->session()->regenerate();

    // Rediriger vers la page prévue (par défaut : dashboard)
    return redirect()->intended(route('dashboard', absolute: false));
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function afficherutilisateurs()
    {
        $users = User::all();
        return view('utilisateursindex', compact('users'));
    }

    public function creeruserindex()
    {

        return view('creeruser');

    }
    public function storeuser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
        ], [
            'password.min' => 'Le mot de passe doit comporter au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        try {

            // Créer un nouvel utilisateur
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            return redirect()->route('users.index')->with('success', 'Utilisateur crée avec succès!');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erreur lors de la creation de l\'utilisateur: ' . $e->getMessage());
        }

    }



    public function modifieruserindex($id)
    {
        // Récupérez l'utilisateur à modifier en fonction de son ID
        $user = User::findOrFail($id);

        // Passez les données de l'utilisateur à la vue modifieruser
        return view('modifieruser', compact('user'));
    }

    public function modifieruser(Request $request, $id)
{
    // Valider les données du formulaire
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        'role' => ['required', 'string'],
    ], [
        'password.min' => 'Le mot de passe doit comporter au moins :min caractères.',
        'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
    ]);

    try {
        // Trouver l'utilisateur à modifier
        $user = User::findOrFail($id);

        // Mettre à jour les informations de l'utilisateur
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès!');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Erreur lors de la modification de l\'utilisateur: ' . $e->getMessage());
    }
}

public function archiver($id)
{
    $user = User::findOrFail($id);
    $user->archiver = 'oui'; // Utiliser une chaîne de caractères 'oui'
    $user->save();

    return redirect()->route('users.index')->with('success', 'utilisateur a été archivé avec sucses!');
}
public function dearchiver($id)
{
    $user = User::findOrFail($id);
    $user->archiver = 'non'; // Utiliser une chaîne de caractères 'oui'
    $user->save();

    return redirect()->route('users.index')->with('success', 'utilisateur a été dearchivé avec sucses!');
}


}
