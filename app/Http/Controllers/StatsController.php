<?php

namespace App\Http\Controllers;

use App\Comp\Titre;
use App\Models\Espece;
use App\Models\Paraferme;
use App\Models\Salerte;
use App\Traits\StatsExploitations;
use App\Traits\StatsGenerales;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

/**
 * Affichage des statistiques d'utilisation du site
 */
class StatsController extends Controller
{
    use StatsExploitations, StatsGenerales;

    function generales(): View
    {

        $titre = new Titre(
            icone: "stats_clair.svg",
            titre: "Statistiques d'utilisations de Panse-Bête",
            translate: false,
            soustitre: null,
            bouton: null
        );
        // Utilisation du trait StatsGenerales pour générer les valeurs
        return view('stats.generales', [
            'titre' => $titre,
            'cards' => $this->cardsStatsPb(),
            'nb_pb_mensuel' => $this->nbPbMensuels(),
            'origine_users' => $this->origineUsers(),
            'profession_users' => $this->professionUsers(),
        ]);
    }

    /**
     * Statistiques des exploitations
     *
     * @return View
     **/
    public function exploitations(): View
    {
        $titre = new Titre(icone: "divers/ferme_blanche.svg", titre: "Synthèse des exploitations", translate: false);

            $signesQualite = $this->signesQualites();
        return view('stats.exploitations', [
            'titre' => $titre,
            'types_production' => $this->typesProductions(), // Utilisation du trait StatsExploitations
            'sauGraph' => $this->SAUexploitations(), // idem avec la fonction SAUexploitations()
            'signesQualite' => $this->signesQualites(),
            'uth' => $this->uth(),
        ]);
    }

    function pansebetes($espece_nom): View
    {
        $espece = Espece::where('nom', $espece_nom)->first();

        $nb_exploitations = DB::table('paraferme_user')
            ->join('users', 'users.id', 'paraferme_user.user_id')
            ->join('saisies', 'saisies.user_id', 'users.id')
            ->where('saisies.espece_id', $espece->id)
            ->groupBy('paraferme_user.user_id')
            ->get();
        foreach ($nb_exploitations as $exploitation) {
            dump($exploitation);
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
        return view('stats.pansebetes', [
            "titre" => $titre,
            'nb_saisies_salertes' => $nb_saisies_salertes,
        ]);
    }
}
