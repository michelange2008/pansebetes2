<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Accueil2Controller extends Controller
{
  /**
   * undocumented function summary
   *
   * Undocumented function long description
   *
   * @param type var Description
   * @return return type
   */
  public function index()
  {
    dd(Auth()->user());
  }
}
