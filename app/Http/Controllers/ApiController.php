<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Saisie;
use App\Models\Sorigine;
/**
 * COntroller destiné à fournir les infos pour les requêtes ajax
 */
class ApiController extends Controller
{
  /**
   * Appel AJAX destiné à transférer les saisies d'un user que l'on supprime
   * @param  [type] $id               [description]
   * @return [type]     [description]
   */
  public function tousSauf($id)
  {
    $users = User::select('id', 'name')->where('id', '!=', $id)->get();

    return response()->json(json_encode($users));
  }

  /**
   * Appel AHAX par admin.js
   * Transfère une saisie d'un user à l'autre.
   * En fait dans la table saisies, change la valeur de la colonne user_id
   * Et renvoie le nombre de saisies du nouvel user
   * @param  int $ancien_user_id -> user dont on veut enlever les saisies
   * @param  int $nouveau_user_id -> user à qui l'on attribue les saisies
   * @return json nombre de saisies transférées d'un user à l'autre
   */
  public function changeSaisieUser($ancien_user_id, $nouveau_user_id)
  {
    $saisies = Saisie::where('user_id', $ancien_user_id)->get();
    foreach ($saisies as $saisie) {
      $saisie->user_id = $nouveau_user_id;
      $saisie->save();
    }

    return response()->json(["nombre_saisies" => Saisie::where('user_id', $nouveau_user_id)->count()]);
  }

  /*
  // Renvoie un json avec la liste des origines d'une salerte
  // Methode utilisée par afficherOrigine.js qui fait une requête ajax pour
  // pouvoir afficher les liste des origine en fenêtre modale
   */
  public function originesSalerte($salerte_id)
  {
    $tableNomOrigines = [];

    foreach(Sorigine::where('salerte_id', $salerte_id)->get() as $sorigine)
    {
        $tableNomOrigines[] = ucfirst($sorigine->origine->reponse);
    }

    return response()->json($tableNomOrigines, 200);
  }

}
