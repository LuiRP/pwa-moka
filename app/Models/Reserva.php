<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'user_id',
        'zona_id',
        'fecha_hora',
        'numero_de_personas',
        'evento_id',
        'orden_id'
    ];
}
