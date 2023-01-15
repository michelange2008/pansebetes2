<?php
namespace App\Traits;

use DB;
use App\Models\Theme;
use App\Models\Alerte;
use App\Models\Saisie;
use App\Models\Salerte;

/**
 * Outils de manipulation des thèmes
 * à partir d'une liste d'alertes ou de salertes
 */
trait ThemesTools
{
  // Permet de ne garder que les thèmes correspondant à une liste d'alerte
  // Utilisé notamment pour l'affichage du formulaire des observations
  function alertesThemes($alertes)
  {
    // On crée une collection vide
    $usedThemes = collect();
    // Qu'on remplit avec les id des thèmes présents dans $alertes
    foreach ($alertes as $alerte) {

      $usedThemes->push($alerte->theme->id);

    }
    // On enlève les doublons et on transforme la collection en array
    $usedThemes = $usedThemes->unique()->toArray();
    // On recherche les thèmes correspondants aux id dans l'array créé
    $themes = Theme::find($usedThemes);

    return $themes;
  }

  /**
   * Ne garde que les themes d'une saisie donnée quand y a des salertes dont
   * l'alerte a ce thème
   *
   * @param Saisie $saisie saisie en cours
   * @return Theme $themes liste des themes avec alerte de la saisie
   */
  public function themesIdAvecAlerte(Saisie $saisie)
  {
    $salertes = Salerte::where('saisie_id', $saisie->id)->get();

    $themes = Theme::all();

    foreach ($themes as $theme) {

      $theme->salerte = false;

    }

    foreach ($salertes as $salerte) {

      if ($salerte->danger) {

        foreach ($themes as $theme) {

          if($theme->id == $salerte->alerte->theme_id) {

            $theme->salerte = true;
          }
        }

      }

    }

    return $themes;
  }
  /*
  // Renvoie la liste des thèmes en ayant enlevé ceux qui ne concernent pas une espèce
  */
  function themesEspece($espece_id)
  {
    $alertesEspece = Alerte::select('theme_id')->where('espece_id', $espece_id)->groupBy('theme_id')->get();

    foreach ($alertesEspece as $alerte) {
      $themes_id[] = $alerte->theme_id;
    }
    $themesEspece = Theme::find($themes_id);

    return $themesEspece;

  }


  /**
   * Rajoute à la liste des thèmes le nombre de salertes avec danger = true
   *
   * @param type $saisie_id
   * @return return collection de thèmes
   */
  public function themesEspeceAvecDanger($saisie)
  {

    $themes = $this->themesEspece($saisie->espece->id);
    // On récupère toute la liste des salertes de la saisie et qui ont danger = true
    // avec en plus l'id des thèmes
    $themesAvecDanger = DB::table('salertes')
                ->select('themes.id as themeId', 'salertes.danger')
                ->join('alertes', 'salertes.alerte_id', 'alertes.id')
                ->join('themes', 'themes.id', 'alertes.theme_id')
                ->where('salertes.saisie_id', $saisie->id)
                ->where('salertes.danger', true)
                ->get();
    // On groupe par thème puis on mappe pour compter les nombre de salertes de chaque thème
    $themesCountSalertes = $themesAvecDanger->groupBy('themeId')->map(function ($item, $key) {
      return [
        'themeId' => $item[0]->themeId,
        'nb_salertes' => $item->count()
      ];
    });
    // Gros encastrement de boucles hideuses mais je ne sais pas comment faire autrement
    // On ajoute à la liste complète des thèmes un attribut nb_salertes initié à 0
    // et modifier si il y a un nombre différent de salertes dans $themesCountSalertes
    foreach ($themes as $theme) {

      $theme->nb_salertes = 0;

      foreach ($themesCountSalertes as $themeCountSalertes) {

        if ($themeCountSalertes['themeId'] == $theme->id) {

          $theme->nb_salertes = $themeCountSalertes['nb_salertes'];

          $icone = $theme->icone;

          $nom_icone = explode(".", $icone)[0];
          $extension_icone = explode(".", $icone)[1];
          $icone_fonce = $nom_icone.'_fonce'.'.'.$extension_icone;

          $theme->icone = $icone_fonce;

        }

      }

    }

    return $themes;

  }
}
