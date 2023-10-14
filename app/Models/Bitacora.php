<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $table = 'bitacoras';

    protected $fillable = [
        'usuario',
        'descripcion',
        'metodo',
        'ruta',
        'direccion_ip',
        'navegador',
        'tabla',
        'registro_id',
    ];
}
