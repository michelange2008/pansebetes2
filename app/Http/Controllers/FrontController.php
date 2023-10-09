<?php

namespace App\Http\Controllers;

use App\Models\StatsDisplay;
use Illuminate\Http\Request;

/**
 * Page d'accueil avant toute connexion ou inscription
 */
class FrontController extends Controller
{
  /**
   * Page initiale de Panse-Bêtes avec info, connexion et inscription
   */
  public function front()
  {
    $statsDisplay = StatsDisplay::first();

    $statsForAll = ($statsDisplay->nom == "all") ? true : false;

    return view('front', ['statsForAll' => $statsForAll]);
  }

  /**
   * Affiche une video de présentation de Panse-Bêtes
   */
  public function presentation()
  {
    return view('divers.presentation');
  }

  function statistiques() {
    
  }

}
