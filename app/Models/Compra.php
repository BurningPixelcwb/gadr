<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'fk_id_evento' , 
        'fk_id_pessoa', 
        'parcela'
  ];
}