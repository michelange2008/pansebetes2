<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saisie;
use App\Models\Alerte;
use App\Models\Salerte;
use App\Models\Origine;
use App\Models\Sorigine;
use App\Models\Categorie;

use App\Traits\ThemesTools;
use App\Traits\FormatSalertes;
use App\Traits\AjouteSorigine;

class SorigineController extends Controller
{

    use ThemesTools, FormatSalertes, AjouteSorigine;


    /*
    // Affiche la liste des sorigines d'une saisie
     */
    public function index($saisie_id)
    {
      session()->put('saisie_id', $saisie_id);

      $saisie = Saisie::find($saisie_id);

      $sorigines = Sorigine::where('saisie_id', $saisie_id)->get();

      // s'il n'y a aucune alerte
      if($sorigines->count() == 0) {
        $message = "Il n'y a aucun problème signalé";
        return view('saisie.resultatsGlobalOk', ['saisie' => $saisie])->with(['message' => $message]);
      }

      // on recherche la liste des catégories dans le sorigines
      foreach ($sorigines as $sorigine) {
        $cat[] = $sorigine->origine->categorie_id;
      }
      // on élimine les doublons de cette liste
      collect($cat)->unique();

      // et on recherche les objets catégories de cette liste
      $categories = Categorie::whereIn('id', collect($cat)->unique())->get();
      return view('saisie.sorigines.index', [
        'sorigines' => $sorigines,
        'saisie' => $saisie,
        'categories' => $categories,
      ]);
    }

    /**
     * Méthode pour saisir les origines des alertes
     *
     */
      public function show($saisie_id)
      {
        $saisie = Saisie::find($saisie_id);
        $salertes = Salerte::where('saisie_id',$saisie_id)
                      ->where('danger', 1)
                      ->orderBy('alerte_id')
                      ->get();
        $salertes = $this->formatSalertes($salertes);
        $origines = Origine::all();
        $themes = $this->themesEspeceAvecDanger($saisie);

        return view('saisie.sorigines.show', [
          'saisie' => $saisie,
          'salertes' => $salertes,
          'origines' => $origines,
          'themes' => $themes,
        ]);
      }

      /**
       * Renvoie une page avec les origines d'une alerte pour que l'on puisse
       * les cocher ou non (et donc en faire des sorigines).
       * C'est une route post car il a fallu passer plusieurs variables et c'était
       * plus élégant comme ça.
       */
      public function edit(Request $request)
      {
        $saisie = Saisie::find($request->saisie_id);
        $alerte = Alerte::find($request->alerte_id);
        $origines = $this->ajouteSorigine($saisie->id, $alerte->id);
        $sorigines = Sorigine::where('saisie_id', $saisie->id)->get();

        return view('saisie.sorigines.edit', [
          'origines' => $origines,
          'sorigines' => $sorigines,
          'saisie' => $saisie,
          'salerte_id' => $request->salerte_id,
          'alerte' => $alerte,
        ]);
      }

      /**
       * Stocke les origines d'une alerte
       *
       */
      public function store(Request $request)
      {
        $saisie_id = $request->saisie_id;
        $salerte_id = $request->salerte_id;

        $origines_id = $request->except(['_token', 'saisie_id', 'salerte_id', 'theme_id']);
        $sorigines = Sorigine::where('saisie_id', $saisie_id)->where('salerte_id', $salerte_id)->delete();

        foreach ($origines_id as $origine_id) {

          Sorigine::create([
            'salerte_id' => $salerte_id,
            'saisie_id' => $saisie_id,
            'origine_id' => $origine_id]);
        }

        return redirect()->route('salerte.index', [
          'saisie_id' => $saisie_id,
          'theme_id' => $request->theme_id,
        ]);

      }


}
