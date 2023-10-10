<?php
namespace App\Traits;

use App\Models\Saisie;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
/**
 * Fournit les valeurs calculées et les graphiques pour l'affichage des statistiques
 * d'utilisation du site Panse-Bêtes. 
 */
trait StatsGenerales
{

    /**
     * Renvoie un tableau prêt à être affiché sous forme de cards
     * avec les nombres d'utilisateurs, de panse-bêtes réalisés, ...
     *
     * @return array
     */
    function cardsStatsPb() : array {
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

        return $cards;

    }
    /**
     * Génère un histogramme avec la quantité de panse-bêtes
     * réalisés
     *
     * @return LaravelChart
     */
    function nbPbMensuels() : LaravelChart {

        $nb_pb_mensuel_options = [
            'chart_title' => 'Nombre mensuel de Panses-bêtes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Saisie',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];

        $nb_pb_mensuel = new LaravelChart($nb_pb_mensuel_options);
        
        return $nb_pb_mensuel;
    }
    /**
     * Génère un graphique en camembert avec les régions d'origine
     * des personnes inscrites à Panse-Bêtes
     *
     * @return LaravelChart
     */
    function origineUsers() : LaravelChart {
        
        $origine_users = [
            'chart_title' => 'Origine des utilisateurs.trices',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\User',
            'relationship_name' => "region",
            'group_by_field' => 'nom',
            'chart_type' => 'pie',
        ];

        $origine_users = new LaravelChart($origine_users);

        return $origine_users;
    }

    /**
     * Génère un graphique en camembert avec les professions
     * des personnes inscrites à Panse-Bêtes
     *
     * @return LaravelChart
     */
    function professionUsers() : LaravelChart {
        
        $profession_users = [
            'chart_title' => 'Professions des utilisateurs.trices',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\User',
            'relationship_name' => "profession",
            'group_by_field' => 'nom',
            'chart_type' => 'pie',
        ];

        $profession_users = new LaravelChart($profession_users);

        return $profession_users;
    }
    
}