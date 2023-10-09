<?php

namespace App\Http\Controllers;

use App\Comp\Titre;
use App\Models\Espece;
use App\Models\Paraferme;
use App\Models\Saisie;
use App\Models\Salerte;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

/**
 * Affichage des statistiques d'utilisation du site
 */
class StatsController extends Controller
{
    function generales(): View
    {

        $nb_utilisateurs = User::where('role_id', '<>', 1)->count();
        $nb_user_saisie = Saisie::all()->groupBy('user_id')->count();
        $nb_saisies = Saisie::count();

        $cards = [
            [
                'titre' => $nb_utilisateurs." utilisateurs",
                'soustitre' => "enregistrés"
            ],
            [
                'titre' => $nb_saisies." panse-bêtes", 
                'soustitre' => "réalisés par".$nb_user_saisie." utilisateurs"
            ],
            [
                'titre' => round($nb_saisies / $nb_user_saisie, 1)." panse-bêtes",
                'soustitre' => "réalisés en moyenne par utilisateur"
            ]
            
        ];

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

        return view('stats.generales', [
            'cards' => $cards,
            'titre' => $titre,
            'nb_pb_mensuel' => $nb_pb_mensuel,
            'origine_users' => $origine_users,
            'profession_users' => $profession_users,
        ]);
    }

    function elevages($espece_nom) : View {

        $espece = Espece::where('nom', $espece_nom)->first();

        $nb_exploitations = DB::table('paraferme_user')
                            ->join('users', 'users.id', 'paraferme_user.user_id' )
                            ->join('saisies', 'saisies.user_id', 'users.id')
                            ->where('saisies.espece_id', $espece->id)
                            ->groupBy('paraferme_user.user_id')
                            ->get();
        foreach ($nb_exploitations as $exploitation) {
            dump($exploitation->SAU);
        }
        dd();
        
        $nb_saisies_salertes = DB::table('salertes')->where('danger', 1)
        ->select('saisie_id', DB::raw('count(*) as total'))
        ->groupBy('saisie_id')
        ->orderBy('total', 'asc')
        ->pluck('total');
        
        
        $salertes = DB::table('salertes')->where('danger', 1)
        ->join('alertes', 'alertes.id', 'salertes.alerte_id')
        ->join('especes', 'especes.id', 'alertes.espece_id')
        ->select('especes.nom as espece_nom', 'alertes.nom as alerte_nom')
        ->get();
        
        $titre = new Titre("divers/ferme_blanche.svg", "Synthèse des Panse-Bête par type d'élevages", false);
        return view('stats.elevages', [
            "titre" => $titre,
            'nb_saisies_salertes' => $nb_saisies_salertes,
        ]);
    }
}
