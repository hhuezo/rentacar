<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('vehiculo_id')->constrained('vehiculos');
            $table->foreignId('ruta_id')->nullable()->constrained('rutas');
            $table->foreignId('chofer_id')->nullable()->constrained('users');

            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->decimal('total', 10, 2);
            $table->string('estado')->default('pendiente');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
