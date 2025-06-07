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
        Schema::create('especes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom', 191)->index('especes_nom_index');
            $table->char('abbr', 3);
            $table->string('icone', 191)->index('especes_icone_index');
            $table->boolean('fini')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especes');
    }
};
