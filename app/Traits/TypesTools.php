<?php
namespace App\Traits;

use App\Models\Type;

/**
 * Forunit des informations sur le type d'alerte en fonction d'un id ou d'un nom
 */
trait TypesTools
{
  /**
   * Test si la variable est un id ou un nom de Type
   * @param  [type]  $var
   * @return boolean     true si c'est un id ou un nom de type
   */
  function isType($var)
  {
      if ( Type::find($var) != null ) {

        $isType = true;

      }

      elseif ( Type::where('nom', $var)->first() != null ) {

        $isType = true;

      }

      else {

        $isType = false;

      }


    return $isType;

  }

  /**
   * fonction générique utilisée pour chaque type testé
   *
   * @param type var valeur que l'on veut tester
   * @param string nom du type (liste, valeur, etc.)
   * @param integer id du type (1, 2, 3, 4)
   * @return boolean
   */
  public function test($var, $nom = '', $id = null)
  {
    $var = trim(mb_strtolower($var));

    if ( $this->isType($var) && ( $var == $nom || $var == $id )) {

      return true;

    } else {

      return false;

    }
  }

  /**
   * Test si la variable est 1 ou liste et idem pour la suite avec les autres
   * types
   * @param  [type]  $var
   * @return boolean
   */
  public function isListe($var)
  {

    return $this->test($var, 'liste', 1);

  }

  /**
   * Renvoie TRUE si l'alerte est de type valeur
   *
   */
  public function isRatio($var)
  {

    return $this->test($var, 'ratio', 2);

  }

    /**
     * Renvoie TRUE si l'alerte est de type valeur
     *
     */
    public function isPourcentage($var)
    {

      return $this->test($var, 'pourcentage', 3);

    }

  /**
   * Renvoie TRUE si l'alerte est de type entier
   *
   */
  public function isEntier($var)
  {

    return $this->test($var, 'entier', 4);

  }

  /**
   * Renvoie TRUE si l'alerte est de type decimal
   *
   */
  public function isDecimal($var)
  {

    return $this->test($var, 'decimal', 5);

  }
}
