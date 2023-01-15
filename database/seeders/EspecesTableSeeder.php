<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EspecesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('especes')->delete();
        
        \DB::table('especes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'vaches allaitantes',
                'abbr' => 'VA',
                'icone' => 'VA.svg',
                'fini' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'vaches laitières',
                'abbr' => 'VL',
                'icone' => 'VL.svg',
                'fini' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'chèvres laitières',
                'abbr' => 'CP',
                'icone' => 'CP.svg',
                'fini' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'brebis allaitantes',
                'abbr' => 'OA',
                'icone' => 'OA.svg',
                'fini' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 'brebis laitières',
                'abbr' => 'OL',
                'icone' => 'OL.svg',
                'fini' => 0,
            ),
        ));
        
        
    }
}