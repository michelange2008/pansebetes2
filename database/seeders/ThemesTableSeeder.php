<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('themes')->delete();
        
        \DB::table('themes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'regard global sur le troupeau',
                'icone' => 'global.svg',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'reproduction du troupeau',
                'icone' => 'reproduction.svg',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Maladies métaboliques',
                'icone' => 'metabolique.svg',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'santé des jeunes',
                'icone' => 'jeunes.svg',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 'parasitisme',
                'icone' => 'parasitisme.svg',
            ),
            5 => 
            array (
                'id' => 6,
                'nom' => 'santé des mamelles',
                'icone' => 'mamelle.svg',
            ),
            6 => 
            array (
                'id' => 7,
                'nom' => 'santé des pieds',
                'icone' => 'pieds.svg',
            ),
        ));
        
        
    }
}