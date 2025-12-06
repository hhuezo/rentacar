<?php

namespace App\Http\Controllers;

use App\Models\CategoriaRuta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaRutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categorias_rutas = CategoriaRuta::get();
        return view('categorias_rutas.index', compact('categorias_rutas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias_rutas.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
     {
       // 1️⃣ Validación
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'icono' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'icono_bootstrap' => 'nullable|string|max:255',
        'activo' => 'required|in:0,1',
    ], [
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.string' => 'El nombre debe ser texto.',
        'nombre.max' => 'El nombre no puede superar 255 caracteres.',
        'icono.image' => 'El archivo debe ser una imagen válida.',
        'icono.mimes' => 'La imagen debe ser JPG, JPEG, PNG o WEBP.',
        'icono.max' => 'La imagen no debe exceder 2MB.',
        'activo.required' => 'Debe seleccionar el estado.',
        'activo.in' => 'Estado inválido.',
    ]);

    try {
        // 2️⃣ Crear categoría
        $categorias_rutas = new CategoriaRuta();
        $categorias_rutas->nombre = $validated['nombre'];
        $categorias_rutas->activo = $validated['activo'];
        $categorias_rutas->icono_bootstrap = $validated['icono_bootstrap'] ?? null;

        // 3️⃣ Subida de ícono
        if ($request->hasFile('icono')) {
            $file = $request->file('icono');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('iconos'), $filename);
            $categorias_rutas->icono = $filename;
        } else {
            $categorias_rutas->icono = null;
        }

        // 4️⃣ Guardar en DB
        $categorias_rutas->save();

        return redirect()->back()->with('success', 'La categoría se ha registrado correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Hubo un error al guardar la categoría: ' . $e->getMessage());
    }
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
    public function edit($id)
    {
        $categorias_rutas = CategoriaRuta::findOrFail($id);

        return view('categorias_rutas.edit', compact('categorias_rutas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'icono'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'activo' => 'required|boolean',
        ]);

        $categorias_rutas = CategoriaRuta::findOrFail($id);

        $categorias_rutas->nombre = $request->nombre;
        $categorias_rutas->activo = $request->activo;

        if ($request->hasFile('icono')) {
            $file = $request->file('icono');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('categorias_rutas'), $filename);
            $categorias_rutas->icono = $filename;
        }

        $categorias_rutas->save();

        return redirect()->route('categorias_rutas.index')->with('success', ' la Categoría se actualizado correctamente');
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
