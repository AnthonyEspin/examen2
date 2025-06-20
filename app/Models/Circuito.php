<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circuito extends Model
{
    //
    use HasFactory;
    protected $fillable=[
        'pais',
        'nombre',
        'latitud1',
        'longitud1',
        'latitud2',
        'longitud2',
    ];
}
