<?php
namespace App\Traits;

use App\Models\Alerte;
use App\Models\Salerte;
use App\Models\Numalerte;
use App\Models\Critalerte;

use App\Traits\TypesTools;
/**
 *  Permet de définir si une alerte dépasse un seuil de danger
 */
trait CreeAlerte
{

  use TypesTools;

  public function creeAlerte(Alerte $alerte, $valeur): bool
  {
    $danger = false;

    if($this->isListe($alerte->type->id)) {

      $critalerte = Critalerte::where('alerte_id', $alerte->id)->where('valeur', $valeur)->first();

      if($critalerte !== null && $critalerte->isAlerte) {

        $danger = true;

      }

    } else {

      $numalerte = Numalerte::where('alerte_id', $alerte->id)->first();

      if($numalerte !== null) {

        if ($valeur < $numalerte->borne_inf || $valeur > $numalerte->borne_sup) {

          $danger = true;

        }

      }

    }

    return $danger;

  }

}
