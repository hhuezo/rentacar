<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('anio', 4);
            $table->string('placa')->unique();
            $table->string('color')->nullable();
            $table->string('tipo')->nullable();
            $table->integer('capacidad')->nullable();

            $table->decimal('precio_dia', 10, 2);
            $table->boolean('activo')->default(true);

            $table->string('foto')->nullable();
            $table->text('descripcion')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
};
