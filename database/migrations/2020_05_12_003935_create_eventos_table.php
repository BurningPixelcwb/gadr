<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_responsavel_evento');
            $table->unsignedBigInteger('fk_id_viagem');

            $table->text('desc_evento');

            $table->date('data_ida_evento');
            $table->string('hora_ida_evento');
            $table->string('local_ida_evento');

            $table->date('data_retorno_evento');
            $table->string('hora_retorno_evento');
            $table->string('local_retorno_evento');

            $table->date('data_inscricao_open');
            $table->date('data_inscricao_close');
            
            $table->integer('idade_minima_evento');
            $table->integer('total_vagas_evento');
            $table->integer('minimo_vagas_evento');

            $table->float('valor_evento');
            $table->integer('max_parcela');

            $table->timestamps();
            $table->foreign('fk_id_viagem')->references('id')->on('viagems')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
