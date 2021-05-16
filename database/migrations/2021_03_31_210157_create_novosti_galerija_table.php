<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovostiGalerijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novosti_galerija', function (Blueprint $table) {
            $table->id();
            $table->string('ime_slike');
            $table->string('path_slike');
            $table->unsignedBigInteger('id_novosti'); 
            $table->foreign('id_novosti')->references('id')->on('novosti')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novosti_galerija');   
    }
}
