<?php
/*
// Sous table d'alertes destinée à gérer les propriétiés spécifiques des alertes
// numériques
 */
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
        Schema::create('numalertes', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->foreignId('alerte_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('borne_inf')->default(0);
            $table->integer('borne_sup')->nullable();
            $table->foreignId('num_id')->nullable()->constrained('chiffres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('denom_id')->nullable()->constrained('chiffres')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('round')->unsigned()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numalertes');
    }
};
