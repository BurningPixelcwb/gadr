<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    protected $fillable = [
        'name'
      , 'fk_id_sub_tipo'
      
  ];
}