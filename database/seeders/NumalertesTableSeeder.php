<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NumalertesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('numalertes')->delete();

        \DB::table('numalertes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'mort_nv',
                'alerte_id' => 2007,
                'borne_inf' => 0,
                'borne_sup' => 10,
                'num_id' => 10,
                'denom_id' => 2,
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'mort_vaches',
                'alerte_id' => 2008,
                'borne_inf' => 0,
                'borne_sup' => 4,
                'num_id' => 1,
                'denom_id' => 1,
            ),
            2 =>
            array (
                'id' => 3,
                'nom' => 'nb_reformes',
                'alerte_id' => 2009,
                'borne_inf' => 15,
                'borne_sup' => 30,
                'num_id' => 7,
                'denom_id' => 1,
            ),
            3 =>
            array (
                'id' => 4,
                'nom' => 'frais_veto',
                'alerte_id' => 2010,
                'borne_inf' => 0,
                'borne_sup' => 80,
                'num_id' => 12,
                'denom_id' => 1,
            ),
            4 =>
            array (
                'id' => 5,
                'nom' => 'poids_gen_1IA',
                'alerte_id' => 2011,
                'borne_inf' => 0,
                'borne_sup' => 0,
                'num_id' => 47,
                'denom_id' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'nom' => 'premier_velage',
                'alerte_id' => 2012,
                'borne_inf' => 24,
                'borne_sup' => 36,
                'num_id' => NULL,
                'denom_id' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'nom' => 'velIA1',
                'alerte_id' => 2013,
                'borne_inf' => 0,
                'borne_sup' => 82,
                'num_id' => 33,
                'denom_id' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'nom' => 'plus3IA',
                'alerte_id' => 2014,
                'borne_inf' => 0,
                'borne_sup' => 20,
                'num_id' => 34,
                'denom_id' => 1,
            ),
            8 =>
            array (
                'id' => 9,
                'nom' => 'IA_fec_x10',
                'alerte_id' => 2015,
                'borne_inf' => 0,
                'borne_sup' => 1,
                'num_id' => 14,
                'denom_id' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'nom' => 'IVV',
                'alerte_id' => 2016,
                'borne_inf' => 365,
                'borne_sup' => 400,
                'num_id' => 35,
                'denom_id' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'nom' => 'non_del',
                'alerte_id' => 2017,
                'borne_inf' => 0,
                'borne_sup' => 10,
                'num_id' => 17,
                'denom_id' => 3,
            ),
            11 =>
            array (
                'id' => 12,
                'nom' => 'vel_genisses_diff',
                'alerte_id' => 2018,
                'borne_inf' => 0,
                'borne_sup' => 20,
                'num_id' => 15,
                'denom_id' => 5,
            ),
            12 =>
            array (
                'id' => 13,
                'nom' => 'metrites',
                'alerte_id' => 2019,
                'borne_inf' => 0,
                'borne_sup' => 10,
                'num_id' => 18,
                'denom_id' => 3,
            ),
            13 =>
            array (
                'id' => 14,
                'nom' => 'avortements',
                'alerte_id' => 2020,
                'borne_inf' => 0,
                'borne_sup' => 1,
                'num_id' => 16,
                'denom_id' => 3,
            ),
            14 =>
            array (
                'id' => 15,
                'nom' => 'fdl',
                'alerte_id' => 2021,
                'borne_inf' => 0,
                'borne_sup' => 1,
                'num_id' => 19,
                'denom_id' => 3,
            ),
            15 =>
            array (
                'id' => 16,
                'nom' => 'caillettes',
                'alerte_id' => 2022,
                'borne_inf' => 0,
                'borne_sup' => 1,
                'num_id' => 20,
                'denom_id' => 3,
            ),
            16 =>
            array (
                'id' => 17,
                'nom' => 'cetoses',
                'alerte_id' => 2023,
                'borne_inf' => 0,
                'borne_sup' => 1,
                'num_id' => 21,
                'denom_id' => 3,
            ),
            17 =>
            array (
                'id' => 18,
                'nom' => 'tb_anormaux',
                'alerte_id' => 2024,
                'borne_inf' => 0,
                'borne_sup' => 20,
                'num_id' => 32,
                'denom_id' => 1,
            ),
            18 =>
            array (
                'id' => 19,
                'nom' => 'tetanies',
                'alerte_id' => 2025,
                'borne_inf' => 0,
                'borne_sup' => 1,
                'num_id' => 22,
                'denom_id' => NULL,
            ),
            19 =>
            array (
                'id' => 20,
                'nom' => 'uree',
                'alerte_id' => 2029,
                'borne_inf' => 0,
                'borne_sup' => 400,
                'num_id' => 27,
                'denom_id' => NULL,
            ),
            20 =>
            array (
                'id' => 21,
                'nom' => 'cellules',
                'alerte_id' => 2030,
                'borne_inf' => 0,
                'borne_sup' => 250000,
                'num_id' => 26,
                'denom_id' => NULL,
            ),
            21 =>
            array (
                'id' => 22,
                'nom' => 'mammites',
                'alerte_id' => 2031,
                'borne_inf' => 0,
                'borne_sup' => 20,
                'num_id' => 23,
                'denom_id' => 3,
            ),
            22 =>
            array (
                'id' => 23,
                'nom' => 'nouv_mamm_tar',
                'alerte_id' => 2032,
                'borne_inf' => 0,
                'borne_sup' => 10,
                'num_id' => 24,
                'denom_id' => 3,
            ),
            23 =>
            array (
                'id' => 24,
                'nom' => 'primi_nouv_mamm_debut',
                'alerte_id' => 2033,
                'borne_inf' => 0,
                'borne_sup' => 10,
                'num_id' => 25,
                'denom_id' => 5,
            ),
            24 =>
            array (
                'id' => 25,
                'nom' => 'staphs',
                'alerte_id' => 2034,
                'borne_inf' => 0,
                'borne_sup' => 0,
                'num_id' => 28,
                'denom_id' => NULL,
            ),
            25 =>
            array (
                'id' => 26,
                'nom' => 'mort_24',
                'alerte_id' => 2035,
                'borne_inf' => 0,
                'borne_sup' => 5,
                'num_id' => 11,
                'denom_id' => 6,
            ),
            26 =>
            array (
                'id' => 27,
                'nom' => 'mort_1_S',
                'alerte_id' => 2036,
                'borne_inf' => 0,
                'borne_sup' => 5,
                'num_id' => 36,
                'denom_id' => 6,
            ),
            27 =>
            array (
                'id' => 28,
                'nom' => 'morb_veaux',
                'alerte_id' => 2037,
                'borne_inf' => 0,
                'borne_sup' => 5,
                'num_id' => 37,
                'denom_id' => 6,
            ),
            28 =>
            array (
                'id' => 29,
                'nom' => 'omph',
                'alerte_id' => 2038,
                'borne_inf' => 0,
                'borne_sup' => 5,
                'num_id' => 38,
                'denom_id' => 6,
            ),
            29 =>
            array (
                'id' => 30,
                'nom' => 'diarrhees_veaux',
                'alerte_id' => 2039,
                'borne_inf' => 0,
                'borne_sup' => 10,
                'num_id' => 39,
                'denom_id' => 6,
            ),
            30 =>
            array (
                'id' => 31,
                'nom' => 'respi_veaux',
                'alerte_id' => 2040,
                'borne_inf' => 0,
                'borne_sup' => 5,
                'num_id' => 40,
                'denom_id' => 6,
            ),
            31 =>
            array (
                'id' => 32,
                'nom' => 'diarrhees_J_A',
                'alerte_id' => 2045,
                'borne_inf' => 0,
                'borne_sup' => 25,
                'num_id' => 41,
                'denom_id' => 8,
            ),
            32 =>
            array (
                'id' => 33,
                'nom' => 'foies_saisis',
                'alerte_id' => 2051,
                'borne_inf' => 0,
                'borne_sup' => 0,
                'num_id' => 42,
                'denom_id' => NULL,
            ),
            33 =>
            array (
                'id' => 34,
                'nom' => 'boiterie_vache',
                'alerte_id' => 2055,
                'borne_inf' => 0,
                'borne_sup' => 5,
                'num_id' => 43,
                'denom_id' => 1,
            ),
            34 =>
            array (
                'id' => 35,
                'nom' => 'reforme_boiterie',
                'alerte_id' => 2056,
                'borne_inf' => 0,
                'borne_sup' => 1,
                'num_id' => 44,
                'denom_id' => NULL,
            ),
            35 =>
            array (
                'id' => 36,
                'nom' => 'boiterie_trait',
                'alerte_id' => 2057,
                'borne_inf' => 0,
                'borne_sup' => 15,
                'num_id' => 45,
                'denom_id' => 1,
            ),
            36 =>
            array (
                'id' => 37,
                'nom' => 'sabots_longs',
                'alerte_id' => 2058,
                'borne_inf' => 0,
                'borne_sup' => 10,
                'num_id' => 46,
                'denom_id' => 1,
            ),
            37 =>
            array (
                'id' => 38,
                'nom' => 'salmo',
                'alerte_id' => 2059,
                'borne_inf' => 0,
                'borne_sup' => 0,
                'num_id' => 29,
                'denom_id' => NULL,
            ),
            38 =>
            array (
                'id' => 39,
                'nom' => 'listeria',
                'alerte_id' => 2060,
                'borne_inf' => 0,
                'borne_sup' => 0,
                'num_id' => 30,
                'denom_id' => NULL,
            ),
            39 =>
            array (
                'id' => 40,
                'nom' => 'coli',
                'alerte_id' => 2061,
                'borne_inf' => 0,
                'borne_sup' => 0,
                'num_id' => 31,
                'denom_id' => NULL,
            ),
            40 =>
            array (
                'id' => 41,
                'nom' => 'nouv_IA_60',
                'alerte_id' => 2062,
                'borne_inf' => 0,
                'borne_sup' => 35,
                'num_id' => 48,
                'denom_id' => 1,
            ),
            41 =>
            array (
                'id' => 43,
                'nom' => '\'',
                'alerte_id' => 2001,
                'borne_inf' => 0,
                'borne_sup' => 2,
                'num_id' => NULL,
                'denom_id' => NULL,
            ),
        ));


    }
}
