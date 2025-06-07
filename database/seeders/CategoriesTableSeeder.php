<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'alimentation',
                'icone' => 'alimentation.svg',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'logement',
                'icone' => 'logement.svg',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'hygiène',
                'icone' => 'hygiene.svg',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'conduite',
                'icone' => 'conduite.svg',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 'santé',
                'icone' => 'sante.svg',
            ),
            5 => 
            array (
                'id' => 6,
                'nom' => 'génétique',
                'icone' => 'genetique.svg',
            ),
            6 => 
            array (
                'id' => 7,
                'nom' => 'divers',
                'icone' => 'divers.svg',
            ),
            7 => 
            array (
                'id' => 8,
                'nom' => 'parasitisme',
                'icone' => 'parasitisme.svg',
            ),
        ));
        
        
    }
}