<?php

namespace App\Http\Controllers;

use App\Models\Ami;
use App\Models\User;
use Illuminate\Http\Request;
use App\Comp\Titre;

/**
 * Controller un peu particulier car le modele AMi est light.
 * Il correspond à une table avec user_id et ami_di, sachant que l'ami_id renvoie
 * à la table user_id.
 * Il aurait peut-être été mieux de faire une table pivot mais je ne sais pas si
 * une table user_user aurait fonctionnée.
 * Il n'y a donc que deux méthode edit (pour ajouter ou enlever des amis) et
 * update pour stocker ces chois dans la bdd.
 */

class AmiController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ami  $ami
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // On récupère tous les utilisateurs sauf l'user connecté
        $users = User::where('id', '<>', $user->id)->orderBy('name')->get();
        //######################################################################
        // AMIS SUIVEURS
        //######################################################################
        // On récupère la liste d'amis de l'user
        $liste_amis_suiveurs = Ami::where('user_id', $user->id)->get();
        // On crée un tableau vide
        $amis_suiveurs_id = [];
        // on passe en revue la liste d'amis
        foreach($liste_amis_suiveurs as $ami_suiveur) {
          // Pour ajouter les id des amis dans le tableau vide
          $amis_suiveurs_id[] = $ami_suiveur->ami_id;
        }
        // Et on recherche tous les users dont l'id est dans le tableau d'amis
        $amis_suiveurs = $users->find($amis_suiveurs_id);

        $non_amis = $users->diff($amis_suiveurs);



        $titre = new Titre(icone: "default.svg", titre: "amis_edit");

        return view('user.editAmis', [
          'user' => $user,
          'non_amis' => $non_amis,
          'amis_suiveurs' => $amis_suiveurs,
          'titre' => $titre,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ami  $ami
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $datas = collect($request->all());
        // On élimine les infos inutiles
        $datas->pull('_token');
        $datas->pull('_method');
        // on récupère les clefs = id des users choisis comme amis
        $amis_suiveurs_id = $datas->keys()->all();
        // On supprime tous les amis existants
        Ami::where('user_id', $user->id)->delete();
        // Et on crée l'ami pour chaque cas
        foreach ($amis_suiveurs_id as $ami_suiveur_id) {
          Ami::create([
            'user_id' => $user->id,
            'ami_id' => $ami_suiveur_id,
          ]);

        }

        return redirect()->route('user.show', $user);
    }

}
