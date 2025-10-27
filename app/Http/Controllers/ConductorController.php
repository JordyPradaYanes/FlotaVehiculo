<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conductores = Conductor::paginate(10);
        return view('conductores.index', compact('conductores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $conductor = Conductor::findOrFail($id);
            $conductor->delete();
            return redirect()->route('conductores.index')->with('successMsg', 'Conductor eliminado exitosamente.');
        } catch (QueryException $e) {
            log::error('Error al eliminar el conductor: ' . $e->getMessage());
            return redirect()->route('conductores.index')->with('error', 'Error al eliminar el conductor: ' . $e->getMessage());
        }catch (\Exception $e) {
            log::error('Error inesperado al eliminar el conductor: ' . $e->getMessage());
            return redirect()->route('conductores.index')->with('error', 'Error inesperado al eliminar el conductor: ' . $e->getMessage());
        }
    }
    public function cambioEstado(Conductor $conductor)
    {
        $conductor->estado = !$conductor->estado;
        $conductor->save();

        return redirect()->route('conductores.index')->with('successMsg', 'Estado del conductor actualizado exitosamente.');
    }
}
