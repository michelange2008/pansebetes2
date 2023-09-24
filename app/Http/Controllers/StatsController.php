<?php

namespace App\Http\Controllers;

use App\Comp\Titre;
use App\Models\Saisie;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

/**
 * Affichage des statistiques d'utilisation du site
 */
class StatsController extends Controller
{
    function index(): View
    {

        $nb_utilisateurs = User::where('role_id', '<>', 1)->count();
        $nb_user_saisie = Saisie::all()->groupBy('user_id')->count();
        $nb_saisies = Saisie::count();

        $nb_pb_mensuel_options = [
            'chart_title' => 'Nombre mensuel de Panses-bêtes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Saisie',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];

        $nb_pb_mensuel = new LaravelChart($nb_pb_mensuel_options);

        $origine_users = [
            'chart_title' => 'Origine des utilisateurs.trices',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\User',
            'relationship_name' => "region",
            'group_by_field' => 'nom',
            'chart_type' => 'pie',
        ];

        $origine_users = new LaravelChart($origine_users);

        $profession_users = [
            'chart_title' => 'Professions des utilisateurs.trices',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\User',
            'relationship_name' => "profession",
            'group_by_field' => 'nom',
            'chart_type' => 'pie',
        ];

        $profession_users = new LaravelChart($profession_users);

        $titre = new Titre("stats_clair.svg", "Statistiques d'utilisations de Panse-Bête", false);

        return view('stats.index', [
            'nb_utilisateurs' => $nb_utilisateurs,
            'nb_user_saisie' => $nb_user_saisie,
            'nb_saisies' => $nb_saisies,
            'titre' => $titre,
            'nb_pb_mensuel' => $nb_pb_mensuel,
            'origine_users' => $origine_users,
            'profession_users' => $profession_users,
        ]);
    }
}
