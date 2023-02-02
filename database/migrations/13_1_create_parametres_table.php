<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('parametres', function (Blueprint $table) {
          $table->id();
          $table->string('nom', 100);
          $table->string('detail', 191)->nullable();
          $table->foreignId('espece_id')->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
          $table->foreignId('typenum_id')->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
          $table->foreignId('groupe_id')->constrained()
                ->cascadeOnUpdate()->cascadeOnDelete();
          $table->decimal('step', $precision = 8, $scale = 1)->default(1);
          $table->boolean('supprimable')->default(1);
          $table->boolean('requis')->default(1);
          $table->integer('min')->default(0);
          $table->boolean('nonullable')->default(1);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
