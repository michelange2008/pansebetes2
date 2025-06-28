<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Salerte;
use App\Models\Theme;
use App\Models\Saisie;

use App\Traits\FormatSalertes;

class SalerteController extends Controller
{
  use FormatSalertes;
    /**
     * Affiche les salertes d'un theme pour que l'on puisse voir et modifier
     * les origines.
     * Appelée dans la page de synthèse quand on clique sur le thème correspondant
     * @param int id du theme
     * @param int id de la salerte
     * @return return type
     */
    public function index($saisie_id, $theme_id)
    {
      // On récupère toutes les salertes de la saisie
      $salertes = Salerte::where('saisie_id', $saisie_id)->get();
      // On crée une nouvelle collectionœ
      $salertesTheme = collect();
      // On passe en revue les salertes
      foreach($salertes as $salerte) {
        // Si le theme_id est égale au theme_id de l'alerte de la salerte
        if ($salerte->alerte->theme_id == $theme_id) {
          // On ajoute la salerte à la nouvelle collection
          $salertesTheme->push($salerte);
        }
      }

      $salertes = $this->formatSalertes($salertes);

      $theme = Theme::find($theme_id);

      $theme->nb_salertes = $salertesTheme->count();

      return view('saisie.salertes.index', [
        'theme' => $theme,
        "saisie" => Saisie::find($saisie_id),
        'salertes' => $salertesTheme,
      ]);

    }

}
