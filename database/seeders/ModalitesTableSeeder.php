<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModalitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modalites')->delete();
        
        \DB::table('modalites')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'observations',
                'abbr' => 'OBS',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'paramètres numériques',
                'abbr' => 'NUM',
            ),
        ));
        
        
    }
}