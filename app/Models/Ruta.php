<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $fillable = [
        'nombre',
        'categoria_id',
        'descripcion',
        'duracion',
        'precio',
        'punto_inicio',
        'punto_fin',
        'imagen_portada',
        'activo'
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaRuta::class);
    }

    public function imagenes()
    {
        return $this->hasMany(RutaImagen::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
