<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paraferme;
use Illuminate\Http\Request;

use App\Comp\Titre;
/**
 * controller destiné à gérer les parafermes d'un user, cad le descriptif de
 * sa ferme grâce à la table pivot paraferme_user
 */
class FermeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param User $user utilisateur dont c'est la ferme
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ferme  $ferme
     * @return \Illuminate\Http\Response
     */
    public function show(Ferme $ferme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ferme  $ferme
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $titre = new Titre(icone: "divers/ferme_blanche.svg", titre: "ferme_edit");

        $parafermes = Paraferme::orderBy('ordre')->get();
        // Boucle pour modifier $paraferme
        foreach ($parafermes as $paraferme) {
          // Si le type est "liste"
          if ($paraferme->type == 'liste' || $paraferme->type == "liste multiple") {
            // On reprend les parties qu'on transforme en tableau pour faire une liste déroulante
            $parties = explode(',', $paraferme->parties);
            // Et on met le tableau dans $paraferme
            $paraferme->parties = $parties;
          }
          // Ensuite il faut peupler les valeurs déjà existantes
          $paraferme->value = null;

          if($user->parafermes->contains($paraferme)) {

            $paraferme->value = $user->parafermes->where('id', $paraferme->id)->first()->param->value;

        }
      }
// dd($parafermes);
        return view('user.editFerme', [
          'user' => $user,
          'titre' => $titre,
          'parafermes' => $parafermes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ferme  $ferme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $datas = collect($request->all());
      // on retire le token
      $datas->pull('_token');
      // on retire la methode
      $datas->pull('_method');
      // On passe en revues les données saisies pour faire un tableau de type
      // [id => ['value' => value]] pour une sync de la table pivot paraferme_user
      $values = [];
      foreach ($datas as $key => $value) {
        // En cas de choix multiple la value est un array qu'il faut transformer
        // en string avec une virgule comme séparateur
        if(is_array($value)) {
          $value = implode(", ", $value);
          if($value !== "") {
            $values[$key] = ['value' => $value];
          }
        }
        else
          if($value !== null) {
            $values[$key] = ['value' => $value];
          }
      }

      // Et on synchronise ce qui enlève les valeurs absentes et met les
      // valeurs présentes
      $user->parafermes()->sync($values);

      return redirect()->route('user.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ferme  $ferme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ferme $ferme)
    {
        //
    }
}
