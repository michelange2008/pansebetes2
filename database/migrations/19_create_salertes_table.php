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
        Schema::create('salertes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alerte_id')->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('saisie_id')->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('valeur', 191);
            $table->boolean('danger')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salertes');
    }
};
