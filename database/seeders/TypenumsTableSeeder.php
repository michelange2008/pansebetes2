<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypenumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('typenums')->delete();

      \DB::table('typenums')->insert([

        [
          'nom' => "entier",
          'detail' => "1 - 20 - 32",
          'step' => 1,
          'arrondi' => 0,
        ],
        [
          'nom' => "décimal avec 1 chiffre après la virgule",
          'detail' => "0,1 - 1,4 - 10,3",
          'step' => 0.1,
          'arrondi' => 1,
        ],
        [
          'nom' => "décimal avec 2 chiffres après la virgule",
          'detail' => "1,34 - 20,50 - 32,12",
          'step' => 0.01,
          'arrondi' => 2,
        ],
        [
          'nom' => "décimal avec 3 chiffres après la virgule",
          'detail' => "1,234, 24,498",
          'step' => 0.001,
          'arrondi' => 3,
        ],

      ]);

    }
}
