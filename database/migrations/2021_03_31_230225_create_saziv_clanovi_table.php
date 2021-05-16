<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSazivClanoviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saziv_clanovi', function (Blueprint $table) {
            $table->id();
            $table->string('ime');
            $table->string('opis')->nullable();
            $table->string('email')->nullable();
            $table->string('telefon')->nullable();
            $table->string('uloga');
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
        Schema::dropIfExists('saziv_clanovi');
    }
}
