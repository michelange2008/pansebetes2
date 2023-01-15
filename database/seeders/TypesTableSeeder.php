<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('types')->delete();

        \DB::table('types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nom' => 'liste',
                'detail' => 'Liste des options possibles',
            ),
            1 =>
            array (
                'id' => 2,
                'nom' => 'ratio',
                'detail' => 'Ratio: par exemple Frais vétérinaires par vache présente',
            ),
            2 =>
            array (
                'id' => 3,
                'nom' => 'pourcentage',
                'detail' => 'Pourcentage: par exemple taux de mortalité = animaux morts / total animaux',
            ),
            3 =>
            array (
                'id' => 4,
                'nom' => 'entier',
                'detail' => 'Valeur numérique entière: 0, 1, 2, etc.',
            ),
            4 =>
            array (
                'id' => 5,
                'nom' => 'decimal',
                'detail' => 'Valeur numérique décimale: par exemple 1,2',
            ),
        ));


    }
}
