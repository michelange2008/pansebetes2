<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('roles')->insert([
        [
          'id' => 1,
          'nom' => 'webmaster',
        ],
        [
          'id' => 2,
          'nom' => 'admin',
        ],
        [
          'id' => 3,
          'nom' => 'user',
        ],
      ]);
        //
    }
}
