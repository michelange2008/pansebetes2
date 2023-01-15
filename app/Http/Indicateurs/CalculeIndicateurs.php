<?php

namespace App\Http\Indicateurs;

use DB;

use App\Models\Saisie;
use App\Models\Alerte;
use App\Models\Salerte;
use App\Models\Numalerte;

use App\Traits\CreeAlerte;
use App\Traits\TypesTools;
/**
 * Classe appelée par SchiffreController après la saisie des valeurs chiffrées
 * A partir d'une saisie chiffrée il s'agit de :
 * 1. vérifier que les dénominateurs ne soient pas nuls
 * 2. calculer les indicateurs en fonction de leur type (%, ratio, entier, décimal)
 * 3. vérifier qu'aucun pourcentage ne dépasse 100%
 * En cas d'erreur, celles-ci sont stockées dans la Collection $erreurs et permet
 * à SchiffreController@store de retourner au formulaire pour modification en
 * indiquant la cause de l'erreur.
 * S'il n'y a pas d'erreur, SchiffreController@store demande à cette classe de
 * stocker dans la table salertes les valeurs et danger pour chaque alerte (num).
 */
class CalculeIndicateurs
{
  use CreeAlerte, TypesTools;

  protected Array $chiffres; // données saisies
  protected Saisie $saisie; // saisie en cours
  protected $indicateurs;
  protected $erreurs;

  public function __construct(Saisie $saisie, Array $chiffres)
  {
    $this->saisie = $saisie;
    $this->chiffres = $chiffres;
    $this->indicateurs = collect();
    $this->erreurs = collect();
  }

  /**
   * Fonction principale qui fait les calculs et remplit les variables indicateurs
   * et erreurs.
   * @return void
   */
  function calcule()
  {
      $numalertes = DB::table('numalertes')
            ->join('alertes', 'alertes.id', 'numalertes.alerte_id')
            ->join('chiffres', 'chiffres.id', 'numalertes.denom_id')
            ->where('alertes.espece_id', $this->saisie->espece_id)
            ->where('alertes.actif', 1)
            ->select('numalertes.*', 'chiffres.nom as denom_nom', 'alertes.*')
            ->get();

      foreach ($numalertes as $numalerte) {

        $alerte = Alerte::find($numalerte->alerte_id);

        if($this->isPourcentage($numalerte->type_id)) { // pourcentage

          if ($this->chiffres['C'.$numalerte->denom_id] != 0) {

            $valeur = intval(
              round(
                100 * $this->chiffres['C'.$numalerte->num_id]/
                $this->chiffres['C'.$numalerte->denom_id], $numalerte->round
              )
            );

            // Si un indicateur est supérieur à 100% on ajoute l'info dans le message d'erreur
            if ($valeur > 100) {

              $this->setErreurs($numalerte->nom.' = '.
                $valeur."%", "messages.indicateur_sup_100"
              );

            } else {
              // Sinon on évalue le danger et on inscrit tout ça dans la table salerte
              $danger = $this->creeAlerte($alerte, $valeur);

              $this->indicateurs->put($numalerte->alerte_id, ['valeur' => $valeur, 'danger' => $danger]);
              // Salerte::updateOrCreate(
              //   ['alerte_id' => $numalerte->alerte_id, 'saisie_id' => $this->saisie->id],
              //   ['valeur' => $valeur , 'danger' => $danger]
              // );

            }

          // On peut accepter que le dénominateur soit nul si le numérateur est
          // nul lui aussi -> dans ce cas là la valeur de l'indicateur est 0
          } elseif (
            $this->chiffres['C'.$numalerte->denom_id] == 0
            && $this->chiffres['C'.$numalerte->num_id] == 0) {

              $valeur = 0;

          } else { // Cas où un chiffre destiné à être dénominateur est nul ->message d'erreur

            // Et on inscrit l'erreur
            $this->setErreurs($numalerte->denom_nom, "messages.param_nul");

          }

        } elseif ($this->isRatio($numalerte->type_id)) { // ratio

          if ($this->chiffres['C'.$numalerte->denom_id] != 0) {

            $valeur = intval(
              round(
                $this->chiffres['C'.$numalerte->num_id]/
                $this->chiffres['C'.$numalerte->denom_id], $numalerte->round
              )
            );

            $danger = $this->creeAlerte($alerte, $valeur);

            $this->indicateurs->put($numalerte->alerte_id, ['valeur' => $valeur, 'danger' => $danger]);
            // Salerte::updateOrCreate(
            //   ['alerte_id' => $numalerte->alerte_id, 'saisie_id' => $this->saisie->id],
            //   ['valeur' => $valeur , 'danger' => $danger]
            // );

          // On peut accepter que le dénominateur soit nul si le numérateur est
          // nul lui aussi -> dans ce cas là la valeur de l'indicateur est 0
          } elseif (
            $this->chiffres['C'.$numalerte->denom_id] == 0
            && $this->chiffres['C'.$numalerte->num_id] == 0) {

              $valeur = 0;

          } else { // Cas où un chiffre destiné à être dénominateur est nul ->message d'erreur

            // Et on inscrit l'erreur
            $this->setErreurs->put($numalerte, "messages.param_nul");

          }

        } elseif ($this->isEntier($numalerte->type_id)) {

          $valeur = intval($this->chiffres['C'.$numalerte->num_id]);

          $danger = $this->creeAlerte($alerte, $valeur);

          $this->indicateurs->put($numalerte->alerte_id, ['valeur' => $valeur, 'danger' => $danger]);
          // Salerte::updateOrCreate(
          //   ['alerte_id' => $numalerte->alerte_id, 'saisie_id' => $this->saisie->id],
          //   ['valeur' => $valeur , 'danger' => $danger]
          // );


        } elseif($this->isDecimal($numalerte->type_id)) {

          $valeur = round(
            floatval($this->chiffres['C'.$numalerte->num_id]), $numalerte->round
          );

          $danger = $this->creeAlerte($alerte, $valeur);

          $this->indicateurs->put($numalerte->alerte_id, ['valeur' => $valeur, 'danger' => $danger]);
          // Salerte::updateOrCreate(
          //   ['alerte_id' => $numalerte->alerte_id, 'saisie_id' => $this->saisie->id],
          //   ['valeur' => $valeur , 'danger' => $danger]
          // );

        } elseif($this->isListe($numalerte->type_id)) {

        } else {

          $this->setErreurs($numalerte, "Y a un problème dans la nature du paramètre");

        }
      }

  }

  /*
  // Stocke les erreurs
  */
  public function setErreurs(String $numalerte_nom, String $message)
  {

    $this->erreurs->put($numalerte_nom, $message);
  }

  public function getErreurs()
  {
    return $this->erreurs;
  }

  public function getIndicateurs()
  {
    return $this->indicateurs;
  }

  public function storeIndicateurs()
  {
    foreach ($this->indicateurs as $alerte_id => $values) {
      Salerte::updateOrCreate(
        ['alerte_id' => $alerte_id, 'saisie_id' => $this->saisie->id],
        $values,
      );
    }
  }

}
