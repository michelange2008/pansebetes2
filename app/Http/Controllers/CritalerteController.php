<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Critalerte;
use App\Models\Alerte;

use App\Comp\Titre;

class CritalerteController extends Controller
{
  /**
  * Non implémenté car numalerte liée à alerte
  *
  */
  public function index() {}

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($alerte_id)
    {
      $critalertes = Critalerte::where('alerte_id', $alerte_id)->get();
      $alerte = Alerte::find($alerte_id);

      $titre = new Titre('edit.svg', $alerte->nom, false, 'create_alerte_listes');

      return view('admin.alertes.paramListeForm', [
      'critalertes' => $critalertes,
      'alerte' => $alerte,
      'titre' => $titre,
      'route' => route('liste.store', $alerte->id),
      'method' => 'POST'
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
      // On récupère un tableau formulaire = groupe de champs identiques
      foreach ($request->elts as $elt) {
        // Si le nom n'est pas null, c'est que ce groupe doit être enregistré
        if ($elt['nom'] != null) {
          // Donc on crée la ligne
          Critalerte::create([
          'alerte_id' => $request->alerte_id,
          'nom' => $elt['nom'],
          'valeur' => $elt['ordre'],
          'isAlerte' => isset($elt['isAlerte'])
          ]);
        }
      }
      return redirect()->route('alerte.show', $request->alerte_id)
      ->with(['message' => 'alerte_create']);
    }

    /**
    * Non implémenté car numalerte liée à alerte
    *
    */
    public function show($id) {}

      /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function edit($alerte_id)
      {
        $critalertes = Critalerte::where('alerte_id', $alerte_id)->get();
        $alerte = Alerte::find($alerte_id);

        $titre = new Titre('edit.svg', $alerte->nom, false, 'alerte_listes_edit');

        return view('admin.alertes.paramListeForm', [
        'critalertes' => $critalertes,
        'alerte' => $alerte,
        'titre' => $titre,
        'route' => route('liste.update', $alerte->id),
        'method' => 'PUT',
        ]);
      }

      /**
      * fonction destinée à modifier les parametres des alertes de type liste
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function update(Request $request)
      {
        // On commence par supprimer tous les critalertes de cette alerte
        Critalerte::where('alerte_id', $request->alerte_id)->delete();
        // On récupère un tableau formulaire = groupe de champs identiques
        foreach ($request->elts as $elt) {
          // Si le nom n'est pas null, c'est que ce groupe doit être enregistré
          if ($elt['nom'] != null) {
            // Donc on crée la ligne
            Critalerte::create([
            'alerte_id' => $request->alerte_id,
            'nom' => $elt['nom'],
            'valeur' => $elt['ordre'],
            'isAlerte' => isset($elt['isAlerte'])
            ]);
          }
        }

        return redirect()->route('alerte.show', $request->alerte_id)
        ->with(['message' => 'alerte_edit']);
      }

        /**
        * Non implémenté car numalerte liée à alerte
        *
        */
        public function destroy($id) {}
      }
