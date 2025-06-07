<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;
use App\Models\Chiffre;
use App\Models\Espece;
use App\Models\Numalerte;

use App\Traits\LitJson;
/**
* Vérifier si un parametre chiffré est utilisé comme dénominateur pour calculer
* un pourcentage (renvoie true) sinon on peut le désactiver
*/
trait ChiffresDependances
{
  use LitJson;

  /**
   * QUand on modifier une numalerte, il faut marquer comme requis ou non les
   * Chiffres utilisés éventuellement pour calculer cette numalerte: numérateur
   * ou dénominateur.
   *
   */
  public function majChiffreNumalerte(Numalerte $numalerte)
  {
    // Ce trait n'a d'intéret que si la numalerte à une valeur non nulle à num_id
    // ou denom_id (c'est-à-dire qu'elle a besoin d'un Chiffre pour un calcul de ration
    // ou de pourcentage). Par construction, si un numalerte à un denom_id non null
    // il a forcément un num_id non null -> donc on ne teste que le num_id
    if($numalerte->num_id != null) {

      // Premier cas: la numalerte est active
      if($numalerte->alerte->actif) {

        $this->activeChiffre($numalerte);

      } else {

        $this->nettoieChiffres($numalerte);

      }
    }

  }


  /**
   * Fonction destinée à désactiver un Chiffre (parametre chiffré type nombre
   * de trucs morts) quand on désactive la numalerte (variable calculée parfois
   * avec des Chiffres (par ex: taux de mortalité)) et qui vérifier que ce Chiffre
   * n'est pas utilisé par un autre numalerte.
   *
   * Désactive un parametre chiffré si celui ci est utilisé uniquement par le
   * numalerte passé en parametre en numérateur ou en dénominateur.
   *
   *
   */
  public function nettoieChiffres(Numalerte $numalerte)
  {
    $chiffre_num = Chiffre::find($numalerte->num_id);

    if($chiffre_num != null) {

      $this->inactiveIsChiffreUnique($chiffre_num, $numalerte);

    }

    $chiffre_denom = Chiffre::find($numalerte->denom_id);

    if($chiffre_denom != null) {

      $this->inactiveIsChiffreUnique($chiffre_denom, $numalerte);

    }

  }

  /**
   * Pas la variable requis à false si le chiffre concerné n'est pas utilisé
   * par d'autres numalertes
   *
   * @param type var Description
   * @return return type
   */
  public function inactiveIsChiffreUnique($chiffre, $numalerte)
  {
    $nb_chiffres = Numalerte::where('denom_id', $chiffre->id)
                              ->orWhere('num_id', $chiffre->id)
                              ->where('id', '<>', $numalerte->id)
                              ->count();

    if($nb_chiffres == 0) {

      DB::table('chiffres')
          ->where('id', $chiffre->id)
          ->update(['requis'=> 0]);

    }
  }

  /**
   * Permet que les Chiffres utilisées par cette numalerte soient marqués comme
   * requis (et donc présent sur les formulaires et les pdf)
   *
   */
  public function activeChiffre($numalerte)
  {
    if($numalerte->num_id != null) {

      Chiffre::where('id', $numalerte->num_id)->update(['requis' => 1]);

    }

    if($numalerte->denom_id != null) {

      Chiffre::where('id', $numalerte->denom_id)->update(['requis' => 1]);

    }

  }

  /**
   * Il faut éviter que l'on puisse passer à non requis un Chiffre s'il est utilisé
   * pour faire des calcul par une numalerte.
   *
   * @param type var Description
   * @return return type
   */
  public function verifieIfRequis(Chiffre $chiffre)
  {
    $num = Numalerte::where('num_id', $chiffre->id)->count();
    $denom = Numalerte::where('denom_id', $chiffre->id)->count();

    $isRequis = false;

    if ($num + $denom > 0) {

      $isRequis = true;

    }

    return $isRequis;
  }

}
