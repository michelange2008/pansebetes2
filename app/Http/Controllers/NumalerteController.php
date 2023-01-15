<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alerte;
use App\Models\Numalerte;
use App\Fournisseurs\TabLab;

use App\Traits\FormTemplate;
use App\Traits\TypesTools;
use App\Traits\ChiffresDependances;

class NumalerteController extends Controller
{
  use FormTemplate, TypesTools, ChiffresDependances;

  /**
   * Non implémenté car numalerte liée à alerte
   *
   */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     *
     * @param $alerte_id id de l'alerte qui vient d'être crée dans AlerteController
     * @return \Illuminate\Http\Response
     */
    public function create($alerte_id)
    {
      $alerte = Alerte::find($alerte_id);

      // Si c'est une alerte de type ENTIER ou DECIMAL on prend les infos pour
      // le formulaire dans un json différent que si c'est un pourcentage ou un ratio
      // pour lesquels il faut un dénominateur et numérateur
      if ($this->isEntier($alerte->type_id) ) {

        $json = 'formAlerteNumEntier.json';

      }

      elseif ($this->isDecimal($alerte->type_id)) {

        $json = 'formAlerteNumDecimal.json';


      } else {

        $json = 'formAlerteNum.json';
      }

      $elements = $this->createForm($json);

      $elements->titre->titre = $alerte->nom." ( ".$alerte->type->nom." )";
      $elements->titre->translate = false;
      $elements->titre->soustitre = 'alerte_num_create';
      $elements->liste->alerte_id->isName = $alerte->id;
      $elements->liste->alerte_nom->isName = $alerte->nom;

      return view('admin.editCreateForm', [

        'elements' => $elements,

      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Dans la majorité des cas, la numalerte correspondant à l'alerte existe déjà
      if(Numalerte::where('alerte_id', $request->alerte_id)->count() > 0) {

        Numalerte::where('alerte_id', $request->alerte_id)
        ->updateOrCreate([
          'borne_inf' => ($request->borne_inf == null) ? 0 : $request->borne_inf == null,
          "borne_sup" => $request->borne_sup,
          "num_id" => $request->num_id,
          "denom_id" => $request->denom_id,
          "round" => $request->round,
        ]);
      // Mais pour la cas où elle n'existe pas (notamment s'il y a une observation
      // avec une valeur entière ou décimale), on la crée en utilisant le nom de
      // l'alerte correspondante comme nom de numalerte
      } else {

        $nom = substr(strtolower(str_replace([' ', '\''], '_', $request->alerte_nom)), 0, 49);

        Numalerte::create([
          'alerte_id' => $request->alerte_id,
          'nom' => $nom,
          'borne_inf' => ($request->borne_inf == null) ? 0 : $request->borne_inf == null,
          "borne_sup" => $request->borne_sup,
          "num_id" => $request->num_id,
          "denom_id" => $request->denom_id,
          "round" => $request->round,
        ]);
      }
      // Utilise le trait ChiffresDependances pour mettre à jour l'état requis
      // ou nom des Chiffres qui servent éventuelllement au calcul de la numalerte
      $this->majChiffreNumalerte(Numalerte::where('alerte_id', $request->alerte_id)->first());

      return redirect()->route('alerte.show', $request->alerte_id)
      ->with(['message' => 'alerte_edit']);

    }

    /**
     * Non implémenté car numalerte liée à alerte
     *
     */
    public function show($id) {}

    /**
     * fonction destinée à modifier les parametres des alertes qui ne sont pas
     * de type liste mais de type valeur, ratio, pourcentage
     *
     * @param int $id : alerte_id que l'on veut modifier
     */
    public function edit($id)
    {
      $alerte = Alerte::find($id);

      $alerteNum = Numalerte::where('alerte_id', $id)->first();
      // S'il n'y a aucune numalerte aossicée à cette alerte, on renvoie à create
      if ($alerteNum == null) {

        return redirect()->route('num.create', $id);

      }
      // Si c'est une alerte de type ENTIER ou DECIMAL on prend les infos pour le formulaire
      // dans un json différent que si c'est un pourcentage ou un ration
      if ($this->isEntier($alerte->type_id)) {

        $json = 'formAlerteNumEntier.json';

      } elseif ($this->isDecimal($alerte->type_id)) {

        $json = 'formAlerteNumDecimal.json';

      } else {

        $json = 'formAlerteNum.json';
      }
      $elements = $this->editForm($alerteNum, $json);

      $elements->titre->titre = $alerteNum->alerte->nom." ( ".$alerteNum->alerte->unite." )";
      $elements->titre->translate = false;
      $elements->titre->soustitre = 'alerte_num_edit';

      return view('admin.editCreateForm', [

        'elements' => $elements,

      ]);

    }

    /**
     * Mise à jour des paramètres numériques d'une alerte
     *
     */
    public function update(Request $request, $id)
    {
      $alerte = Alerte::find($request->alerte_id);

      Numalerte::where('id', $id)
                ->update([
                  'alerte_id' => $request->alerte_id,
                  'borne_inf' => $request->borne_inf,
                  "borne_sup" => $request->borne_sup,
                  "num_id" => $request->num_id,
                  "denom_id" => $request->denom_id,
                  "round" => $request->round,
                ]);

      return redirect()->route('alerte.show', $request->alerte_id)
                            ->with(['message' => 'alerte_edit']);

    }

    /**
    * Non implémenté car numalerte liée à alerte
     */

    public function destroy($id) {}
}
