<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professions')->insert([
            [
                "id" => 10,
                "nom" => "Animateur.trice"
            ],
            [
                "id" => 20,
                "nom" => "Éleveur.euse"
            ],
            [
                "id" => 30,
                "nom" => "Enseignant.e"
            ],
            [
                "id" => 40,
                "nom" => "Étudiant.e"
            ],
            [
                "id" => 50,
                "nom" => "Technicien.ne"
            ],
            [
                "id" => 60,
                "nom" => "Vétérinaire"
            ],
            [
                "id" => 90,
                "nom" => "Autre"
            ],
            [
                "id" => 100,
                "nom" => "Non précisé"
            ],

        ]);
    }
}
