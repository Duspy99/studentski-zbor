<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSazivStavkeDatotekeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saziv_stavke_datoteke', function (Blueprint $table) {
            $table->id();
            $table->string('ime_datoteke')->nullable();
            $table->string('path_datoteke')->nullable();
            $table->unsignedBigInteger('id_stavke_saziva');
            $table->foreign('id_stavke_saziva')->references('id')->on('saziv_stavke')->onDelete('cascade');
            $table->unsignedBigInteger('id_saziva');
            $table->foreign('id_saziva')->references('id')->on('sazivi')->onDelete('cascade');
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
        Schema::dropIfExists('saziv_stavke_datoteke');
    }
}
