<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CategoriaRuta;
use App\Models\Ruta;
use App\Models\RutaImagen;
use App\Models\Vehiculo;
use App\Models\Reserva;
use App\Models\VehiculoIndisponibilidad;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    public function run()
    {
        /* ============================
           ROLES
        ============================ */
        $adminRole     = Role::create(['name' => 'admin']);
        $motoristaRole = Role::create(['name' => 'motorista']);
        $clienteRole   = Role::create(['name' => 'cliente']);

        /* ============================
           USUARIOS
        ============================ */
        $admin = User::create([
            'name' => 'Administrador General',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'status' => true
        ]);
        $admin->assignRole($adminRole);

        $motorista = User::create([
            'name' => 'Juan Motorista',
            'email' => 'motorista@mail.com',
            'password' => Hash::make('12345678'),
            'status' => true,
            'driver_license_number' => 'DL-556677',
            'driver_license_category' => 'A',
        ]);
        $motorista->assignRole($motoristaRole);

        $cliente = User::create([
            'name' => 'Cliente de Prueba',
            'email' => 'cliente@mail.com',
            'password' => Hash::make('12345678'),
            'status' => true,
            'dui' => '01234567-8',
            'address' => 'San Salvador',
        ]);
        $cliente->assignRole($clienteRole);

        /* ============================
           CATEGORÍAS DE RUTAS
        ============================ */
        $playa = CategoriaRuta::create([
            'nombre' => 'Playa',
            'icono' => 'bi bi-sun',
            'activo' => true
        ]);

        $volcanes = CategoriaRuta::create([
            'nombre' => 'Volcanes',
            'icono' => 'bi bi-triangle',
            'activo' => true
        ]);

        /* ============================
           RUTAS
        ============================ */
        $ruta1 = Ruta::create([
            'nombre' => 'Tour Costa del Sol',
            'categoria_id' => $playa->id,
            'descripcion' => 'Un recorrido por la costa más hermosa.',
            'duracion' => '6 horas',
            'precio' => 75.00,
            'punto_inicio' => 'San Salvador',
            'punto_fin' => 'Costa del Sol',
            'imagen_portada' => 'rutas/costadelsol.jpg',
            'activo' => true
        ]);

        $ruta2 = Ruta::create([
            'nombre' => 'Tour Volcán de Izalco',
            'categoria_id' => $volcanes->id,
            'descripcion' => 'Ascenso guiado al volcán más joven de Centroamérica.',
            'duracion' => '8 horas',
            'precio' => 90.00,
            'punto_inicio' => 'Sonsonate',
            'punto_fin' => 'Cerros Verdes',
            'imagen_portada' => 'rutas/izalco.jpg',
            'activo' => true
        ]);

        /* ============================
           IMÁGENES DE RUTAS
        ============================ */
        RutaImagen::create([
            'ruta_id' => $ruta1->id,
            'imagen' => 'rutas/costa1.jpg',
            'descripcion' => 'Vista de la playa',
            'orden' => 1
        ]);

        RutaImagen::create([
            'ruta_id' => $ruta1->id,
            'imagen' => 'rutas/costa2.jpg',
            'descripcion' => 'Atardecer en Costa del Sol',
            'orden' => 2
        ]);

        RutaImagen::create([
            'ruta_id' => $ruta2->id,
            'imagen' => 'rutas/izalco1.jpg',
            'descripcion' => 'Volcán Izalco',
            'orden' => 1
        ]);

        /* ============================
           VEHÍCULOS
        ============================ */
        $vehiculo1 = Vehiculo::create([
            'marca' => 'Toyota',
            'modelo' => 'Hilux',
            'anio' => '2022',
            'placa' => 'P123-456',
            'color' => 'Blanco',
            'tipo' => 'Pickup',
            'capacidad' => 5,
            'precio_dia' => 45.00,
            'activo' => true,
            'foto' => 'vehiculos/hilux.jpg',
        ]);

        $vehiculo2 = Vehiculo::create([
            'marca' => 'Hyundai',
            'modelo' => 'Tucson',
            'anio' => '2021',
            'placa' => 'P789-123',
            'color' => 'Negro',
            'tipo' => 'SUV',
            'capacidad' => 5,
            'precio_dia' => 60.00,
            'activo' => true,
            'foto' => 'vehiculos/tucson.jpg',
        ]);

        /* ============================
           INDISPONIBILIDAD DE VEHÍCULOS
        ============================ */
        VehiculoIndisponibilidad::create([
            'vehiculo_id' => $vehiculo1->id,
            'motivo' => 'Mantenimiento preventivo',
            'fecha_inicio' => '2025-01-10',
            'fecha_fin' => '2025-01-12',
            'notas' => 'Cambio de aceite y filtros',
            'activo' => true
        ]);

        /* ============================
           RESERVAS DE PRUEBA
        ============================ */
        Reserva::create([
            'user_id' => $cliente->id,
            'vehiculo_id' => $vehiculo2->id,
            'ruta_id' => $ruta1->id,
            'chofer_id' => $motorista->id,
            'fecha_inicio' => '2025-02-01',
            'fecha_fin' => '2025-02-02',
            'total' => 135.00,
            'estado' => 'pendiente'
        ]);
    }
}
