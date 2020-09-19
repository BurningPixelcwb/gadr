<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_venda');
            $table->string('parcela_total');
            $table->string('status');
            $table->date('dt_vencimento_parcela');
            $table->date('dt_alteracao')->nullable();
            $table->float('vlr_parcela', 8,2);
            $table->timestamps();

            $table->foreign('fk_id_venda')->references('id')->on('compras')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelas');
    }
}
