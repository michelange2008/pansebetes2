<?php

namespace App\Traits;

trait LitJson
{
  public static function litJson($json)
  {
      $jsonAvecChemin = storage_path('json')."/".$json;

      $json_source = file_get_contents($jsonAvecChemin);

      $infos = json_decode($json_source);

      return $infos;

  }

  public function jsonExist($json)
  {
    $jsonAvecChemin = storage_path('json')."/".$json;

    return file_exists($jsonAvecChemin);

  }
}
