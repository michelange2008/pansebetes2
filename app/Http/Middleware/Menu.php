<?php

namespace App\Http\Middleware;

use App\Models\StatsDisplay;
use Closure;
use Illuminate\Http\Request;
use App\Traits\LitJson;

class Menu
{
  use LitJson;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      // Récupère les infos pour le menu administrateur
      $menuGestion = $this->litJson('menuGestion.json');
      // Récupère les infos pour le menu stats qui a des conditions d'affichage
      $menuStats = $this->litJson('menuStats.json');
      // Récupère la visibilité des stats dans la BDD: admin/users/all
      $statsDisplay = StatsDisplay::first();
      

      session([
        'menuGestion' => $menuGestion,
        'menuStats' => $menuStats,
        'statsDisplay' => $statsDisplay->nom,
      ]);

      return $next($request);

    }
}
