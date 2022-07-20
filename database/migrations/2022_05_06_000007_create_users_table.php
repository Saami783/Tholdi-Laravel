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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('raisonSociale', 50)->unique()->nullable(false);
            $table->string('adresse', 255)->unique()->nullable(false);
            $table->integer('cp')->default(null);
            $table->string('ville', 40)->default(null);
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telephone', 10)->unique()->nullable(false);
            $table->string('codePays', 2)->default('FR');
            $table->string('contact')->nullable(false);
            $table->string('password', 255)->nullable(false);

            // Contraintes :
            $table->foreign('codePays')->references('codePays')->on('pays');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
