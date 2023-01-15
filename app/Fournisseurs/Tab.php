<?php
namespace App\Fournisseurs;

abstract class Tab
{
  /*
  * Crée les items de la liste à afficher renvoyer par la méthode liste
  */
  public function itemFactory($id, $col)
  {
    $item = collect();

    $item->action = null;

    $item->id = $id;

    $item->nom = $col;

    return $item;
  }

public function dateFactory($id, $value)
  {
    $item = collect();

    $item->action = 'date';

    $item->id = $id;

    $item->nom = $value;

    return $item;
  }

  public function iconeFactory($id, $value, $path)
  {
    $item = collect();

    $item->action = 'icone';

    $item->id = $id;

    $item->nom = $path.$value;

    $item->route = null;

    return $item;
   }


   public function photoFactory($id, $value)
   {
     $item = collect();

     $item->action = 'photo';

     $item->id = $id;

     $item->nom = $value;

     $item->route = null;

     return $item;
   }

   public function lienFactory($value, $route, $id = '', $icone = '<i class="text-secondary fas fa-eye"></i>')
   {
     $item = collect();

     $item->action = 'lien';

     $item->nom = $value;

     $item->route = $route;

     $item->id = $id;

     $item->icone = $icone;

     return $item;
   }

   public function ouinonFactory($id, $value)
   {
     $item = collect();

     $item->action = 'ouinon';

     $item->id = $id;

     $item->nom = $value;

     return $item;
   }

   public function editFactory($id, $value, $prefixe)
   {
     $item = collect();

     $item->nom = $value;

     $item->action = 'edit';

     $item->id = $id;

     $item->route = $prefixe.'.edit';

     return $item;
   }

   public function showFactory($id, $value, $prefixe)
   {
     $item = collect();

     $item->nom = $value;

     $item->action = 'show';

     $item->id = $id;

     $item->route = $prefixe.'.show';

     return $item;
   }


   public function delFactory($id, $prefixe)
   {
     $item = collect();

     $item->action = 'del';

     $item->id = $id;

     $item->route = $prefixe.'.destroy';

     $item->titre = 'boutons.del';

     $item->texte = 'commun.question_del';

     return $item;
   }


}
