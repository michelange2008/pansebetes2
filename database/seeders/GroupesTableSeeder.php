<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


      \DB::table('groupes')->delete();

      \DB::table('groupes')->insert(array (
          0 =>
          array (
              'id' => 1,
              'nom' => 'effectifs',
              'icone' => 'default.svg',
              'ordre' => 1,
          ),
          1 =>
          array (
              'id' => 2,
              'nom' => 'mortalité',
              'icone' => 'default.svg',
              'ordre' => 2,
          ),
          2 =>
          array (
              'id' => 3,
              'nom' => 'reproduction',
              'icone' => 'default.svg',
              'ordre' => 3,
          ),
          3 =>
          array (
              'id' => 4,
              'nom' => 'lait et mamelle',
              'icone' => 'default.svg',
              'ordre' => 5,
          ),
          4 =>
          array (
              'id' => 5,
              'nom' => 'jeunes',
              'icone' => 'default.svg',
              'ordre' => 6,
          ),
          5 =>
          array (
              'id' => 6,
              'nom' => 'pieds',
              'icone' => 'default.svg',
              'ordre' => 7,
          ),
          6 =>
          array (
              'id' => 7,
              'nom' => 'parasitisme',
              'icone' => 'default.svg',
              'ordre' => 8,
          ),
          7 =>
          array (
              'id' => 8,
              'nom' => 'divers',
              'icone' => 'default.svg',
              'ordre' => 9,
          ),
          8 =>
          array (
            'id' => 9,
            'nom' => 'post-partum',
            'icone' => 'default.svg',
            'ordre' => 4,
          )
      ));
        
    }
}
