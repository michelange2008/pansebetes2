<?php

namespace Database\Seeders;

use DB;
use Flynsarmy\CsvSeeder\CsvSeeder;

class ParametresTableSeeder extends CsvSeeder
{
  /**
   * Constructeur
   *
   * Définition de la table et du fichier source
   *
   * @param type var Description
   * @return return type
   */
  public function __construct()
  {
      $this->table= 'parametres';
      $this->csv_delimiter = ';';
      $this->filename = base_path().'/storage/app/public/csvs/pb_parametres.csv';
      $this->should_trim = true;
  }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();

        DB::table($this->table)->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        parent::run();
    }
}
