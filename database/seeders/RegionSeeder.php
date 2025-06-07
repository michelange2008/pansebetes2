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
                [
                    "id" => 1,
                    "nom" => "Auvergne-Rhône-Alpes"
                ],
                [
                    "id" => 2,
                    "nom" => "Bourgogne-Franche-Comté"
                ],
                [
                    "id" => 3,
                    "nom" => "Bretagne"
                ],
                [
                    "id" => 4,
                    "nom" => "Centre-Val de Loire"
                ],
                [
                    "id" => 5,
                    "nom" => "Corse"
                ],
                [
                    "id" => 6,
                    "nom" => "Grand Est"
                ],
                [
                    "id" => 7,
                    "nom" => "Guadeloupe"
                ],
                [
                    "id" => 8,
                    "nom" => "Guyane"
                ],
                [
                    "id" => 9,
                    "nom" => "Hauts-de-France"
                ],
                [
                    "id" => 10,
                    "nom" => "Île-de-France"
                ],
                [
                    "id" => 11,
                    "nom" => "La Réunion"
                ],
                [
                    "id" => 12,
                    "nom" => "Martinique"
                ],
                [
                    "id" => 13,
                    "nom" => "Mayotte"
                ],
                [
                    "id" => 14,
                    "nom" => "Normandie"
                ],
                [
                    "id" => 15,
                    "nom" => "Nouvelle-Aquitaine"
                ],
                [
                    "id" => 16,
                    "nom" => "Occitanie"
                ],
                [
                    "id" => 17,
                    "nom" => "Pays de la Loire"
                ],
                [
                    "id" => 18,
                    "nom" => "Provence-Alpes-Côte d'Azur"
                ],
                [
                    "id" => 100,
                    "nom" => "Non précisé"
                ],
            ]
        );
    }
}
