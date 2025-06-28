<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Fournisseurs\TabLab;
use App\Traits\FormTemplate;

use App\Models\Alerte;
use App\Models\Origine;

class OrigineController extends Controller
{
  use FormTemplate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     * @return return type
     */
    public function indexParAlerte($alerte_id)
    {
      $origines = DB::table('origines')->where('alerte_id', $alerte_id)
                  ->join('categories', 'categories.id', 'origines.categorie_id')
                  ->select('categories.icone as categorie_icone', 'origines.id as id',
                  'categories.nom as categorie_nom', 'origines.question as question',
                  'origines.reponse as reponse', 'origines.supprimable as supprimable')
                  ->get();
      $alerte = Alerte::find($alerte_id);

      $tabLab = new TabLab($origines, 'indexTabOrigine.json', null, $alerte->nom);

      $indexTab = $tabLab->get();

      $indexTab->bouton->route = route('origine.create', $alerte->id);

      return view('admin.index.indexCadre', [
        'indexTab' => $indexTab,
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($alerte_id)
    {
      $alerte = Alerte::find($alerte_id);

      $elements = $this->createForm('formOrigine.json', 'store');

      $elements->titre->titre = $alerte->nom;
      $elements->titre->translate = false;
      $elements->titre->soustitre = 'origine_create';

      $elements->liste->alerte_id->isName = $alerte_id;

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

      Origine::create([
        'alerte_id' => $request->alerte_id,
        'question' => $request->question,
        'reponse' => $request->reponse,
        'categorie_id' => $request->categorie_id,
      ]);

      return redirect()->route('origine.indexParAlerte', $request->alerte_id)
                        ->with('message', 'origine_store');
    }

    /**
     * Non implémenté car les éléments des origines sont afficher dans
     * le tableau d'index
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $origine = Origine::find($id);

      $elements = $this->editForm($origine, 'formOrigine.json');

      return view('admin.editCreateForm', [
        'elements' => $elements,
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
        Origine::updateOrCreate(
          ['id' => $id],
          [
            'question' => $request->question,
            'reponse' => $request->reponse,
            'categorie_id' => $request->categorie_id,
          ]
        );

        return redirect()->route('origine.indexParAlerte', $request->alerte_id)
                      ->with('message', 'origine_update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Origine::destroy($id);

        return redirect()->back()->with('message', 'origine_del');
    }
}
