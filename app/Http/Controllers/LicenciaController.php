<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licencia;

class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licencias = Licencia::paginate(10);
        return view('licencias.index', compact('licencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('licencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'numero_licencia' => 'required|string|max:50|unique:licencias,numero_licencia',
                'tipo_licencia' => 'required|string|max:50',
                'fecha_expedicion' => 'required|date',
                'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
                'entidad_emisora' => 'required|string|max:100',
                'estado' => 'required|boolean'
            ]);

            $validated['registrado_por'] = auth()->user()->name;

            // Crear la licencia con los datos validados
            $licencia = Licencia::create($validated);

            return redirect()->route('licencias.index')
                ->with('successMsg', 'Licencia creada exitosamente.');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
                
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Error al crear la licencia: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al crear la licencia en la base de datos.')
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
    public function destroy(Licencia $licencia)
    {
        try {
            $licencia->delete();
            return redirect()->route('licencias.index')
                ->with('successMsg', 'Licencia eliminada exitosamente.');
        } catch (\Exception $e) {
            \Log::error('Error al eliminar la licencia: ' . $e->getMessage());
            return redirect()->route('licencias.index')
                ->with('error', 'Error al eliminar la licencia.');
        }
    }

    public function cambioEstado(Licencia $licencia)
    {
        try {
            $licencia->estado = !$licencia->estado;
            $licencia->save();

            return response()->json([
                'success' => true,
                'message' => 'Estado de la licencia actualizado exitosamente.',
                'nuevo_estado' => $licencia->estado
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al cambiar estado de la licencia: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al cambiar el estado de la licencia.'
            ], 500);
        }
    }
}
