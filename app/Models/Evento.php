<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'fk_id_viagem' , 
        'fk_responsavel_evento',
        'desc_evento',
        'local_ida_evento',
        'data_ida_evento',
        'hora_ida_evento',
        'local_retorno_evento',
        'data_retorno_evento',
        'hora_retorno_evento',
        'data_inscricao_close',
        'data_inscricao_open', 
        'total_vagas_evento' , 
        'minimo_vagas_evento' , 
        'idade_minima_evento' ,
        'valor_evento',
        'max_parcela'
  ];
  /* Imagens */
  public function imagens(){
    return $this->hasMany(EventoImagem::class, 'fk_id_evento');
  }

  /* Métodos SET */
  public function setDataIdaEventoAttribute($value) {
    $data_ida = explode('/', $value);
    $data_ida = $data_ida[2] .'-'. $data_ida[1] .'-'. $data_ida[0];

    $this->attributes['data_ida_evento'] = $data_ida;
  }

  public function setDataRetornoEventoAttribute($value) {
    $data_ida = explode('/', $value);
    $data_ida = $data_ida[2] .'-'. $data_ida[1] .'-'. $data_ida[0];

    $this->attributes['data_retorno_evento'] = $data_ida;
  }
  public function setDataInscricaoCloseAttribute($value) {
    $data_ida = explode('/', $value);
    $data_ida = $data_ida[2] .'-'. $data_ida[1] .'-'. $data_ida[0];

    $this->attributes['data_inscricao_close'] = $data_ida;
  }

  public function setDataInscricaoOpenAttribute($value) {
    $data_ida = explode('/', $value);
    $data_ida = $data_ida[2] .'-'. $data_ida[1] .'-'. $data_ida[0];

    $this->attributes['data_inscricao_open'] = $data_ida;
  }

  public function setValorEventoAttribute($value) {
    $valor_evento = str_replace(',', '.', $value);
    $this->attributes['valor_evento'] = $valor_evento;
  }

  /* Métodos GET */
  public function getDataIdaEventoAttribute($value) {
    $data_ida = explode('-', $value);
    $data_ida = $data_ida[2] .'/'. $data_ida[1] .'/'. $data_ida[0];

    return ($data_ida);

  }

  public function getDataRetornoEventoAttribute($value) {
    $data_ida = explode('-', $value);
    $data_ida = $data_ida[2] .'/'. $data_ida[1] .'/'. $data_ida[0];

    return ($data_ida);

  }

  public function getDataInscricaoCloseAttribute($value) {
    $data_ida = explode('-', $value);
    $data_ida = $data_ida[2] .'/'. $data_ida[1] .'/'. $data_ida[0];

    return ($data_ida);
  }

  public function getDataInscricaoOpenAttribute($value) {
    $data_ida = explode('-', $value);
    $data_ida = $data_ida[2] .'/'. $data_ida[1] .'/'. $data_ida[0];

    return ($data_ida);
  }

  public function getvalorEventoAttribute($value) {
    $valor_evento = str_replace('.', ',', $value);
    return ($valor_evento);
  }

}
