<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'placa',
        'color',
        'tipo',
        'capacidad',
        'precio_dia',
        'activo',
        'foto',
        'descripcion'
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function indisponibilidades()
    {
        return $this->hasMany(VehiculoIndisponibilidad::class);
    }
}
