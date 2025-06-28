<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('participants')->delete();
        
        \DB::table('participants')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Catherine EXPERTON',
                'institution' => ' pôle élevage',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Catherine ROFFET',
                'institution' => ' vétérinaire à Redon',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Christian FAIVRE',
                'institution' => ' technicien chambre d’agriculture du Doubs',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Félix MULLER',
                'institution' => ' conseiller technique BLE Pays Basque',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 'Hervé LONGY',
                'institution' => ' responsable de la ferme AB du Lycée agricole de Tulles/Naves',
            ),
            5 => 
            array (
                'id' => 6,
                'nom' => 'Jennifer LASSENE',
                'institution' => ' directrice d’exploitation',
            ),
            6 => 
            array (
                'id' => 7,
                'nom' => 'Julien FORTIN',
                'institution' => ' responsable de la Ferme expérimentale AB de Thorigné d’Anjou',
            ),
            7 => 
            array (
                'id' => 8,
                'nom' => 'Karine VAZEILLE',
                'institution' => ' INRA',
            ),
            8 => 
            array (
                'id' => 9,
                'nom' => 'Mattin EPHERRE',
                'institution' => ' stagiaire BLE Pays Basque',
            ),
            9 => 
            array (
                'id' => 10,
                'nom' => 'Michel BOUY',
                'institution' => ' vétérinaire ANTIKOR',
            ),
            10 => 
            array (
                'id' => 11,
                'nom' => 'Myriam DOUCET',
                'institution' => ' Idèle',
            ),
            11 => 
            array (
                'id' => 12,
                'nom' => 'Nathalie BAREILLE',
                'institution' => ' enseignante-chercheuse à ONIRIS Nantes',
            ),
            12 => 
            array (
                'id' => 13,
                'nom' => 'Nathalie LAROCHE',
                'institution' => ' vétérinaire SAS Zone Verte',
            ),
            13 => 
            array (
                'id' => 14,
                'nom' => 'Olivier LINCLAU',
                'institution' => ' technicien GAB 44',
            ),
            14 => 
            array (
                'id' => 15,
                'nom' => 'Olivier PATOUT',
                'institution' => ' vétérinaire à l’AVEM',
            ),
            15 => 
            array (
                'id' => 16,
                'nom' => 'Philippe ROUSSET',
                'institution' => ' Idèle',
            ),
            16 => 
            array (
                'id' => 17,
                'nom' => 'Renée DE CREMOUX',
                'institution' => ' service bien-être santé traçabilité hygiène',
            ),
            17 => 
            array (
                'id' => 18,
                'nom' => 'Sophie PRACHE',
                'institution' => ' INRA',
            ),
            18 => 
            array (
                'id' => 19,
                'nom' => 'Thierry MOUCHARD',
                'institution' => ' pôle élevage',
            ),
        ));
        
        
    }
}