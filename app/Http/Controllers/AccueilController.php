<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;

use App\Models\Espece;
use App\Models\Saisie;
use App\Models\Ami;
use App\Models\User;
use App\Models\Participant;
use App\Traits\LitJson;
use App\Comp\Titre;

class AccueilController extends Controller
{
    use LitJson;

    /**
     * Affiche la liste des saisies de l'user identifié ainsi que celles de ces
     * amis suivis
     * @param  Aucun
     * @return View   Affiche la liste des saisies réalisées et s'il n'y en a pas
     * un double panneau pour proposer la démarche de saisie
     */
    public function accueil()
    {
      Log::info(auth()->user()->name." a consulté sa page d'accueil");

      $saisies = Saisie::where('user_id', auth()->user()->id)
                  ->orderBy('created_at', 'desc')->get();
      // récupère la liste d'amis de l'user authentifié
      $amis = Ami::where('ami_id', auth()->user()->id)->get();
      // Si cette liste est pas nulle
      if($amis->count() > 0) {
        foreach ($amis as $ami) {
          // On recherche les saisies correspondantes à chaque ami
          $saisies_ami = Saisie::where('user_id', $ami->user_id)->get();
          // On les passe en revue
          foreach ($saisies_ami as $saisie_ami) {
            // Et on les ajoute à la liste des séries
            $saisies = $saisies->push($saisies_ami->first());
          }
        }
      }

      $especes = Espece::all();
      session()->forget(['espece_id', 'theme', 'saisie']);

      return view('accueil', [
        'user' => auth()->user(),
        "saisies" => $saisies,
        'especes' => $especes,
      ]);
    }

    /**
     * Affiche la liste des saisies d'un ami suivi par l'user authentifié
     * A pour but de permettre, par exemple, à un conseiller d'afficher toutes
     * les saisies d'un éleveur. D'où l'arrivée à cette méthode par le profil
     * utilisateur (amis_suivis)
     *
     * @param User $user utilisateur ami_suivi de l'user connecté
     * @return View accueil
     */
    public function saisiesAmi(User $user)
    {
      // Si l'user ami est aussi l'user identifié, on renvoie à la méthode accueil
      // de base.
      if ($user == auth()->user()) {
        return redirect()->route('accueil');
      }
      else {
        // On vérifie que le user est bien un ami_suivi
        $ami_count = Ami::where('user_id', $user->id)
                        ->where('ami_id', auth()->user()->id)->count();
        // S'il n'y a pas d'enregistrement de l'user avec l'user authentifié
        // comme ami on renvoie à l'accueil
        if ($ami_count == 0) {
          return redirect()->route('accueil');
        } else {
          // Sinon on recherche les saisies de l'user
          $saisies = Saisie::where('user_id', $user->id)->get();
          $especes = Espece::all();

          $titre = new Titre(icone: "profil_clair.svg", titre: $user->name,
                              translate: false);

          return view('user.saisiesAmi', [
            "saisies" => $saisies,
            'especes' => $especes,
            'supprime' => false,
            'titre' => $titre,
          ]);
        }
      }
    }

    public function instructions()
    {
      return view('divers.instructions');
    }

    public function description()
    {
      return view('divers.description');
    }

    public function credits()
    {
      $especes = Espece::all();
      $participants = Participant::all();

      return view('divers.credits', [
        'especes' => $especes,
        'participants' => $participants,
      ]);
    }

    public function contact()
    {
      return view('divers.contact');
    }

    public function mentions_legales()
    {
      return view('divers.mentions_legales', [
        'infos' => $this->litJson("mentions_legales.json"),
      ]);
    }

    public function aide()
    {
      return view('aide.aide');
    }

    public function video()
    {
      return view('divers.video', [
        'theme' => 'aide',
        'bouton' => 'retour',
        'route' => 'accueil',
      ]);
    }

    /**
     * affiche la page lors de la connexion d'un user non valide
     *
     * @return view non_valide.blade.php
     **/
    public function nonValide()
    {
      return view('user_non_valide', [
        'mail_name' => config('app.mail_name'),
        'mail_adress' => config('app.mail_adress'),
      ]);
    }

}
