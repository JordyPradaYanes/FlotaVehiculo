<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Tipo_Vehiculo;
use App\Http\Requests\VehiculoRequest;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculo::paginate(10);
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all()->unique('nombre');
        $tipo_vehiculos = Tipo_Vehiculo::all()->unique('nombre');

        return view('vehiculos.create', compact('marcas', 'tipo_vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request)
    {

        $vehiculos = Vehiculo::create($request->All());
        return redirect()->route('vehiculos.index')
            ->with('successMsg', 'Vehículo creado exitosamente.');
        /*
        try{
            $validated = $request->validate([
                'marca_id' => 'required|exists:marcas,id',
                'tipo_vehiculo_id' => 'required|exists:tipo_vehiculos,id',
                'placa' => 'required|string|max:10|unique:vehiculos,placa',
                'modelo' => 'required|string|max:100',
                'año' => 'required|integer|min:1900|max:' . date('Y'),
                'color' => 'required|string|max:50',
                'kilometraje' => 'required|numeric|min:0',
                'estado' => 'required|boolean',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $validated['registrado_por'] = auth()->user()->name;

            Vehiculo::create($validated);

            return redirect()->route('vehiculos.index')
                ->with('successMsg', 'Vehículo creado exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (QueryException $e) {
            Log::error('Error al crear el vehículo: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al crear el vehículo en la base de datos.')
                ->withInput();
        }

        */
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
    public function destroy(Vehiculo $vehiculo)
    {
        try{
            $vehiculo->delete();
            return redirect()->route('vehiculos.index')
                ->with('successMsg', 'Vehículo eliminado exitosamente.');
        } catch (QueryException $e) {
            Log::error('Error al eliminar el vehículo: ' . $e->getMessage());
            return redirect()->route('vehiculos.index')
                ->with('error', 'Error al eliminar el vehículo de la base de datos.');
        } catch (\Exception $e) {
            Log::error('Error inesperado al eliminar el vehículo: ' . $e->getMessage());
            return redirect()->route('vehiculos.index')
                ->with('error', 'Error inesperado al eliminar el vehículo.');
        }
    }
}
