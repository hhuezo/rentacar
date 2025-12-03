<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehiculoController extends Controller
{
    public function index()
    {
        dd("");
        $vehiculos = Vehiculo::get();

        return view('vehiculos.index', compact('vehiculos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('vehiculos.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 🔍 Validación
        $validated = $request->validate([

            'marca'       => 'required|string|max:255',
            'modelo'      => 'required|string|max:255',
            'anio'        => 'required|string|max:10',
            'placa'       => 'required|string|max:255',
            'color'       => 'required|string|max:255',
            'capacidad'   => 'required|string|max:10',
            'precio_dia'  => 'required|string|max:10',

            'foto'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'descripcion' => 'required|string|max:255',

        ], [

            // MARCA
            'marca.required' => 'La marca es obligatoria.',
            'marca.string'   => 'La marca debe ser una cadena de texto.',
            'marca.max'      => 'La marca no debe exceder 255 caracteres.',

            // MODELO
            'modelo.required' => 'El modelo es obligatorio.',
            'modelo.string'   => 'El modelo debe ser una cadena de texto.',
            'modelo.max'      => 'El modelo no debe exceder 255 caracteres.',

            // AÑO
            'anio.required' => 'El año es obligatorio.',
            'anio.string'   => 'El año debe ser una cadena de texto.',
            'anio.max'      => 'El año no debe exceder 10 caracteres.',

            // PLACA
            'placa.required' => 'La placa es obligatoria.',
            'placa.string'   => 'La placa debe ser una cadena de texto.',
            'placa.max'      => 'La placa no debe exceder 255 caracteres.',

            // COLOR
            'color.required' => 'El color es obligatorio.',
            'color.string'   => 'El color debe ser una cadena de texto.',
            'color.max'      => 'El color no debe exceder 255 caracteres.',

            // CAPACIDAD
            'capacidad.required' => 'La capacidad es obligatoria.',
            'capacidad.string'   => 'La capacidad debe ser una cadena de texto.',
            'capacidad.max'      => 'La capacidad no debe exceder 10 caracteres.',

            // PRECIO POR DIA
            'precio_dia.required' => 'El precio por día es obligatorio.',
            'precio_dia.string'   => 'El precio por día debe ser una cadena de texto.',
            'precio_dia.max'      => 'El precio por día no debe exceder 10 caracteres.',

            // FOTO (reemplazado correctamente)
            'foto.required' => 'La foto es obligatoria.',
            'foto.image'    => 'El archivo debe ser una imagen válida.',
            'foto.mimes'    => 'La imagen debe ser de tipo JPG, JPEG, PNG o WEBP.',
            'foto.max'      => 'La imagen no debe exceder los 2MB.',

            // DESCRIPCIÓN
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string'   => 'La descripción debe ser una cadena de texto.',
            'descripcion.max'      => 'La descripción no debe exceder 255 caracteres.',

        ]);



        try {

            $vehiculos = new Vehiculo();

            $vehiculos->marca = $request->marca;
            $vehiculos->modelo = $request->modelo;
            $vehiculos->anio = $request->anio;
            $vehiculos->placa = $request->placa;
            $vehiculos->color = $request->color;
            $vehiculos->capacidad = $request->capacidad;
            $vehiculos->precio_dia = $request->precio_dia;
            $vehiculos->activo = 1;
            $vehiculos->descripcion = $request->descripcion;

            // ==== MANEJO DE LA FOTO ====

            if ($request->hasFile('foto')) {

                $file = $request->file('foto');

                // crear nombre único
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                // guardar en public/vehiculos
                $file->move(public_path('vehiculos'), $filename);

                // guardar solo el nombre en la BD
                $vehiculos->foto = $filename;
            }

            $vehiculos->save();

            return redirect()->back()->with('success', 'Vehículo registrado correctamente.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Hubo un error: ' . $e->getMessage());
        }

        return back()->with('success', 'El registro ha sido creado correctamente.');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // 🔍 Validación
    $validated = $request->validate([

        'marca'       => 'required|string|max:255',
        'modelo'      => 'required|string|max:255',
        'anio'        => 'required|string|max:10',
        'placa'       => 'required|string|max:255',
        'color'       => 'required|string|max:255',
        'capacidad'   => 'required|string|max:10',
        'precio_dia'  => 'required|string|max:10',

        // Foto opcional en update
        'foto'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'descripcion' => 'required|string|max:255',

    ], [

        // Mensajes personalizados igual que el create

        'marca.required' => 'La marca es obligatoria.',
        'modelo.required' => 'El modelo es obligatorio.',
        'anio.required' => 'El año es obligatorio.',
        'placa.required' => 'La placa es obligatoria.',
        'color.required' => 'El color es obligatorio.',
        'capacidad.required' => 'La capacidad es obligatoria.',
        'precio_dia.required' => 'El precio por día es obligatorio.',

        'foto.image'    => 'El archivo debe ser una imagen válida.',
        'foto.mimes'    => 'La imagen debe ser de tipo JPG, JPEG, PNG o WEBP.',
        'foto.max'      => 'La imagen no debe exceder los 2MB.',

        'descripcion.required' => 'La descripción es obligatoria.',
    ]);

    try {

        $vehiculos = Vehiculo::findOrFail($id);

        $vehiculos->marca = $request->marca;
        $vehiculos->modelo = $request->modelo;
        $vehiculos->anio = $request->anio;
        $vehiculos->placa = $request->placa;
        $vehiculos->color = $request->color;
        $vehiculos->capacidad = $request->capacidad;
        $vehiculos->precio_dia = $request->precio_dia;
        $vehiculos->descripcion = $request->descripcion;

        // ==== MANEJO DE FOTO (actualizar) ====

        if ($request->hasFile('foto')) {

            // borrar foto anterior si existe
            if ($vehiculos->foto && file_exists(public_path('vehiculos/' . $vehiculos->foto))) {
                unlink(public_path('vehiculos/' . $vehiculos->foto));
            }

            $file = $request->file('foto');

            // crear nombre único
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // guardar en carpeta public/vehiculos
            $file->move(public_path('vehiculos'), $filename);

            // guardar nuevo nombre en BD
            $vehiculos->foto = $filename;
        }

        $vehiculos->save();

        return redirect()->back()->with('success', 'Vehículo actualizado correctamente.');

    } catch (\Exception $e) {

        return redirect()->back()->with('error', 'Hubo un error: ' . $e->getMessage());
    }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
