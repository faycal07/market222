<?php

namespace App\Providers;

use App\Events\LeadUpdate;
use App\Events\LeadCreated;
use App\Listeners\SendLeadUpdate;
use App\Listeners\SendLeadCreated;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // Utilisez la méthode listen() de la classe Event pour associer un événement à un écouteur
         Event::listen(
            LeadCreated::class,
            SendLeadCreated::class
        );

        Event::listen(
            LeadUpdate::class,
            SendLeadUpdate::class
        );
    }
}
