<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaRuta extends Model
{
    protected $table = 'categorias_rutas';

    protected $fillable = [
        'nombre',
        'icono',
        'activo'
    ];

    public function rutas()
    {
        return $this->hasMany(Ruta::class, 'categoria_id');
    }
}
