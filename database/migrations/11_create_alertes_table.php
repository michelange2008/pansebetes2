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
        Schema::create('alertes', function (Blueprint $table) {
            $table->id();
            $table->boolean('actif')->default(1);
            $table->boolean('supprimable')->default(1);
            $table->string('nom', 191)->index('alertes_nom_index');
            // $table->bigInteger('type_id')->unsigned();
            $table->string('unite', 191)->nullable();
            $table->foreignId('modalite_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('theme_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('espece_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('type_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alertes');
    }
};
