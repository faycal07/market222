<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarketingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur a le rôle marketing
        if (auth()->check() && auth()->user()->role === 'marketing') {
            return $next($request);
        }

        // Rediriger ou renvoyer une réponse en cas de non-marketing
        return redirect()->route('dashboard')->with('error', 'Vous n\'avez pas les autorisations nécessaires.');
    }
}
