<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      if(!Auth::user()->admin)
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
     * Création d'un nouvel utilisateur
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validation de la saisie
        $datas = request()->validate([
          'nom' => 'required|max:191',
          'email' => 'required|email|max:191|unique:users',
          'mot_de_passe' => 'required|min:6',
          'retapez_votre_mot_de_passe' => 'required|min:6|same:mot_de_passe',
          'profession' => 'max:191',
          'region' => 'max:191',
          'captcha' => 'required|in:agriculture biologique, agriculture bio',
        ]);

      // création de l'utilisateur
        $datas = $request->all();
        dd($datas);
        $user = new User();
        $user->name = $datas['nom'];
        $user->email = $datas['email'];
        $user->password = bcrypt($datas['mot_de_passe']);
        $user->valide = $datas['valide'];
        $user->profession = $datas['profession'];
        $user->region = $datas['region'];
        $user->save();
        return response()->json([
          "id" => $user->id,
          "nom" => $user->name,
          "email" => $user->email
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
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
    public function edit($user)
    {
      // Trait FormTemplate
      $elements = $this->editForm($user, 'formUser.json');

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return response()->json(['message' => $id]);
    }

}
