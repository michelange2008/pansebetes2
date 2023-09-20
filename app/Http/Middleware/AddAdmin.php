<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Ajoute la propriété isAdmin à l'user connecté 
 * Cette propriété à la valeur true si celui-ci a un role_id  = 1 (webmaster) ou 2 (administrateur du site)
 * et false dans les autres cas
 * Cela permet l'affichage d'un menu plus complet que pour les autres utilisateurs.
 */
class AddAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      if(Auth::user() != null) {

        Auth::user()->isAdmin = (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) ? true : false;

      }
        return $next($request);
    }
}
