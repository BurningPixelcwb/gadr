<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $fillable = [
        'fk_id_venda' , 
        'parcela_total', 
        'status', 
        'dt_vencimento_parcela', 
        'dt_alteracao', 
        'vlr_parcela'
  ];
}
