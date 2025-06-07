<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Paraferme;
/**
 * quand on saisie un parametre de ferme ou que l'on en modifie un, réorganise
 * l'ordre pour décaler les doublons
 */
trait Ordre
{
  /**
   * Fonction principale du trait
   * @param  Request $datas résultat de la saisie d'un parametre de ferme
   * @return Void    ordonne les autres paraferme pour que celui-là soit à la
   * bonne place
   */
  function ordonne(Request $request): void
  {
    $parafermes = Paraferme::select('id', 'ordre')->orderBy("ordre")->get();
    // Remplace les valeurs nulles
    $parafermes = $this->annule($parafermes);
    // On crée un array avec l'ordre en valeur et l'id en index
    $table = [];
        foreach ($parafermes as $paraferme) {
      $table[$paraferme->id] = $paraferme->ordre;
    }
    // On trie cet array en valeurs croissantes
    asort($table);
    // Si la valeur $request->ordre est nulle ou négative, on lui met arbitrairement
    // 1
    $request->ordre = ($request->ordre < 1) ? 1 : $request->ordre;
    // Si la valeur saisie existe déjà dans l'array, on décale la valeur présente
    // dans l'array d'1 (quite à créer un doublon mais cela permet que la valeur
    // saisie ne soit pas changée)
    foreach ($table as $id => $ordre) {
      if($ordre == $request->ordre) {
        $table[$id] = $ordre + 1;
      }
    }
    // On rajoute la valeur saisie à l'array
    $table[$request->id] = intVal($request->ordre);
    // On trie à nouveau le tableau pour le remettre en ordre croissant de valeurs
    asort($table);
    // On passe en revue l'array (utilisation de array_values et array_keys
    // car c'est un array associatif) et si on trouve un doublon on incrément de
    // 1 la deuxième valeur
    for ($i=0; $i < count($table) - 1 ; $i++) {
      if(array_values($table)[$i] == array_values($table)[$i+1]) {
        $id = array_keys($table)[$i+1];
        $table[$id] = array_values($table)[$i+1] + 1;
      }
    }

    $this->storeOrdre($table);

    $this->renum();
  }

  /**
   * Remplace les valeurs nulles dans l'ordre des parametres par des chiffres
   * en incrémentant à partir de la dernière valeur
   * @param  Collection $tab  array avec id en index et ordre en valeur
   * @return Collection idem que l'entrée avec des valeurs à la place du null.
   */
  public function annule(Collection $parafermes) :Collection
  {
    // $max = $parafermes->first()->ordre;
    $i = 1;
    foreach ($parafermes as $paraferme) {
      $paraferme->ordre = $i;
      $i += 1;
    }

    return $parafermes;
  }

  /**
   * Réincrémente les parafermes de 1 à n
   *
   * @param void
   * @return void
   */
  public function renum()
  {
    $parafermes = Paraferme::orderBy('ordre')->get();
    $i = 1;
    foreach ($parafermes as $paraferme) {
      Paraferme::where('id', $paraferme->id)
                ->update(['ordre' => $i]);
      $i += 1;
    }
  }

  /**
   * Stocke en bdd "parafermes" les nouvel ordonnancement des parametres
   * (variable ordre)
   * On considère qu'il s'agit d'une modification d'un parametre (déjà existant
   * en bdd) et d'une création.
   * @param array $table  tableau associatif avec l'id du parametre en index et
   * l'odre en valeur
   */
  public function storeOrdre(array $table) : void
  {
    foreach ($table as $id => $ordre) {
      Paraferme::where('id', $id)->update(['ordre' => $ordre]);
    }
  }
}
