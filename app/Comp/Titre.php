<?php
namespace App\Comp;

/*
// Classe qui gère les titres - associée à titres.php dans /lang et titre.php
// dans view/comp
 */
/**
 *
 */
class Titre
{

  function __construct($icone = "default.svg",
                      $titre = 'titre',
                      $translate = true,
                      $soustitre = null,
                      $bouton = null)
  {

    $this->icone = $icone;
    $this->titre = $titre;
    $this->soustitre = $soustitre;
    $this->bouton = $bouton;
    $this->translate = $translate;

  }

  public function getIcone()
  {
    return $this->icone;
  }
}
