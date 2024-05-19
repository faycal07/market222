<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est un administrateur
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Rediriger ou renvoyer une réponse en cas de non-administrateur
        return redirect()->route('dashboard')->with('error', 'Vous n\'avez pas les autorisations nécessaires.');
    }
}
