<?php
namespace App\Traits;

use DB;
use App\Traits\LitJson;
/**
 * Destiné à renvoyer la liste des éléments pour un formulaire create ou edit
 *
 */
trait FormTemplate
{
  use LitJson;

  /**
   * Appelée par createForm ou editForm
   *
   * Lit le json (identique pour edit et create) correspondant au model
   * Y ajoute les éléments des listes déroulantes, c'est-a-dire les models
   * liés par une clef étrangère (espece_id, theme_id, etc).
   * @param json eléments du formulaire
   * @return object liste structurée du formulaire avec éléments des listes déroulantes
   */
  function prepareForm($json)
  {
    $elements = $this->litJson($json);

    // Ajoute la liste d'options quand il s'agit d'un champs select
    foreach ($elements->liste as $element) {

      if(isset($element->table)) {

        $options = DB::table($element->table)->get();

        $element->options = $options;

      }

      elseif (isset($element->liste)) {

        $liste = collect($this->litJson($element->liste));

        $element->options = $liste;

      }
    }

    return $elements;

  }

  /**
   * Destiné à produire les informations pour l'affichage d'un formulaire
   * CREATE d'un model quelconque
   * Utilise la fonction prepareForm
   *
   * Y rajoute les informations sur le titre et l'icone du titre
   *
   * @param json même fichier que précédemment
   * @return object idem mais avec les infos titre en plus
   */
  public function createForm($json, $route_suffixe = 'store', $soustitre = null)
  {
    $elements = $this->prepareForm($json);

    $elements->route = route($elements->prefixe.'.'.$route_suffixe);

    $elements->titre->icone = "plus.svg";

    $elements->titre->titre = $elements->prefixe."_create";

    if($soustitre != null) {

      $elements->titre->soustitre = $soustitre;

    }

    $elements->method = "POST";

    return $elements;
  }


  /**
   * Destiné à produire les informations pour l'affichage d'un model EDIT d'un
   * model quelconque.
   * Utilise la fonction prepareForm
   *
   * Y rajoute les informations sur le titre et l'icone du titre
   * Rajoute aussi une clef isOption qui permet d'indiquer dans le formulaire
   * edit les valeurs actuelles du model.
   *
   * @param json même fichier que précédemment
   * @return object idem mais avec les infos titre et les valeurs en plus
   */
  public function editForm($model, $json, $route_suffixe = 'update')
  {
    $elements = $this->prepareForm($json);
    // On ajoute l'icone au titre
    $elements->titre->icone = "edit.svg";
    // ajoute le nom du titre qui fait référence à une ligne de tableaux.php
    // dans resources/lang
    $elements->titre->titre = $elements->prefixe."_edit";
    // On applique la méthode PUT au formulaire
    $elements->method = "PUT";
    // On définit la route sous forme trucmuche.edit sauf indication contraire
    $elements->route = route($elements->prefixe.'.'.$route_suffixe, $model->id);
    // Boucle destinée à préremplir les champs avec la valeur d'origine
    foreach ($elements->liste as $element => $details) {
      // Contenu de la partie liste du json
      // Si le champ table existe c'est qu'il s'agit d'une liste déroulante
      if (isset($details->table)) {
        // Dans le cas d'une liste déroulante qui fait référence à une autre
        // table, le name est sous la forme trucmuche_id
        $item = $details->name;
        // Et donc le isName qui sert à définir la valeur par défaut prend
        // la valeur dans le model du champ trucmuche_id.
        $details->isName = $model->$item;

      } else {

        $details->isName = $model->$element;

      }
    }

    return $elements;
  }
}
