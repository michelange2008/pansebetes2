<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\Inscription;

class VisiteurController extends Controller
{
  // affiche le formulaire de demande d'identifiant
  public function index()
  {
    return view('admin.inscription');
  }

  // fonction retour de la validation du formulaire de demande d'identifiant
  public function envoi(Request $request)
  {
    $datas = request()->validate([
      'nom' => 'required|max:191',
      'email' => 'required|email|max:191|unique:users',
      'mot_de_passe' => 'required|min:6',
      'retapez_votre_mot_de_passe' => 'required|min:6|same:mot_de_passe',
      'profession' => 'max:191',
      'region' => 'max:191',
      'captcha' => 'required|in:agriculture biologique, agriculture bio',
    ]);
    // Modification des champs profession et region s'ils n'ont pas été remplis dans le formulaire
    $datas['profession'] = (array_key_exists('profession', $datas) && $datas['profession'] != "Votre profession ?") ? $datas['profession'] : "non précisé";
    $datas['region'] = (array_key_exists('region', $datas) && $datas['region'] != "Votre région ?") ? $datas['region'] : "non précisé";

    // On vérifie que cet email n'est pas déjà dans la bdd user
    if(User::where('email', $datas['email'])->count() == 0) {

      /*
      On crée un nouveau user avec les éléments du formulaire
      mais en lui attribuant une valeur 0 à valide (user en attente de validation)
      */
      $nouveau = User::firstOrCreate([
        'name' => $datas['nom'],
        'email' => $datas['email'],
        'password' => bcrypt($datas['mot_de_passe']),
        'profession' => $datas['profession'],
        'region' => str_replace('"', '', $datas['region']),
        'valide' => 0,
        'role_id' => 1,
      ]);

      $admin = User::where('email', 'michelange@wanadoo.fr')->first();

      // On envoie un mail à l'administratrice de Panse-Bêtes pour l'avertir qu'un nouvel utilisateur est intéressé
      Mail::to(config('mail.contact.address'))->send(new Inscription($nouveau));

      // Et on affiche le message correspondant
      $message = "Nous avons bien enregistré votre demande, nous allons vous répondre dès que possible";
      return view('admin.reception')->with(['message' => $message]);
    }

    else

    {
      $message = "Une demande avec cette adresse mail a déjà été faite. Ne vous inquiétez pas, nous allons vous répondre dès que possible";
      return view('admin.reception')->with(['error' => $message]);
    }
  }

  public function afficheNonValide()
  {
    $message = "Une demande avec cette adresse mail a déjà été faite. Ne vous inquiétez pas, nous allons vous répondre dès que possible";
    return view('admin.reception')->with(['error' => $message]);
  }

  public function presentation()
  {
    return view('divers.video', [
      'theme' => 'PBpresentation',
      'bouton' => "retour à l'accueil",
      'route' => 'front'
    ]);
  }
}
