<?php

namespace App\Traits;

trait LitCsv
{
  public static function litCsv(string $csv, bool $entetes=false , string $sep=";")
  {

    $csvAvecChemin = storage_path('app/public') . "/" . $csv;

    if (($fichier = fopen($csvAvecChemin, 'r')) !== FALSE) {

      $table = [];

      while (($data = fgetcsv($fichier, null, $sep)) !== FALSE) {
        dump($data);

        $table[] = explode(";", $data[0]);
      }
      if ($entetes) {
        $table = array_slice($table, 1);
      }

      return $table;
    }
  }

  /**
   * Crée un array avec la première colonne du csv comme clefs
   *
   * @param Csv $csv dont le première colonne doit faire les clefs
   * @return Array $table
   **/
  public function litCsvKeyFirstCol(string $csv, bool $entetes=false, string $sep=";")
  {
    $csvAvecChemin = storage_path('app/public') . "/" . $csv;

    if (($fichier = fopen($csvAvecChemin, 'r')) !== FALSE) {

      $table = [];

      while (($data = fgetcsv($fichier, null, $sep)) !== FALSE) {

        $table[($data[0])] = $data[1];

      }

      if ($entetes) {

        $table = array_slice($table, 1);

      }

      return $table;
    }
  }
}
