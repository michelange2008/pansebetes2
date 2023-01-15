<?php
namespace App\Traits;

use App\Models\Categorie;
use App\Models\Salerte;
use App\Models\Saisie;
/**
* Gestion des categories
*/
trait CategoriesTools
{

  /**
  * Renvoie les catégories concernées par une saisie
  *
  * @param Saisie $saisie saisie en cours
  * @return Categorie $categories categories concernées par cette saisie
  */
  public function categoriesAvecOrigines(Saisie $saisie)
  {
    // On extrait les salertes de la saisies
    $salertes = Salerte::where('saisie_id', $saisie->id)->get();
    // On crée une collection vide
    $categorieIdAvecOrigine = collect();
    // On passe en revue les salertes
    foreach ($salertes as $salerte) {
      // Si ces salertes ont des sorigines
      if ($salerte->sorigines !== null) {
        // On les passe en revue
        foreach ($salerte->sorigines as $sorigine) {
          // Et on ajoute l'id de la categorie de l'origine de la sorigine
          $categorieIdAvecOrigine->push($sorigine->origine->categorie->id );
        }
      }
    }
    // Et on recherche toutes les catégories pour lesquelles il y une origine
    $categories = Categorie::find($categorieIdAvecOrigine);

    return $categories;

  }
}
