<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubTipo extends Model
{
    protected $fillable = [
        'name',
        'fk_id_tipo_viagem'
        
    ];
}
