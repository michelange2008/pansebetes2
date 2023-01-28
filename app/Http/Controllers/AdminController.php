<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Fournisseurs\TabLab;
use App\Comp\Titre;
use App\Models\Espece;
use App\Models\User;
use App\Models\Saisie;
use App\Models\Note;
use App\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
      // accès limité aux administrateurs
      $this->middleware('isAdmin');
    }

    /**
     * Affiche la liste des utilisateurs
     *
     * @param type var Description
     * @return return type
     */
    public function utilisateurs()
    {
      $users = DB::table('users')
              ->where('users.id', '<>', 0)
              ->join('roles', 'roles.id', 'users.role_id')
              ->select('users.id as id', 'users.name as nom', 'users.email as email',
              'users.profession as profession', 'users.region as region',
              'roles.nom as role')
              ->get();
      foreach ($users as $user) {
        $user->del = "->";
      }

      $tablab = new TabLab($users, 'indexTabUsers.json', 'profil_clair.svg');

      $indexTab = $tablab->get();

      return view('admin.index.indexCadre', [
        'indexTab' => $indexTab,
      ]);

    }

    /**
     * l'administateur du site doit pouvoir modifier le role d'un user
     * mais aussi supprimer un user indésirable.
     *
     * @param type var Description
     * @return return type
     */
    public function roleEdit($id)
    {
      $user = User::find($id);
      // $nb_saisies = Saisie::where('user_id', $user->id)->count();
      $titre = new Titre('admin/modifie_gris.svg', "modif_utilisateur");
      $roles = Role::all();

      return view('admin.roleEdit', [
        'user' => $user,
        'roles' =>$roles,
        // 'nb_saisies' => $nb_saisies,
        'titre' => $titre
      ]);
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     * @return return type
     */
    public function roleUpdate(Request $request, $id)
    {

      User::where('id', $id)
          ->update(['role_id' => $request->role_id]);

      return redirect()->route('admin.utilisateurs')->with('message', "role_modifie");
    }

    /**
     * Ouvre une page pour proposer la suppression d'un utilisateur.
     * Avec le choix de garder ou pas ses saisies
     * @param int $id
     * @return return view
     */
    public function del($id)
    {
      $user = User::find($id);

      // Il faut empêcher qu'un admin se détruise lui-même
      if ($id == Auth()->user()->id) {
        return redirect()->back()->with([
          'message' => 'no_del_self',
          'couleur' => 'alert-danger'
        ]);
      }
      else {

        $titre = new Titre("admin/destroy.svg", "del_utilisateur");
        // On compte le nombre de saisies pour mettre une case à cocher anonymiser
        $nb_saisies = Saisie::where('user_id', $user->id)->count();
        // On vérifie qu'il existe bien un user 0 destiné à recevoir les saisies anonymisées
        $user_zero = User::find(0);

        return view('admin.del', [
          'user' => $user,
          'user_zero' => $user_zero,
          'titre' => $titre,
          'nb_saisies' => $nb_saisies,
        ]);
      }
    }

    /**
     * Détruit l'utilisateur
     *
     * @param int $id
     * @return return route
     */
    public function destroy(Request $request, $id)
    {
      // Si on a fait le choix de garder les saisies
      if ($request->keep_saisies == 1) {
        $saisies = Saisie::where('user_id', $id)->get();
        // et qu'il y en a
        if ($saisies->count() > 0) {
          // On les attribue à l'user 0
          foreach ($saisies as $saisie) {
            $saisie->user_id = 0;
            // Au cas où l'user 0 n'existe pas
            try {
              $saisie->save();
            } catch (\Exception $e) {
              return redirect()->back()->with([
                'message' => "no_keep_saisies",
                'couleur' => "alert-danger",
              ]);
            }
          }
        }
      }

      User::destroy($id);

      return redirect()->route('admin.utilisateurs')->with('message', 'user_destroyed');

    }

    /**
     * Affichage des notes laissées par les utilisateurs
     *
     * @param type var Description
     * @return return type
     */
    public function notes()
    {
      // code...
    }

}
