<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');

            $table->foreignId('categoria_id')
                ->constrained('categorias_rutas')
                ->restrictOnDelete();

            $table->text('descripcion')->nullable();
            $table->string('duracion')->nullable();
            $table->decimal('precio', 10, 2);

            $table->string('punto_inicio')->nullable();
            $table->string('punto_fin')->nullable();

            $table->string('imagen_portada')->nullable();

            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rutas');
    }
};
