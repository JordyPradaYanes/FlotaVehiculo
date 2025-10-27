<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class MarcaController extends Controller
{

    public function index()
    {
        $marcas = Marca::paginate(10);
        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

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
    public function destroy(Marca $marca)
    {
        try{
            $marca->delete();
            return redirect()->route('marcas.index')->with('successMsg', 'Marca eliminada exitosamente.');
        } catch (QueryException $e) {
            Log::error('Error al eliminar la marca: ' . $e->getMessage());
            return redirect()->route('marcas.index')->with('error', 'Error al eliminar la marca: ' . $e->getMessage());
        }catch (\Exception $e) {
            Log::error('Error inesperado al eliminar la marca: ' . $e->getMessage());
            return redirect()->route('marcas.index')->with('error', 'Error inesperado al eliminar la marca: ' . $e->getMessage());
        }
    }
    
    /**
     * Cambiar el estado de la marca (activo/inactivo)
     */
    public function cambioEstado(Marca $marca)
    {
        try {
            $marca->estado = !$marca->estado;
            $marca->save();

            return response()->json([
                'success' => true,
                'message' => 'Estado de la marca actualizado exitosamente.',
                'nuevo_estado' => $marca->estado
            ]);
        } catch (\Exception $e) {
            Log::error('Error al cambiar estado de marca: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al cambiar el estado de la marca.'
            ], 500);
        }
    }
}
