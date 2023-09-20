<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Affichage des statistiques d'utilisation du site
 */
class StatsController extends Controller
{
    function index() : View {
        
        return view('stats.index');
    }
}
