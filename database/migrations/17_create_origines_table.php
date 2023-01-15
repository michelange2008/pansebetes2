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
        Schema::create('origines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alerte_id')->constrained();
            $table->string('question', 191);
            $table->string('reponse', 191);
            $table->foreignId('categorie_id')->constrained();
            $table->boolean('supprimable')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('origines');
    }
};
