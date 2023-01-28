<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Mail\Accepte;
use Mail;
use App\Models\Espece;
use App\Models\User;
use App\Models\Ami;
use App\Models\Saisie;
use App\Models\Inscription;

use App\Traits\FormTemplate;
use App\Comp\Titre;

class UserController extends Controller
{
  use FormTemplate;

  /**
     * Redirige vers le controleur AdminController
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(!Auth::user()->isAdmin)
      {
        return view('accueil', [
          'especes' => Espece::all(),
        ]);
      }
      else
      {

        return redirect()->route('admin.index');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return redirect()->route('user.index');
    }

    /**
     * Non implémenté car réalisé par RegisteredUserController
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth()->user();

        $titre = new Titre(icone: 'profil_clair.svg', titre: $user->name, translate: false );

        $amis_suiveurs = Ami::where('user_id', $user->id)->get();

        // AMIS SUIVIS
        $liste_amis_suivis = Ami::select('user_id')->where('ami_id', $user->id)->get();

        $amis_suivis = User::find($liste_amis_suivis);

        return view('user.show', [
          'titre' => $titre,
          'user' => $user,
          'amis_suiveurs' => $amis_suiveurs,
          'amis_suivis' => $amis_suivis
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      // Trait FormTemplate
      $elements = $this->editForm(Auth::user(), 'formUser.json');

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
      $request->validate([
        'name' => 'required | max:191',
        'email' => 'email',
        'profession' => 'alpha_num | nullable | max:191'
      ]);

      User::where('id', $id)
            ->update([
              'name' => $request->name,
              'email' => $request->email,
              'profession' => $request->profession,
              'region' => $request->region
            ]);

      return redirect()->route('user.show', $id)->with('message', 'user_update');
    }

    /**
     * Envoie à la page de confirmation de la suppression de l'utilisateur
     * après qu'il ait cliqué sur "supprimer" dans la page de son profil
     *
     * @param type var Description
     * @return return type
     */
    public function wantToDestroy()
    {
      return view('user.wantToDestroy', [
        'user' => Auth::user(),
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): RedirectResponse
    {
      $request->validate([
        'password' => 'required|current-password',
      ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
