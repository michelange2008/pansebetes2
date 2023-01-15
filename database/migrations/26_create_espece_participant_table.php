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
        Schema::create('espece_participant', function (Blueprint $table) {
          $table->foreignId('espece_id')->constrained('especes')
                ->onUpdate('cascade')->onDelete('cascade');
          $table->foreignId('participant_id')->constrained('participants')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espece_participant');
    }
};
