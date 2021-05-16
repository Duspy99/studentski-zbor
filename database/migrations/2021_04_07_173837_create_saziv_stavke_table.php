<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSazivStavkeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saziv_stavke', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->longtext('sadrzaj')->nullable();
            $table->unsignedBigInteger('id_saziva');
            $table->foreign('id_saziva')->references('id')->on('sazivi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saziv_stavke');
    }
}
