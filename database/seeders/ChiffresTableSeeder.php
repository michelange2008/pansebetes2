<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChiffresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('chiffres')->delete();

        \DB::table('chiffres')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'Nombre de vaches',
                'espece_id' => 2,
                'groupe_id' => 1,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'Nombre de génisses de la naissance au vélage',
                'espece_id' => 2,
                'groupe_id' => 1,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
        ),
            2 =>
            array (
                'id' => 3,
                'nom' => 'Nombre de vélages',
                'espece_id' => 2,
                'groupe_id' => 1,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            3 =>
            array (
                'id' => 4,
                'nom' => 'nombre de vélages de vaches',
                'espece_id' => 2,
                'groupe_id' => 1,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            4 =>
            array (
                'id' => 5,
                'nom' => 'Nombre de vélages de génisses',
                'espece_id' => 2,
                'groupe_id' => 1,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            5 =>
            array (
                'id' => 6,
                'nom' => 'nombre de veaux nés',
                'espece_id' => 2,
                'groupe_id' => 1,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            6 =>
            array (
                'id' => 7,
                'nom' => 'nombre de vaches réformées',
                'espece_id' => 2,
                'groupe_id' => 1,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            7 =>
            array (
                'id' => 8,
                'nom' => 'nombre d’animaux au pâturage',
                'espece_id' => 2,
                'groupe_id' => 1,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            8 =>
            array (
                'id' => 9,
                'nom' => 'nombre de vaches mortes',
                'espece_id' => 2,
                'groupe_id' => 2,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            9 =>
            array (
                'id' => 10,
                'nom' => 'Nombre d’animaux morts de la naissance au vélage',
                'espece_id' => 2,
                'groupe_id' => 2,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            10 =>
            array (
                'id' => 11,
                'nom' => 'nombre de veaux morts dans les 24 premières heures',
                'espece_id' => 2,
                'groupe_id' => 2,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            11 =>
            array (
                'id' => 12,
                'nom' => 'Frais vétérinaires (hors conseil)',
                'espece_id' => 2,
                'groupe_id' => 8,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            12 =>
            array (
                'id' => 13,
                'nom' => 'âge au premier vélage',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            13 =>
            array (
                'id' => 14,
                'nom' => 'nombre d’IA par IA fécondante',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            14 =>
            array (
                'id' => 15,
                'nom' => 'nombre de vélages de génisses difficiles',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            15 =>
            array (
                'id' => 16,
                'nom' => 'nombre d’avortements',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            16 =>
            array (
                'id' => 17,
                'nom' => 'nombre de non délivrances',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            17 =>
            array (
                'id' => 18,
                'nom' => 'nombre de métrites',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            18 =>
            array (
                'id' => 19,
                'nom' => 'nombre de fièvres de lait',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            19 =>
            array (
                'id' => 20,
                'nom' => 'nombre de caillettes',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            20 =>
            array (
                'id' => 21,
                'nom' => 'nombre de cétoses',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            21 =>
            array (
                'id' => 22,
                'nom' => 'nombre de tétanies d’herbage',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            22 =>
            array (
                'id' => 23,
                'nom' => 'nombre de mammites',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            23 =>
            array (
                'id' => 24,
                'nom' => 'nombre de nouvelles mammites au tarissement',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            24 =>
            array (
                'id' => 25,
                'nom' => 'nombre de nouvelles mammites des primipares en début de lactation',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            25 =>
            array (
                'id' => 26,
                'nom' => 'taux cellulaire moyen',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            26 =>
            array (
                'id' => 27,
                'nom' => 'taux d’urée moyen',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            27 =>
            array (
                'id' => 28,
                'nom' => 'nombre de cas de présence de staphylocoques',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            28 =>
            array (
                'id' => 29,
                'nom' => 'nombre de cas de présence de salmonelles',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            29 =>
            array (
                'id' => 30,
                'nom' => 'nombre de cas de présence de listeria',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            30 =>
            array (
                'id' => 31,
                'nom' => 'nombre de cas de présence de E coli',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            31 =>
            array (
                'id' => 32,
                'nom' => 'nombre de TB anormaux',
                'espece_id' => 2,
                'groupe_id' => 4,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            32 =>
            array (
                'id' => 33,
                'nom' => 'intervalle vélage 1ère IA',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            33 =>
            array (
                'id' => 34,
                'nom' => 'nombre de vaches à 3 IA ou plus',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            34 =>
            array (
                'id' => 35,
                'nom' => 'intervalle vélage vélage',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            35 =>
            array (
                'id' => 36,
                'nom' => 'nombre de veaux morts de 1 jour au sevrage',
                'espece_id' => 2,
                'groupe_id' => 2,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            36 =>
            array (
                'id' => 37,
                'nom' => 'nombre de veaux malades',
                'espece_id' => 2,
                'groupe_id' => 5,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            37 =>
            array (
                'id' => 38,
                'nom' => 'nombre de gros nombrils',
                'espece_id' => 2,
                'groupe_id' => 5,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            38 =>
            array (
                'id' => 39,
                'nom' => 'nombre de diarrhées chez les veaux',
                'espece_id' => 2,
                'groupe_id' => 5,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            39 =>
            array (
                'id' => 40,
                'nom' => 'nombre de cas de maladie respiratoire',
                'espece_id' => 2,
                'groupe_id' => 5,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            40 =>
            array (
                'id' => 41,
                'nom' => 'nombre de diarrhées chez les jeunes et les adultes',
                'espece_id' => 2,
                'groupe_id' => 7,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            41 =>
            array (
                'id' => 42,
                'nom' => 'nombre de foies saisis',
                'espece_id' => 2,
                'groupe_id' => 7,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            42 =>
            array (
                'id' => 43,
                'nom' => 'nombre de vaches qui boitent',
                'espece_id' => 2,
                'groupe_id' => 6,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            43 =>
            array (
                'id' => 44,
                'nom' => 'nombre de réforme pour boiterie',
                'espece_id' => 2,
                'groupe_id' => 6,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
          ),
            44 =>
            array (
                'id' => 45,
                'nom' => 'nombre de vaches traitées pour boiterie',
                'espece_id' => 2,
                'groupe_id' => 6,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            45 =>
            array (
                'id' => 46,
                'nom' => 'nombre de vaches avec des sabots longs',
                'espece_id' => 2,
                'groupe_id' => 6,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            46 =>
            array (
                'id' => 47,
                'nom' => 'Poids des génisses à la 1ère insémination',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            47 =>
            array (
                'id' => 48,
                'nom' => 'nombre de vaches réinséminées 60 jours après une IA',
                'espece_id' => 2,
                'groupe_id' => 3,
                'supprimable' => 0,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
            48 =>
            array (
                'id' => 59,
                'nom' => 'mortalité estivale',
                'espece_id' => 2,
                'groupe_id' => 2,
                'supprimable' => 1,
                'typenum_id' => 1,
                'requis' => 1,
                'min' => 0,
            ),
        ));


    }
}
