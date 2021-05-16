<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentiDatotekeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumenti_datoteke', function (Blueprint $table) {
            $table->id();
            $table->string('ime_datoteke');
            $table->string('path_datoteke');
            $table->unsignedBigInteger('id_dokumenta');
            $table->foreign('id_dokumenta')->references('id')->on('dokumenti')->onDelete('cascade');
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
        Schema::dropIfExists('dokumenti_datoteke');
    }
}
