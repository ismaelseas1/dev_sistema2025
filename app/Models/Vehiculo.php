<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //
    protected $table = 'vehiculos';
    protected $fillable = [
        'placa',
        'marca',
        'año',
        'descripcion',
        'codigo',
        'modelo',
        'color',
        'categoria',
        'tipo',
        'estado',
        'id_usuario'
    ];

    
}
