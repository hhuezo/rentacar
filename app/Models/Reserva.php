<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'user_id',
        'vehiculo_id',
        'ruta_id',
        'chofer_id',
        'fecha_inicio',
        'fecha_fin',
        'total',
        'estado'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }

    public function chofer()
    {
        return $this->belongsTo(User::class, 'chofer_id');
    }
}
