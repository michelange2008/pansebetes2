<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Paraferme;

use App\Comp\Titre;
use App\Fournisseurs\TabLab;

use App\Traits\LitJson;
use App\Traits\TypesTools;
use App\Traits\FormTemplate;
use App\Traits\StringTools;
use App\Traits\Ordre;

class ParafermeController extends Controller
{

  use LitJson, TypesTools, FormTemplate, StringTools, Ordre;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parafermes = DB::table('parafermes')->orderBy('ordre')->get();

        $tabLab = new TabLab(datas: $parafermes, json: 'indexTabParaferme.json');

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
        $elements = $this->createForm('formParaferme.json');

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
      $validator = Validator::make($request->all(), [
        'nom' => 'required|max:191',
        'unite' => 'nullable|max:10',
        'type' => 'required',
        'parties' => Rule::requiredIf(fn() => $request->type == 'liste' || $request->type == 'liste multiple'),
      ])->validate();
// dd($request->all());
      // Et on stocke les infos
      $paraferme = new Paraferme();
      $paraferme->nom = $request->nom;
      $paraferme->unite = $request->unite;
      $paraferme->type = $request->type;
      $paraferme->ordre = $request->ordre;
      // on utilise la méthode cleanString du trait StringTools pour nettoyer
      $paraferme->parties = ($request->type == 'liste' || $request->type == 'liste multiple')
                            ? $this->cleanString($request->parties)
                            : null;
      $paraferme->save();

      $this->renum();

      return redirect()->route('paraferme.index')->with(['message' => 'paraferme_store']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paraferme  $paraferme
     * @return \Illuminate\Http\Response
     */
    public function show(paraferme $paraferme)
    {
        return redirect()->route('paraferme.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paraferme  $paraferme
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paraferme = Paraferme::find($id);

        $elements = $this->editForm(model: $paraferme, json: 'formParaferme.json');

        return view('admin.editCreateForm', [
          'elements' => $elements,
          'id' => $id,
          'routeAnnule' => route('paraferme.index'),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\paraferme  $paraferme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, paraferme $paraferme)
    {
      $validator = Validator::make($request->all(), [
        'nom' => 'required|max:191',
        'unite' => 'nullable|max:10',
        'type' => 'required',
        'parties' => Rule::requiredIf(fn() => $request->type == 'liste' || $request->type == 'liste multiple'),
      ])->validate();
      // Utilisation du trait Ordre pour éviter les doublons
      $this->ordonne($request);

      Paraferme::updateOrCreate(
        ['id' => $paraferme->id],
        [
          'nom' => $request->nom,
          'unite' => $request->unite,
          'type' => $request->type,
          'parties' => ($request->type == 'liste' || $request->type == 'liste multiple')
          // on utilise la méthode cleanString du trait tringTools pour nettoyer
                      ? $this->cleanString($request->parties)
                      : null,
        ]

      );
      // Traits Ordre: réincrémente
      $this->renum();

      return redirect()->route('paraferme.index')
              ->with(['message' => 'paraferme_update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paraferme  $paraferme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paraferme::destroy($id);

        return redirect()->back()->with(['message' => 'paraferme_del']);
    }

    /**
     * Affiche la page pour définir l'ordre des parametres d'exploitation
     * @return view paraferme/ranger.blade.php
     */
    public function ranger()
    {

      $titre = new Titre("sort.svg", "sort_paraferme");

      return view('admin.paraferme.ranger', [
        'parafermes' => Paraferme::orderBy('ordre')->get(),
        'titre' => $titre,
      ]);
    }

    /**
     * Permet de stocker l'ordre des paramètres
     *
     * issus du formulaire dans admin/paraferme/ranger.blade.php
     *
     * @param request données du formulaire post
     * @return return view liste des parametres (paraferme.index)
     */
    public function storeRanger(Request $request)
    {
      foreach ($request->all() as $key => $value) {
        Paraferme::where('id', $key)->update(['ordre' => $value]);
      }
      // Réincrémente l'ensemble des parafermes de 1 à n
      $this->renum();

      return redirect()->route('paraferme.index');
    }

}
