<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_id_tipo_viagem');
            $table->string('name');
            $table->timestamps();

            $table->foreign('fk_id_tipo_viagem')->references('id')->on('tipo_viagems')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_tipos');
    }
}
