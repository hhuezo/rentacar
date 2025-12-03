<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaRuta extends Model
{
    protected $table = 'categorias_rutas'; // EXACTAMENTE como está tu tabla
    protected $fillable = ['nombre', 'icono', 'icono_bootstrap', 'activo']; // importantísimo
    public $timestamps = true; // si tu tabla tiene created_at y updated_at
}
