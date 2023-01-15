<?php

namespace App\Traits;

use DB;

use App\Models\Saisie;
use App\Models\Alerte;
use App\Models\Salerte;
use App\Models\Numalerte;

use App\Traits\CreeAlerte;
/**
 * A partir d'une saisie chiffrée il s'agit de calculer les valeurs à mettre
 * dans svaleurs
 */
trait CalculeIndicateurs
{
  use CreeAlerte;

  function calcule($chiffres, Saisie $saisie)
  {
      $erreurs = Collect();

      $numalertes = DB::table('numalertes')
            ->join('alertes', 'alertes.id', 'numalertes.alerte_id')
            ->where('alertes.espece_id', $saisie->espece_id)
            ->get();

      foreach ($numalertes as $numalerte) {

        $alerte = Alerte::find($numalerte->alerte_id);

        if($numalerte->type_id == 3) { // pourcentage

          if ($chiffres['C'.$numalerte->denom_id] != 0) {

            $valeur = intval(
              round(
                100 * $chiffres['C'.$numalerte->num_id]/
                $chiffres['C'.$numalerte->denom_id], $numalerte->round
              )
            );

            // Si un indicateur est supérieur à 100% on ajoute l'info dans le message d'erreur
            if ($valeur > 100) {

              $this->setErreurs(
                $erreurs, $numalerte->nom.
                ' = '.$valeur."%", "messages.indicateur_sup_100"
              );

            } else {
              // Sinon on évalue le danger et on inscrit tout ça dans la table salerte
              $danger = $this->creeAlerte($alerte, $valeur);

              Salerte::updateOrCreate(
                ['alerte_id' => $numalerte->alerte_id, 'saisie_id' => $saisie->id],
                ['valeur' => $valeur , 'danger' => $danger]
              );

            }

          } else { // Cas où un chiffre destiné à être dénominateur est nul ->message d'erreur

            // Et on inscrit l'erreur
            $this->setErreurs->put($erreurs, $numalerte->nom, "messages.param_nul");

          }

        } elseif ($numalerte->type_id == 2) { // ratio

          if ($chiffres['C'.$numalerte->denom_id] != 0) {

            $valeur = intval(
              round(
                $chiffres['C'.$numalerte->num_id]/
                $chiffres['C'.$numalerte->denom_id], $numalerte->round
              )
            );

            $danger = $this->creeAlerte($alerte, $valeur);

            Salerte::updateOrCreate(
              ['alerte_id' => $numalerte->alerte_id, 'saisie_id' => $saisie->id],
              ['valeur' => $valeur , 'danger' => $danger]
            );

          } else { // Cas où un chiffre destiné à être dénominateur est nul ->message d'erreur

            // Et on inscrit l'erreur
            $this->setErreurs->put($erreurs, $numalerte->nom, "messages.param_nul");

          }

        } elseif ($numalerte->type_id == 4) {

          $valeur = intval($chiffres['C'.$numalerte->num_id]);

          $danger = $this->creeAlerte($alerte, $valeur);

          Salerte::updateOrCreate(
            ['alerte_id' => $numalerte->alerte_id, 'saisie_id' => $saisie->id],
            ['valeur' => $valeur , 'danger' => $danger]
          );


        } elseif($numalerte->type_id == 5) { // entier ou decimal

          $valeur = round(
            floatval($chiffres['C'.$numalerte->num_id]), $numalerte->round
          );

          $danger = $this->creeAlerte($alerte, $valeur);

          Salerte::updateOrCreate(
            ['alerte_id' => $numalerte->alerte_id, 'saisie_id' => $saisie->id],
            ['valeur' => $valeur , 'danger' => $danger]
          );


        } else {


        }
      }

  }

  /*
  // Stocke les erreurs
  */
  public function setErreurs($erreurs, $numalerte_nom, $message)
  {

    $erreurs->put($numalerte_nom, $message);
  }

}
