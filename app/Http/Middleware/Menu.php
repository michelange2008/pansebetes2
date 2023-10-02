<?php

namespace App\Http\Middleware;

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
      $menuGestion = $this->litJson('menuGestion.json');
      $menuStats = $this->litJson('menuStats.json');

      session([
        'menuGestion' => $menuGestion,
        'menuStats' => $menuStats,
      ]);

      return $next($request);

    }
}
