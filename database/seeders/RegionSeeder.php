<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert(
            [
                ["nom" => "Guadeloupe"],
                ["nom" => "Martinique"],
                ["nom" => "Guyane"],
                ["nom" => "La Réunion"],
                ["nom" => "Mayotte"],
                ["nom" => "Île-de-France"],
                ["nom" => "Centre-Val de Loire"],
                ["nom" => "Bourgogne-Franche-Comté"],
                ["nom" => "Normandie"],
                ["nom" => "Hauts-de-France"],
                ["nom" => "Grand Est"],
                ["nom" => "Pays de la Loire"],
                ["nom" => "Bretagne"],
                ["nom" => "Nouvelle-Aquitaine"],
                ["nom" => "Occitanie"],
                ["nom" => "Auvergne-Rhône-Alpes"],
                ["nom" => "Provence-Alpes-Côte d'Azur"],
                ["nom" => "Corse"],
                ["nom" => "Non précisé"],
            ]
        );
    }
}
