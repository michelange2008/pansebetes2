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
        Schema::create('saisies', function (Blueprint $table) {
            $table->id();
            $table->string('nom',191)->nullable();
            $table->foreignId('user_id')->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->foreignId('espece_id')->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->boolean('hasnum')->default(0);
            $table->boolean('hasobs')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saisies');
    }
};
