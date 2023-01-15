<?php
namespace App\Traits;

use App\Models\Alerte;
use App\Models\Critalerte;
use App\Models\Sorigine;
use App\Models\Numalerte;

use App\Traits\TypesTools;

/**
 * Ajoute aux salertes les normes avec un formattage pour l'affichage
 * Remplace dans la colonne valeur pour les alertes de liste les indices issus
 * de critalerte par les intitulés
 */
trait FormatSalertes
{
  use TypesTools;
  // Fonction principale qui reçoit une collection de salertes et renvoie cette
  // collection modifiée
  function formatSalertes($salertes)
  {
    foreach ($salertes as $salerte) {
      // Si c'est une alerte de type liste, on modifie l'intitulé de la valeur
      // Utilise de la méthode isListe() du Trait TypesTools
      if ( $this->isListe($salerte->alerte->type_id) ) {
        // Remplace l'id de la critalerte par la dénomination
        $salerte = $this->valeurListe($salerte);
        // Ajoute la liste de valeurs qui sont dans la norme
        $salerte = $this->normeListe($salerte);

      } else {
        // On ajoute une propriété norme avec une mise en forme pour l'affichage
        $salerte = $this->normeNum($salerte);

      }
      // dump($salerte->id ?? '');
      $salerte = $this->nbOrigines($salerte);

    }

    return $salertes;
  }

  /**
   * Méthode interne au trait
   * Ajoute une propiété norme destinée à l'affichage
   * (par ex: "entre 15 et 25%")
   *
   * @param type $salerte alerte initiale
   * @return return $formatSalerte alerte formatée avec les normes affichables
   */
  public function normeNum($salerte)
  {

      $numalerte = Numalerte::where('alerte_id', $salerte->alerte->id)->first();

      $borne_inf = ($numalerte !== null) ? $numalerte->borne_inf : null;
      $borne_sup = ($numalerte !== null) ? $numalerte->borne_sup : null;
      $unite = $salerte->alerte->unite;

      // Si aucune borne n'est nulle, c'est
      if (($borne_inf != null && $borne_inf != 0) && $borne_sup != null) {
        // soit une valeur précise si les deux bornes sont identiques
        if($borne_inf == $borne_sup) {

          $norme = $borne_inf." ".$unite;
        // Soit un intervalle si elle sont différentes
        } else {

          $norme = "de ".$borne_inf." ".$unite." à ".$borne_sup." ".$unite;

        }
      // Si la borne_inf est nulle c'est qu'il ne faut pas dépasser la borne_sup
    } elseif (($borne_inf == null || $borne_inf == 0) && $borne_sup != null) {

        $norme = "< ".$borne_sup." ".$unite;
      // Si la borne_sup est nulle, c'est qu'il faut être au desus de la borne_inf
      } elseif ($borne_inf != null && $borne_sup == null) {

        $norme = "> ".$borne_inf." ".$unite;
      // Si les deux bornes sont nulles on ne met rien (cas de salerte de liste)
      } else {

        $norme = "";

      }

      $salerte->norme = $norme;

      return $salerte;

    }

  /**
  * Méthode interne au trait
   * Pour une valeur de type liste, remplace l'indice par l'intitulé
   *
   * ex: valeur = 1 pour "hétérogénéité des l'EC des vaches" remplacé par "oui"
   *
   * @param type $salerte
   * @return return $valeurListeSalerte
   */
  public function valeurListe($salerte)
  {

      try {

        $criteres = Critalerte::where('alerte_id', $salerte->alerte_id)->get();

        foreach ($criteres as $critere) {

          if ($critere->valeur == $salerte->valeur) {

            $salerte->valeur = $critere->nom;

          }
        }

      } catch (\ErrorException $e) {

        dd($e."| critères: $salerte");

      }

    return $salerte;

  }

  /**
   * undocumented function summary
   *
   * Undocumented function long description
   *
   * @param type var Description
   * @return return type
   */
  public function normeListe($salerte)
  {
    try {
      // On recherche les critalertes de l'alerte et qui sont faux pour isAlerte
      // cad les critères normaux
      $criteres = Critalerte::select('nom')
                            ->where('alerte_id', $salerte->alerte_id)
                            ->where('isAlerte', false)
                            ->get();

      // Puis on les concatènent avec un slash entre chaque pour les afficher
      // comme du texte
      $norme = '';
      foreach ($criteres as $critere) {
        if($norme == '') {

          $norme = $critere->nom;

        } else {

          $norme = $norme.'/'.$critere->nom;

        }
      }
      // Et on les ajouter à salerte
      $salerte->norme = $norme;

      return $salerte;

    } catch (\Exception $e) {

      dd($e.'| critères:'.$salerte);
    }

  }

  /**
   * Recherche le  nombre de sorigines d'une salerte et l'ajoute à l'attribut
   * nbOrigines
   *
   * @param type Alerte
   * @return return void
   */
  public function nbOrigines($salerte)
  {
    try {

      $salerte->nbsorigine = Sorigine::where('salerte_id', $salerte->id)->count();

    } catch (\Exception $e) {



    }


  }

}
