<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParafermesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('parafermes')->delete();
        
        \DB::table('parafermes')->insert(array (
            0 => 
            array (
                'id' => 3,
                'nom' => 'SAU',
                'type' => 'int',
                'unite' => 'ha',
                'parties' => NULL,
                'ordre' => 2,
                'supprimable' => 1,
            ),
            1 => 
            array (
                'id' => 24,
                'nom' => 'Alimentation',
                'type' => 'liste',
                'unite' => NULL,
                'parties' => 'maïs-soja, tout herbe, foin pâturage, choucroute',
                'ordre' => 3,
                'supprimable' => 1,
            ),
            2 => 
            array (
                'id' => 25,
                'nom' => 'UTH',
                'type' => 'float',
                'unite' => NULL,
                'parties' => NULL,
                'ordre' => 1,
                'supprimable' => 1,
            ),
            3 => 
            array (
                'id' => 26,
                'nom' => 'Logement',
                'type' => 'liste',
                'unite' => NULL,
                'parties' => 'aire paillée, logettes, plein air',
                'ordre' => NULL,
                'supprimable' => 1,
            ),
        ));
        
        
    }
}