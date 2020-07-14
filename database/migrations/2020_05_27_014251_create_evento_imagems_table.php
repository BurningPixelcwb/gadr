<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_imagems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_id_evento');
            $table->string('path');
            $table->timestamps();

            $table->foreign('fk_id_evento')->references('id')->on('eventos')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_imagems');
    }
}
