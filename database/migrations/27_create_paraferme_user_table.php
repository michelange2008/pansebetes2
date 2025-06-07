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
        Schema::create('paraferme_user', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
          $table->foreignId('paraferme_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
          $table->string('value', 191);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paraferme_user');
    }
};
