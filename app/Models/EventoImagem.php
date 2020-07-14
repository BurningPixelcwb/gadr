<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoImagem extends Model
{
     protected $fillable = [
        'fk_id_evento' , 
        'path'
  ];}
