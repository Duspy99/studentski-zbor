<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovostiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novosti', function (Blueprint $table) {

            $table->id();
            $table->string('naslov');
            $table->longText('sadrzaj');
            $table->string('vrsta');
            $table->string('ime_slike')->nullable();
            $table->string('path_slike')->nullable();
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
        Schema::dropIfExists('novosti');
    }
}


