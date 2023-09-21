<?php

namespace App\Http\Controllers;

use App\Comp\Titre;
use App\Models\Saisie;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Affichage des statistiques d'utilisation du site
 */
class StatsController extends Controller
{
    function index() : View {

        $nb_utilisateurs = User::where('role_id', 1)->count();
        $nb_saisies = Saisie::count();

        $titre = new Titre("stats_clair.svg", "Statistiques d'utilisations de Panse-Bête", false);
        
        return view('stats.index', [
            'nb_utilisateurs' => $nb_utilisateurs,
            'nb_saisies' => $nb_saisies,
            'titre' => $titre,
        ]);
    }
}
