<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $vehiculos = [
            [
                'marca' => 'Toyota',
                'modelo' => 'Yaris',
                'anio' => 2020,
                'color' => 'Blanco perla',
                'precio' => 45,
                'descripcion' =>
                'El Toyota Yaris 2020 combina eficiencia y confort. Ideal para ciudad, con excelente rendimiento de combustible y diseño elegante.',
                'imagen' => 'vehiculo1.webp',
            ],
            [
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'anio' => 2021,
                'color' => 'Gris metálico',
                'precio' => 75,
                'descripcion' =>
                'El Honda Civic 2021 ofrece un equilibrio perfecto entre potencia y estilo, con un interior moderno y gran estabilidad en carretera.',
                'imagen' => 'vehiculo2.jpg',
            ],
            [
                'marca' => 'Nissan',
                'modelo' => 'Sentra',
                'anio' => 2022,
                'color' => 'Rojo vino',
                'precio' => 110,
                'descripcion' =>
                'El Nissan Sentra 2022 destaca por su diseño deportivo, amplio espacio interior y avanzados sistemas de seguridad.',
                'imagen' => 'vehiculo3.png',
            ],
        ];
        return view('reserva', compact('vehiculos'));
    }


    public function reserva(Request $request)
    {
        $vehiculos = [
            [
                'marca' => 'Toyota',
                'modelo' => 'Yaris',
                'anio' => 2020,
                'color' => 'Blanco perla',
                'precio' => 45,
                'descripcion' => 'El Toyota Yaris 2020 combina eficiencia y confort.',
                'imagen' => 'vehiculo1.webp',
            ],
            [
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'anio' => 2021,
                'color' => 'Gris metálico',
                'precio' => 75,
                'descripcion' => 'El Honda Civic 2021 ofrece un equilibrio perfecto entre potencia y estilo.',
                'imagen' => 'vehiculo2.jpg',
            ],
            [
                'marca' => 'Nissan',
                'modelo' => 'Sentra',
                'anio' => 2022,
                'color' => 'Rojo vino',
                'precio' => 110,
                'descripcion' => 'El Nissan Sentra 2022 destaca por su diseño deportivo y seguridad avanzada.',
                'imagen' => 'vehiculo3.png',
            ],
        ];

        $vehiculo = $vehiculos[$request->vehiculo];

        // formatear fechas a d/m/Y
        $fecha_retiro = \Carbon\Carbon::parse($request->fecha_retiro)->format('d/m/Y');
        $fecha_devolucion = \Carbon\Carbon::parse($request->fecha_devolucion)->format('d/m/Y');

        $resumen = [
            'vehiculo' => $vehiculo,
            'fecha_retiro' => $fecha_retiro,
            'hora_retiro' => $request->hora_retiro,
            'fecha_devolucion' => $fecha_devolucion,
            'hora_devolucion' => $request->hora_devolucion,
        ];

        return view('pago', compact('resumen'));
    }
}
