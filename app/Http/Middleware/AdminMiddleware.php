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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Controleer of de gebruiker ingelogd is en of deze een admin is
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            return redirect('/'); // Redirect naar de homepage of een andere pagina
        }

        return $next($request);
    }
}
