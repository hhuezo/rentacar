<?php

namespace App\Http\Controllers;

use App\Models\CategoriaRuta;
use App\Models\Ruta;
use App\Models\RutaImagen;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rutas = Ruta::get();

        return view('ruta.index', compact('rutas'));
    }

    public function create()
    {
        $categorias = CategoriaRuta::where('activo', 1)->get();

        return view('ruta.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // VALIDACIÓN
        $request->validate([
            'categoria_id'   => 'required|exists:categorias_rutas,id',
            'nombre'         => 'required|string|max:255',
            'precio'         => 'required|numeric',
            'duracion'       => 'required|string|max:255',
            'descripcion'    => 'nullable|string',
            'foto'           => 'required|image|mimes:jpg,jpeg,png,webp',
            'imagenes.*'     => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        // ============================
        // 1) GUARDAR RUTA
        // ============================

        $ruta = new Ruta();
        $ruta->categoria_id  = $request->categoria_id;
        $ruta->nombre        = $request->nombre;
        $ruta->precio        = $request->precio;
        $ruta->duracion      = $request->duracion;
        $ruta->descripcion   = $request->descripcion;
        $ruta->activo        = 1;
        $ruta->punto_inicio  = $request->punto_inicio ?? null;
        $ruta->punto_fin     = $request->punto_fin ?? null;

        // ============================
        // 2) FOTO DE PORTADA (solo nombre)
        // ============================

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            // Nombre limpio que guardaremos en DB
            $filename = time() . '_portada.' . $file->getClientOriginalExtension();

            // Guardar archivo en storage
            $file->storeAs('public/rutas', $filename);

            // Guardar SOLO el nombre
            $ruta->imagen_portada = $filename;
        }

        $ruta->save();

        // ============================
        // 3) IMÁGENES DE GALERÍA (solo nombre)
        // ============================

        if ($request->hasFile('imagenes')) {

            $orden = 1;

            foreach ($request->file('imagenes') as $img) {

                $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();

                // Guardar archivo en carpeta galería
                $img->storeAs('public/rutas/galeria', $filename);

                // Crear registro
                $rutaImg = new RutaImagen();
                $rutaImg->ruta_id     = $ruta->id;
                $rutaImg->imagen      = $filename;    // ⭐ SOLO NOMBRE
                $rutaImg->descripcion = null;
                $rutaImg->orden       = $orden++;
                $rutaImg->save();
            }
        }

        return redirect()->route('ruta.index')->with('success', 'Ruta creada correctamente.');
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
