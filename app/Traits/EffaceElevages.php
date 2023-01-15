<?php
namespace App\Traits;

use App\Models\Saisie;
use App\Models\Elevage;
/**
 * Suppression des élevages qui ne correspondent à aucune saisies
 * Cas correspondant aux élevages créés pour une saisie mais dont on a supprimé la saisie
 */
trait EffaceElevages
{
  public function effaceElevages()
  {
    $elevagesSaisis = Saisie::select('elevage_id')->get();

    $listeElevageIdSaisis = [];

    foreach($elevagesSaisis as $elevage)
    {

      $listeElevageIdSaisis[] = $elevage->elevage_id;

    }

    $listeElevages = Elevage::all();

    foreach ($listeElevages as $elevage) {
      if(!in_array($elevage->id, $listeElevageIdSaisis))
      {
        Elevage::destroy($elevage->id);
      }
    }
  }
}
