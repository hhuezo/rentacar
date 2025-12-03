<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categorias_rutas', function (Blueprint $table) {
            // Agregar columna icono_bootstrap después de 'icono'
            $table->string('icono_bootstrap')->nullable()->after('icono');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categorias_rutas', function (Blueprint $table) {
            // Quitar columna icono_bootstrap
            $table->dropColumn('icono_bootstrap');
        });
    }
};
