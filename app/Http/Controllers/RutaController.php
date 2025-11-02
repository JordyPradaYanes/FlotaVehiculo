<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rutas = Ruta::paginate(10);
        return view('rutas.index', compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rutas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'nombre_ruta' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'distancia_en_km' => 'required|numeric|min:0',
                'tiempo_estimado' => 'required|string|max:100',
                'costo_peaje' => 'required|numeric|min:0',
                'estado' => 'required|boolean',
            ]);

            $validated['registrado_por'] = auth()->user()->name;

            // Crear la ruta con los datos validados
            $ruta = Ruta::create($validated);

            return redirect()->route('rutas.index')
                ->with('successMsg', 'Ruta creada exitosamente.');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
                
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Error al crear la ruta: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al crear la ruta en la base de datos.')
                ->withInput();
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
    public function destroy(Ruta $ruta)
    {
        try {
            $ruta->delete();
            return redirect()->route('rutas.index')
                ->with('successMsg', 'Ruta eliminada exitosamente.');
        } catch (\Exception $e) {
            \Log::error('Error al eliminar la ruta: ' . $e->getMessage());
            return redirect()->route('rutas.index')
                ->with('error', 'Error al eliminar la ruta.');
        }
    }

    public function cambioEstado(Ruta $ruta)
    {
        try {
            $ruta->estado = !$ruta->estado;
            $ruta->save();

            return response()->json([
                'success' => true,
                'message' => 'Estado de la ruta actualizado exitosamente.',
                'nuevo_estado' => $ruta->estado
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al cambiar estado de la ruta: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al cambiar el estado de la ruta.'
            ], 500);
        }
    }
}
