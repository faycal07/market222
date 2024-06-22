<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\LeadController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompagneController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WorkflowController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\OpportuniteController;
use App\Http\Controllers\ShareButtonsController;
use Chatify\Http\Controllers\MessagesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\MarketingMiddleware;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {

    return view('menu');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ChartController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');







Route::middleware('auth')->group(function () {
     // Routes pour profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware([AdminMiddleware::class])->group(function () {

         // Routes pour la gestion des utilisateurs
         Route::get('/users', [AuthenticatedSessionController::class, 'afficherutilisateurs'])->name('users.index');
         Route::post('/enregistrerusers', [AuthenticatedSessionController::class,'storeuser' ])->name('creeruser');
         Route::get('/modifieruser/{id}', [AuthenticatedSessionController::class, 'modifieruserindex'])->name('modifieruser.index');
         Route::put('/users/{id}', [AuthenticatedSessionController::class, 'modifieruser'])->name('modifieruser');
         Route::put('/users/{id}/archiver', [AuthenticatedSessionController::class, 'archiver'])->name('archiveruser');
         Route::put('/users/{id}/dearchiver', [AuthenticatedSessionController::class, 'dearchiver'])->name('dearchiveruser');
    });


    Route::middleware([MarketingMiddleware::class])->group(function () {

         // Routes pour la gestion des opportunitees
        Route::get('/opportunites', [OpportuniteController::class, 'index'])->name('opportunites.index');
        Route::post('/creeropportunites', [OpportuniteController::class, 'store'])->name('creeropportunite');
        Route::get('/modifieropportunite/{id}', [OpportuniteController::class, 'modifieropportuniteindex'])->name('modifieropportunite.index');
        Route::put('/opportunites/{opportunite}',[OpportuniteController::class ,'modifierOpportunite'])->name('modifieropportunite');
        Route::delete('/opportunites/{opportunite}', [OpportuniteController::class, 'supprimerOpportunite'])->name('supprimeropportunite');


        Route::get('/compagnes', [CompagneController::class, 'index'])->name('compagnes.index');
        Route::get('/creercompagne', [CompagneController::class, 'creercompagne'])->name('creercompagne.index');
        Route::get('/modifiercompagne', [CompagneController::class, 'modifiercompagneindex'])->name('modifiercompagne.index');


         // Routes pour la gestion des leads
        Route::get('/leads', [LeadController::class, 'pagelead'])->name('pageleads');
        Route::post('/leads/ajouter', [LeadController::class, 'ajouterlead'])->name('ajouterlead');
        Route::get('/modifierlead/{lead}', [LeadController::class, 'pagemodifierlead'])->name('modifierlead.index');
        Route::put('/lead/{lead}', [LeadController::class, 'modifierlead']);
        Route::delete('/lead/{lead}', [LeadController::class, 'supprimerlead']);
         Route::put('/move/lead/{lead}', [LeadController::class,'movelead'])->name('suivilead');




         // Routes pour la gestion des compagnes
        Route::get('/compagnes', [CompagneController::class, 'index'])->name('compagnes.index');
        Route::get('/creercompagne', [CompagneController::class, 'creercompagne'])->name('pagecreercompagne');
        Route::get('/modifiercompagne/{id}', [CompagneController::class, 'modifiercompagneindex'])->name('modifiercompagne.index');
        Route::post('/creercompagne', [CompagneController::class, 'store'])->name('creercompagne');
        Route::put('/modifiercompagne/{id}', [CompagneController::class, 'update'])->name('modifiercompagne');
        Route::delete('/supprimercompagne/{id}', [CompagneController::class, 'delete'])->name('deletecompagne');
        Route::get('/compagnes/share/{id}', [CompagneController::class, 'share'])->name('compagnes.share');

      // Route pour partager une compagne sur Facebook
        Route::get('/compagnes/{id}', [CompagneController::class, 'shareOn'])->name('compagnes.share');

      // Route pour partager une compagne par sms
        Route::get('/envoyersms/{id}', [SmsController::class, 'sendsms'])->name('sms.envoyer');


       // Routes de la gestion des workflows
        Route::get('/workflows', [WorkflowController::class, 'index'])->name('workflows.index');
        Route::post('/workflows', [WorkflowController::class, 'store'])->name('workflows.store');
        Route::delete('/workflows/{id}', [WorkflowController::class, 'delete'])->name('workflows.delete');
        Route::get('/modifierworkflow{id}', [WorkflowController::class, 'pagemodifier'])->name('modifierworkflows.index');
        Route::put('/workflows/{id}', [WorkflowController::class, 'update'])->name('workflows.update');

    });


    // Routes pour  la gestion d'emails
    Route::get('/emails', [SendEmailController::class, 'emailsindex'])->name('emails.index');
    Route::get('/compangeemail/{id}', [SendEmailController::class, 'sendemail'])->name('email.envoyer');
    Route::post('/saveemail', [SendEmailController::class, 'saveEmail'])->name('email.save');
    Route::delete('/deleteemail/{id}', [SendEmailController::class, 'deleteemail'])->name('email.delete');



    // Route pour  acceder a la messagerie
    Route::get('/chatify', [MessagesController::class, 'index'])->name('chatify.routes.prefix');









// Route pour traiter la création d'un template
Route::post('/creertemplate', [TemplateController::class, 'store'])->name('templates.store');

// Route pour afficher le formulaire de modification d'un template
Route::get('/modifiertemplate/{id}', [TemplateController::class, 'edit'])->name('templates.edit');

// Route pour traiter la modification d'un template
Route::put('/modifiertemplate/{id}', [TemplateController::class, 'update'])->name('templates.update');

// Route pour traiter la suppression d'un template
Route::delete('/supprimertemplate/{id}', [TemplateController::class, 'delete'])->name('templates.destroy');



});

require __DIR__.'/auth.php';
