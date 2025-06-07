<?php
namespace App\Traits;

use App\Traits\LitJson;
use App\Http\Indicateurs\IndicateursVL;
/**
 * Permet de créer un objet IndicateursESP en fonction de l'espèce
 */
trait ChoixIndicateur
{

  use Litjson;

  function choixIndicateur(String $saisie_id, Array $chiffres, String $espece_abbr)
  {
    if ($espece_abbr === "VL") {

      $parametres = $this->LitJson("parametresVL.json");

      return New IndicateursVL($saisie_id, $chiffres, $parametres);

    }
  }
}
