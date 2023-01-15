<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use App\Models\Espece;
use App\Models\Alerte;
use App\Models\Numalerte;
use App\Models\Critalerte;

use App\Comp\Titre;
use App\Fournisseurs\TabLab;

use App\Traits\LitJson;
use App\Traits\TypesTools;
use App\Traits\FormTemplate;
use App\Traits\ChiffresDependances;
/*
// Gestions des alertes
 */
class AlerteController extends Controller
{

    use LitJson, TypesTools, FormTemplate, ChiffresDependances;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especes = Espece::all();

        $titre = new Titre('especes/especes.svg', 'choix_alertes_espece');

        return view('admin.alertes.choixAlertesEspece', [
          'especes' => $especes,
          'titre' => $titre,
        ]);
    }

    /**
     * Affiche la liste des alertes pour une espece donnée
     *
     *
     * @param type $espece_id
     * @return return view
     */
    public function indexParEspece($espece_nom)
    {
      $espece = Espece::where('nom', $espece_nom)->first();

      session( [ 'espece_id' => $espece->id]);

      $alertes = DB::table('alertes')->where('espece_id', $espece->id)
                    ->join('themes', 'themes.id', 'alertes.theme_id')
                    ->select('themes.nom as theme_nom', 'alertes.id as id',
                    'alertes.nom as alerte_nom', 'alertes.unite', 'alertes.actif',
                    'alertes.supprimable', 'alertes.id as origines')
                    ->orderBy('themes.id')
                    ->get();

      $tabLab = new TabLab($alertes, 'indexTabAlerte.json', 'especes/'.$espece->icone);

      $indexTab = $tabLab->get();

      return view('admin.index.indexCadre', [
        'indexTab' => $indexTab,
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elements = $this->createForm('formAlerte.json');

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
        $espece = Espece::find($request->espece_id);

        $alerte = new Alerte();
        $alerte->nom = $request->nom;
        $alerte->type_id = $request->type_id;
        $alerte->unite = $request->unite;
        $alerte->modalite_id = $request->modalite_id;
        $alerte->theme_id = $request->theme_id;
        $alerte->espece_id = $request->espece_id;
        $alerte->actif = ($request->actif !== null) ? $request->actif : 0;

        $alerte->save();

        if ($this->isListe($request->type_id)) {

          return redirect()->route('liste.create', $alerte->id);

        } else {

          return redirect()->route('num.create', $alerte->id);

        }

    }

    /**
     * Même page que edit
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alerte = alerte::find($id);
        // Utilisation de la classe titre avec la variable $translate à FALSE
        // pour indiquer qu'il ne faut pas appliquer la traduction à $alerte->nom
        $titre = new Titre('saisie/alertes_claire.svg', 'alerte_show');

        return view('admin.alertes.show', [
          'alerte' => $alerte,
          'titre' => $titre,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $alerte = Alerte::find($id);

      $elements = $this->editForm($alerte, 'formAlerte.json');

      return view('admin.editCreateForm', [
        'elements' => $elements,
        'id' => $id,
        'routeAnnule' => route('alerte.show', $id)
      ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
          'nom' => 'required|max:100',
        ]);

        Alerte::where('id', $id)
              ->update([
                'nom' => $request->nom,
                'type_id' => $request->type_id,
                'unite' => $request->unite,
                'modalite_id' => $request->modalite_id,
                'theme_id' => $request->theme_id,
                'actif' => ($request->actif == null) ? 0 : 1,
              ]);

        if($request->editParam) {

          if ($this->isListe($request->type_id)) {

            return redirect()->route('liste.edit', $id);

          } else {

            return redirect()->route('num.edit', $id);

          }

        }
        // Réactive éventuellement un chiffre si modification d'un numalerte qui
        // nécessite un paramètre chiffré
        if(Numalerte::where('alerte_id',$id)->count() > 0) {

          $this->majChiffreNumalerte(Numalerte::where('alerte_id', $id)->first());

        }


        return redirect()->route('alerte.show', $id)->with(['message' => 'alerte_edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alerte::destroy($id);

        return redirect()->back()->with('message', 'alerte_del');
    }
}
