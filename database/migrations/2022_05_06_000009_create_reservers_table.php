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

        Schema::create('reserver', function (Blueprint $table) {
            $table->id('id')->nullable(false);
            $table->integer('numTypeContainer')->nullable(false);
            $table->bigInteger('qteReserver')->default(null);
            $table->integer('codeReservation')->nullable(false);

            // Contraines :
            $table->foreign('codeReservation')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('numTypeContainer')->references('numTypeContainer')->on('type_containers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservers');
    }
};
