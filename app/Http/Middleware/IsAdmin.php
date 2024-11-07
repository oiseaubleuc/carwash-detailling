<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Controleer of de ingelogde gebruiker een admin is
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Redirect naar de login-pagina als de gebruiker geen admin is
        return redirect('/login')->with('error', 'Toegang geweigerd. Alleen voor admins.');
    }
}
