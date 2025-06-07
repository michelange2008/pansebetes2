<?php
namespace App\Http\Indicateurs;

/**
* Calcul des indicateurs pour vaches laitières
* appelé par le trait principal calculIndicateurs
*/
class IndicateursVL extends Indicateurs
{

  function calculIndicateurs()
  {
    foreach ($this->parametres as $parametre) {

      // Cas des paramètres exprimés en % et résultat d'une division
      if($parametre->type == "calculé") {
        // On lève une exception en cas de division par 0
        try {

          $indicateur = round(100 * $this->chiffres[$parametre->id] / $this->chiffres[$parametre->denom], $parametre->round);

        } catch (\Exception $e) {
          // Et on inscrit l'erreur
          $this->setErreurs->put($parametre->libelle, "messages.param_nul");

        }
        // Si tout se passe bien on stocke l'info dans la bdd
        $this->store($parametre->id, $indicateur);
        // Si un indicateur est supérieur à 100% on ajoute l'info dans le message d'erreur
        if ($indicateur > 100) {
          // On inscrit l'erreur
          $this->setErreurs($parametre->libelle.' = '.$indicateur."%", "messages.indicateur_sup_100");

        }

      // Pour les indicateurs sans calcul (taux urée, nb cellules, etc.) on stocke
      // directement la valeur dans la bdd
    } elseif ($parametre->type == 'numérique') {

        $this->store($parametre->id, $this->chiffres[$parametre->id]);

      }

    }

  }


}
