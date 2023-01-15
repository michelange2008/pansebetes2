<?php
namespace App\Traits;

/**
 * Nettoie les données de saisie du champs liste d'éléments du formulaire paraferme
 * (en fait cela correspond au champs "parties" de la table "parafermes")
 */
trait StringTools
{
  function cleanString(string $parties)
  {
    // remplace les retours chariots par des virgules
    $parties = str_replace("\n", ",", $parties);
    $parties = str_replace("\r", ",", $parties);
    // remplace les ; par des virgules
    $parties = str_replace(";", ",", $parties);
    // remplace les . par des virgules
    $parties = str_replace(".", ",", $parties);
    // remplace les / par des virgules
    $parties = str_replace("/", ",", $parties);
    // remplace les antislash par des virgules
    $parties = str_replace("\\", ",", $parties);
    // enlève les virgules surnuméraires
    while(stristr($parties, ",,")) {
      $parties = str_replace(",,", ",", $parties);
    }
    // on enlève d'éventuels doubles espaces
    while(stristr($parties, "  ")) {
      $parties = str_replace("  ", " ", $parties);
    }
    // On enlève un espace entre deux virgules
    while(stristr($parties, ", ,")) {
      $parties = str_replace(", ,", ",", $parties);
    }
    // on enlève d'éventuelles virgules en fin de ligne
    $parties = rtrim($parties, ',');
    // On déplace les espaces avant la virgule après la virgule
    $parties = str_replace(' ,', ', ', $parties);
    // On passe tout en minuscule
    // $parties = mb_strtolower($parties);

    return $parties;
  }
}
