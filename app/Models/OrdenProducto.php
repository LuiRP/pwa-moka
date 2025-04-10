<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenProducto extends Model
{
    protected $fillable = [
        'producto_id',
        'cantidad',
    ];
}
