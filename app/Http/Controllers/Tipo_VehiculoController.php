<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_Vehiculo;

class Tipo_VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_vehiculos = Tipo_Vehiculo::paginate(10);
        return view('tipo_vehiculos.index', compact('tipo_vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'capacidad_pasajero' => 'required|integer|min:0',
                'capacidad_carga' => 'required|numeric|min:0',
                'capacidad_gasolina' => 'required|numeric|min:0',
                'estado' => 'required|boolean',
            ]);

            $validated['registrado_por'] = auth()->user()->name;

            Tipo_Vehiculo::create($validated);

            return redirect()->route('tipo_vehiculos.index')
                ->with('successMsg', 'Tipo de Vehículo creado exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (QueryException $e) {
            Log::error('Error al crear el tipo de vehículo: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al crear el tipo de vehículo en la base de datos.')
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
    public function destroy(Tipo_Vehiculo $tipo_vehiculo)
    {
        try {
            $tipo_vehiculo->delete();
            return redirect()->route('tipo_vehiculos.index')
                ->with('successMsg', 'Tipo de Vehículo eliminado exitosamente.');
        } catch (QueryException $e) {
            Log::error('Error al eliminar el tipo de vehículo: ' . $e->getMessage());
            return redirect()->route('tipo_vehiculos.index')
                ->with('error', 'Error al eliminar el tipo de vehículo de la base de datos.');
        }
    }

    public function cambioEstado(Tipo_Vehiculo $tipo_vehiculo)
    {
        try {
            $tipo_vehiculo->estado = !$tipo_vehiculo->estado;
            $tipo_vehiculo->save();

            return response()->json([
                'success' => true,
                'message' => 'Estado del Tipo de Vehículo actualizado exitosamente.',
                'nuevo_estado' => $tipo_vehiculo->estado
            ]);
        } catch (\Exception $e) {
            Log::error('Error al cambiar estado del tipo de vehículo: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al cambiar el estado del Tipo de Vehículo.'
            ], 500);
        }
    }
}
