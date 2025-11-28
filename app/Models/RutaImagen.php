<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RutaImagen extends Model
{
    protected $table = 'ruta_imagenes';

    protected $fillable = [
        'ruta_id',
        'imagen',
        'descripcion',
        'orden'
    ];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }
}
