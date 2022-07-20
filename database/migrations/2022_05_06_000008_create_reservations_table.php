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

        Schema::create('reservations', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->date('dateDebutReservation')->default(null);
            $table->date('dateFinReservation')->default(null);
            $table->date('dateReservation')->default(null);
            $table->decimal('volumeEstime', 4)->default(null);
            $table->integer('codeDevis')->default(null);
            $table->tinyInteger('codeVilleMiseDiposition')->default(null);
            $table->tinyInteger('codeVilleRendre')->default(null);
            $table->integer('codeUtilisateur')->nullable(false);
            $table->string('etat', 10)->default(null);
            $table->tinyInteger('nbJoursReserve')->nullable(false);

            // Contraines :
            $table->foreign('codeVilleMiseDiposition')->references('codeVille')->on('villes');
            $table->foreign('codeVilleRendre')->references('codeVille')->on('villes');

            $table->foreign('codeDevis')->references('codeDevis')->on('devis');
            $table->foreign('codeUtilisateur')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
