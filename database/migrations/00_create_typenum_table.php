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
        Schema::create('typenums', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->string('detail', 191)->nullable();
            $table->unsignedDecimal('step', 10, 3)->default(1);
            $table->unsignedInteger('arrondi')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typenum');
    }
};
