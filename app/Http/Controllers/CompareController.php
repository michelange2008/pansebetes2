<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Saisie;
use App\Models\Theme;
use App\Models\Alerte;
use App\Models\Salerte;
use App\Comp\Titre;

use App\Traits\FormatSalertes;
/**
* Gère la comparaison entre différentes saisies d'une même user
*
* Affichage d'une page pour le choix des saisies à comparer
* pis des résultats, ...etc.
*
*/
class CompareController extends Controller
{

  use FormatSalertes;
  /**
  * Affiche une liste de saisie d'un user
  * pour que l'on puisse choisir les saisies à comparer
  *
  * @param Void
  * @return View
  */
  public function index()
  {
    $amis_id = [];
    foreach (auth()->user()->amis as $ami) {
      $amis_id[] = $ami->ami_id;
    }
    $amis_id[] = auth()->user()->id;

    $saisies = Saisie::whereIn('user_id', $amis_id)
    ->orderByDesc('created_at')
    ->get();
    $titre = new Titre(icone:'divers/compare_blanc.svg', titre:'compare_index');

    return view('compare.index', [
      'titre' => $titre,
      'saisies' => $saisies,
    ]);
  }

  /**
  * Permet d'afficher la comparaison entre les saisies choisies en présentant
  * chaque thème avec le nombre d'alertes à problème
  *
  * @param Request $request : parce qu'on arrive à cette page par une route post
  * @return view compare.themes
  */
  public function themes(Request $request)
  {
    // On enlève le token
    $saisies_choisies = $request->except('_token');
    // Il reste la liste des saisies_id qu'on utilise pour récupérer le liste des saisies
    $saisies = Saisie::whereIn('id', $saisies_choisies)
    ->orderBy('created_at', 'desc')
    ->get();

    // S'il n'y a pas au moins deux saisies (ce qui en théorie est impossible car
    // le js grise le bouton valider de compare.index) on retourne à la page
    // précédente avec un message d'erreur.
    if($saisies->count() < 2) {

      return redirect()->back()->with([
      'message' => 'deux_saisies',
      'couleur' => 'alert-danger',
      ]);
      // Sinon on va chercher les infos
    } else {
      // La liste des thèmes
      $themes = Theme::all();
      // On crée une collection destinée à permettre l'affichage du tableau dans
      // la vue par des boucles successives
      $compare = collect();
      // On crée la ligne d'en-têtes
      $compare->entete = collect();
      $compare->entete->push('tableaux.nom_themes');
      // On y met aussi les saisies car il faut le nom et la date
      foreach ($saisies as $saisie) {
        $compare->entete->push($saisie);
      }
      // On crée le groupe de lignes
      $compare->lignes = collect();
      // on passe en revue chaque thème
      foreach ($themes as $theme) {
        // On recherche les id des alertes de ce thème
        $alertes = Alerte::select('id')->where('theme_id', $theme->id)->get();
        // On crée un tableau vide
        $alertes_id = [];
        // On passe en revue la liste des id des alertes
        foreach ($alertes as $alerte) {
          // Et on l'ajoute au tableau vide
          $alertes_id[] = $alerte->id;
        }
        // Nouvelle collection pour y mettre le nombre d'alertes de chaque saisie
        $nb_salertes = [];
        // On y met d'abord le nom du thème avec son id en key
        $nb_salertes["theme"] = $theme;

        // On passe en revue les saisies
        foreach ($saisies as $saisie) {
          // Pour chaque saisie on cherche le nombre de salertes avec danger et
          // correspondant aux alertes du thème
          $salertes = $saisie->salertes->where('danger', true)
                                  ->whereIn('alerte_id', $alertes_id)->count();
          // On ajoute le nombre de salertes au tableau avec l'id de la saisie en key²
          $nb_salertes[$saisie->id] = $salertes;
        }
        // Et on ajoute une nouvelle ligne à la collection compare->lignes
        $compare->lignes->push($nb_salertes);

      }

      $titre = new Titre(icone:'divers/compare_blanc.svg', titre:'compare_result');

      return view('compare.themes', [
        'saisies_choisies' => implode('_', $saisies_choisies),
        'compare' => $compare,
        'titre' => $titre,
      ]);

    }
  }

  /**
   * Permet d'afficher la comparaison des alertes pour un thème donné
   *
   * @param Theme
   * @param String n° de saisies séparé par un underscore
   * @return return view
   */
  public function salertes(Theme $theme, $saisies_choisies)
  {
    // On récupère la liste des saisies (route get)
    $saisies_tab = explode('_', $saisies_choisies);

    $saisies = Saisie::whereIn('id', $saisies_tab)->orderByDesc('created_at')->get();
    // On récupère la liste des salertes correspondantes
    $liste_salertes = Salerte::whereIn('saisie_id', $saisies_tab)
                    ->orderBy('alerte_id')
                    ->orderByDesc('saisie_id')
                    ->get();
    // On retire de cette liste, celles qui ne correspondents pas au thème choisi
    // (On aurait pu faire ça avec une requête DB mais on perdait la syntaxe Eloquent
    // qui permet de suivre les lien de type belongsTo, ou hasMany, etc.)
    foreach ($liste_salertes as $key => $salerte) {

      if ($salerte->alerte->theme_id != $theme->id) {

        $liste_salertes->pull($key);
      }
      $salerte->nom = $salerte->alerte->nom;
    }
    // On rajoute la norme par le trait FormatSalertes et on groupe par nom d'alerte
    $liste_salertes = $this->formatSalertes($liste_salertes)->groupBy('nom');

    // On recherche les salertes correspondant aux saisies et au thème et on y
    // joint les alertes correspondantes
    $salertes = DB::table('salertes')
                    ->join('alertes', 'alertes.id', 'salertes.alerte_id')
                    ->join('saisies', 'saisies.id', 'saisie_id')
                    ->whereIn('saisie_id', $saisies_tab)
                    ->where('alertes.theme_id', $theme->id)
                    ->select('saisies.nom as saisie_nom', 'salertes.*', 'alertes.*')
                    ->orderBy('alerte_id')
                    ->orderByDesc('saisies.created_at')
                    ->get();

    // On groupe par nom d'alerte
    $salertes = $salertes->groupBy('nom');

    // Puis on passe en revue les salertes et les liste_salertes pour créer la
    // 2ème colonne du tableau avec la liste des normes
    foreach ($salertes as $nom => $salerte) {
      foreach ($liste_salertes as $nom_alerte => $liste_salerte) {
        if ($nom == $nom_alerte) {
          $infos = collect();
          $infos->id = 0;
          $infos->nom = $nom_alerte;
          $infos->valeur = $liste_salerte->first()->norme;
          $infos->danger = ''; // Pour éviter d'avoir une couleur de cellule
          $infos->unite = null;
          $salerte->prepend($infos);
        }
      }
    }
    // On crée le libellé de cette 2ème colonne
    $lib_infos = collect();
    $lib_infos->id = 0;
    $lib_infos->created_at = '';
    $saisies->prepend($lib_infos);


    $titre = new Titre(icone:'saisie/'.$theme->icone, titre:'compare_result', translate:true);
    return view('compare.salertes', [
      'saisies' => $saisies,
      'salertes' => $salertes,
      'theme' => $theme,
      'titre' => $titre,
    ]);
  }
}
