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
        Schema::create('type_containers', function (Blueprint $table) {
            $table->integer('numTypeContainer')->primary();
            $table->string('codeTypeContainer',4)->default(null);
            $table->string('libelleTypeContainer', 50)->default(null);
            $table->bigInteger('longueurCont')->default(null);
            $table->bigInteger('largeurCont')->default(null);
            $table->bigInteger('hauteurCont')->default(null);
            $table->decimal('poidsCont', 20)->default(null);
            $table->decimal('tare', 20)->default(null);
            $table->float('capaciteDeCharge', 8)->default(null);
            $table->decimal('tarif', 10)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_containers');
    }
};
