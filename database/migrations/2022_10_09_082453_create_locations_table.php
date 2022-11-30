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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('velo_id')->nullable();
            $table->unsignedBigInteger('trotinette_id')->nullable();
            $table->unsignedBigInteger('accessoire_id')->nullable();
            $table->string('idClient');
            $table->string('emailClient')->nullable();
            $table->string('idStation');
            $table->string('dateDebut');
            $table->string('dateFin');
            $table->string('prix');
            $table->string('statutPaiement');
            $table->string('statutLocation');
            $table->string('remarque');
            $table->string('idAgent');
            $table->foreign('velo_id')->references('id')->on('velos');
            $table->foreign('trotinette_id')->references('id')->on('trotinettes')->onDelete('cascade');
            $table->foreign('accessoire_id')->nullable()->references('id')->on('accessoires')->onDelete('cascade');
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
        Schema::dropIfExists('locations');
    }
};