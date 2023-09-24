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
            ["nom" => "Non précisé"],
            ["nom" => "Eleveur.euse"],
            ["nom" => "Animateur.trice"],
            ["nom" => "Technicien.ne"],
            ["nom" => "Enseignant.e"],
            ["nom" => "Vétérinaire"],
            ["nom" => "Autre"],

        ]);
    }
}
