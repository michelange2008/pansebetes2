<?php

namespace App\Http\Controllers;

use App\Models\StatsDisplay;
use App\Traits\StatsGenerales;
use Illuminate\Contracts\View\View as View;
use Illuminate\Http\Request;

/**
 * Page d'accueil avant toute connexion ou inscription
 */
class FrontController extends Controller
{
  use StatsGenerales;
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

  /**
   * Affiche les statistiques d'utilisation de Panse-Bêtes
   *
   * @return View
   */
  function utilisation() : View {


    return view('divers.statistiques', [
      'cards' => $this->cardsStatsPb(),
      'nb_pb_mensuel' => $this->nbPbMensuels(),
      'origine_users' => $this->origineUsers(),
      'profession_users' => $this->professionUsers(),

    ]);
  }

  /**
   * Affiche les statistiques des exploitations
   *
   * @return View
   **/
  public function exploitations() : View
  {
    
    return view('divers.exploitations');
  }

}
