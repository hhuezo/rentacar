<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculoIndisponibilidad extends Model
{
    protected $table = 'vehiculo_indisponibilidades';

    protected $fillable = [
        'vehiculo_id',
        'motivo',
        'fecha_inicio',
        'fecha_fin',
        'notas',
        'activo'
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
