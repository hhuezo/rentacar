<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ruta_imagenes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ruta_id')
                ->constrained('rutas')
                ->restrictOnDelete();

            $table->string('imagen');
            $table->string('descripcion')->nullable();
            $table->integer('orden')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ruta_imagenes');
    }
};
