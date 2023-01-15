<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EspeceParticipantTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('espece_participant')->delete();
        
        \DB::table('espece_participant')->insert(array (
            0 => 
            array (
                'espece_id' => 1,
                'participant_id' => 5,
            ),
            1 => 
            array (
                'espece_id' => 1,
                'participant_id' => 7,
            ),
            2 => 
            array (
                'espece_id' => 1,
                'participant_id' => 10,
            ),
            3 => 
            array (
                'espece_id' => 1,
                'participant_id' => 12,
            ),
            4 => 
            array (
                'espece_id' => 1,
                'participant_id' => 19,
            ),
            5 => 
            array (
                'espece_id' => 2,
                'participant_id' => 2,
            ),
            6 => 
            array (
                'espece_id' => 2,
                'participant_id' => 3,
            ),
            7 => 
            array (
                'espece_id' => 2,
                'participant_id' => 12,
            ),
            8 => 
            array (
                'espece_id' => 2,
                'participant_id' => 13,
            ),
            9 => 
            array (
                'espece_id' => 2,
                'participant_id' => 14,
            ),
            10 => 
            array (
                'espece_id' => 2,
                'participant_id' => 19,
            ),
            11 => 
            array (
                'espece_id' => 3,
                'participant_id' => 1,
            ),
            12 => 
            array (
                'espece_id' => 3,
                'participant_id' => 2,
            ),
            13 => 
            array (
                'espece_id' => 3,
                'participant_id' => 6,
            ),
            14 => 
            array (
                'espece_id' => 3,
                'participant_id' => 13,
            ),
            15 => 
            array (
                'espece_id' => 3,
                'participant_id' => 16,
            ),
            16 => 
            array (
                'espece_id' => 3,
                'participant_id' => 17,
            ),
            17 => 
            array (
                'espece_id' => 3,
                'participant_id' => 19,
            ),
            18 => 
            array (
                'espece_id' => 4,
                'participant_id' => 1,
            ),
            19 => 
            array (
                'espece_id' => 4,
                'participant_id' => 4,
            ),
            20 => 
            array (
                'espece_id' => 4,
                'participant_id' => 8,
            ),
            21 => 
            array (
                'espece_id' => 4,
                'participant_id' => 9,
            ),
            22 => 
            array (
                'espece_id' => 4,
                'participant_id' => 11,
            ),
            23 => 
            array (
                'espece_id' => 4,
                'participant_id' => 13,
            ),
            24 => 
            array (
                'espece_id' => 4,
                'participant_id' => 15,
            ),
            25 => 
            array (
                'espece_id' => 4,
                'participant_id' => 16,
            ),
            26 => 
            array (
                'espece_id' => 4,
                'participant_id' => 18,
            ),
            27 => 
            array (
                'espece_id' => 4,
                'participant_id' => 19,
            ),
            28 => 
            array (
                'espece_id' => 5,
                'participant_id' => 1,
            ),
            29 => 
            array (
                'espece_id' => 5,
                'participant_id' => 4,
            ),
            30 => 
            array (
                'espece_id' => 5,
                'participant_id' => 8,
            ),
            31 => 
            array (
                'espece_id' => 5,
                'participant_id' => 9,
            ),
            32 => 
            array (
                'espece_id' => 5,
                'participant_id' => 11,
            ),
            33 => 
            array (
                'espece_id' => 5,
                'participant_id' => 13,
            ),
            34 => 
            array (
                'espece_id' => 5,
                'participant_id' => 15,
            ),
            35 => 
            array (
                'espece_id' => 5,
                'participant_id' => 16,
            ),
            36 => 
            array (
                'espece_id' => 5,
                'participant_id' => 18,
            ),
            37 => 
            array (
                'espece_id' => 5,
                'participant_id' => 19,
            ),
        ));
        
        
    }
}