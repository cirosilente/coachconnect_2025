<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Controller personalizzato se non sei loggato o il ruolo utente non è uno dell'enum di Role ti blocca
        if (!Auth::check() || Auth::user()->role !== Role::ADMIN && Auth::user()->role !== Role::USER && Auth::user()->role !== Role::MANAGER) {
            abort(403, 'Accesso negato.');
        }

        return $next($request);
    }
}
