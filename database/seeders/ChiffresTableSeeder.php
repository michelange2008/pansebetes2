<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;

class ChiffresTableSeeder extends CsvSeeder
{
  public function __construct()
  {
      $this->table= 'chiffres';
      $this->csv_delimiter = ';';
      $this->filename = base_path('storage/csv/pb_chiffres.csv');
      $this->should_trim = true;
  }

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {
    \DB::disableQueryLog();

    \DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    \DB::table($this->table)->truncate();

    \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    parent::run();


  }

}
