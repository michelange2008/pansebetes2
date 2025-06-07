<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      // $this->call(CategoriesTableSeeder::class);
      // $this->call(ModalitesTableSeeder::class);
      // $this->call(GroupesTableSeeder::class);
      // $this->call(ThemesTableSeeder::class);
      // $this->call(RoleTableSeeder::class);
      // $this->call(EspecesTableSeeder::class);
      // $this->call(TypesTableSeeder::class);
      // $this->call(ParafermesTableSeeder::class);
      // $this->call(AlertesTableSeeder::class);
      // $this->call(TypenumsTableSeeder::class);
      // $this->call(ChiffresTableSeeder::class);
      // $this->call(CritalertesTableSeeder::class);
      // $this->call(NumalertesTableSeeder::class);
      // $this->call(OriginesTableSeeder::class);
      // $this->call(ParticipantsTableSeeder::class);
      // $this->call(EspeceParticipantTableSeeder::class);

      // $this->call(UsersTableSeeder::class);

      $this->call(NotesTableSeeder::class);
      $this->call(SaisiesTableSeeder::class);
      $this->call(SalertesTableSeeder::class);
      $this->call(SchiffresTableSeeder::class);
      $this->call(SoriginesTableSeeder::class);
      $this->call(AmisTableSeeder::class);
      $this->call(EspeceNoteTableSeeder::class);
      $this->call(ParafermeUserTableSeeder::class);

    }
}
