<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paraferme;
use App\Models\Saisie;
use App\Models\Theme;
use App\Models\Categorie;
use App\Models\Espece;
use App\Models\Chiffre;
use App\Models\Salerte;
use App\Models\Alerte;
use PDF;
use DB;

use App\Traits\CategoriesTools;
use App\Traits\ThemesTools;
use App\Traits\FormatSalertes;
use App\Traits\LitJson;

class PdfController extends Controller
{
  use CategoriesTools, ThemesTools, FormatSalertes, LitJson;
    /**
     * Fournit un pdf avec une grille vide pour saisir les données chiffrées
     *
     * @return return pdf
     */
  public function modeleNum(Espece $espece)
    {
        $chiffres = DB::table('chiffres')->where('espece_id', $espece->id)
                      ->where('requis', 1)
                      ->join('groupes', 'groupes.id', 'chiffres.groupe_id')
                      ->select('groupes.nom as groupes_nom', 'groupes.ordre as groupes_ordre', 'chiffres.*')
                      ->orderBy('groupes_ordre')->orderBy('chiffres.id')
                      ->get();

        $chiffresGroupes = $chiffres->groupBy('groupes_nom');

        $pdf = PDF::loadView('pdf.modeleNum', [
          'chiffresGroupes' => $chiffresGroupes,
          'espece' => $espece,
        ]);

        $nomFichier = "Parametres ( ".$espece->nom." ).pdf";

        return $pdf->stream($nomFichier);

    }

    /**
     * Affichage d'une fiche pdf vierge pour la saisie des observations
     *
     * @param Espece $espece
     * @return return Pdf
     */
    public function modeleObs(Espece $espece)
    {
      $observations = Alerte::where('espece_id',$espece->id)
                        ->where('actif', true)
                        ->where('modalite_id', 1)
                        ->orderBy('theme_id')->get();

      $pdf = PDF::loadView('pdf.modeleObs', [
        'observations' => $observations,
        'espece' => $espece,
      ]);

      $nomFichier = "Parametres ( ".$espece->nom." ).pdf";

      return $pdf->stream($nomFichier);
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     * @return return type
     */
    public function modeleExploitation()
    {
      $parafermes = Paraferme::all();

      $pdf = PDF::loadView('pdf.modeleExploitation', [
        'parafermes' => $parafermes,
      ]);

      $nomFichier = "Donnees_exploitation ( ".auth()->user()->name." ).pdf";

      return $pdf->stream($nomFichier);
    }

    public function saisie(Saisie $saisie)
    {
      $salertes = Salerte::where('saisie_id', $saisie->id)->get();
      $salertes = $this->formatSalertes($salertes);
      // Utilisation du trait CategoriesTools pour avoir les catégories pour
      // lesquelles il y a une origine.
      $categoriesAvecOrigines = $this->categoriesAvecOrigines($saisie);
      // Utilisation du trait ThemesTools pour ajouter un attribut booleen salerte
      // au cous où il y a une ou des salertes pour un theme donné -> permet un
      // affichage spécifique dans le pdf
      $themesIdAvecAlerte = $this->themesIdAvecAlerte($saisie);

      $pdf = PDF::loadView('pdf.pdfSaisie', [
        'saisie' => $saisie,
        'salertes' => $salertes,
        'themesIdAvecAlerte' => $themesIdAvecAlerte,
        'categories' => $categoriesAvecOrigines,
      ]);
      $nomFichier = $saisie->nom."_".$saisie->espece->nom."_".$saisie->updated_at.".pdf";

      return $pdf->stream($nomFichier);

    }
}
