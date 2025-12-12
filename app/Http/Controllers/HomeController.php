<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Vehiculo;
use App\Models\Conductor;
use App\Models\Viaje;
use App\Models\Recarga_Combustible;
use App\Models\Empresa;
use App\Models\Ruta;
use App\Models\Licencia;
use App\Models\Contrato;
use App\Models\Tipo_Vehiculo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Estadísticas principales
        $totalVehiculos = Vehiculo::count();
        $conductoresActivos = Conductor::whereIn('estado', ['1', 'activo', 'Activo'])->count();
        
        // Total de Viajes (Histórico)
        $viajesDelMes = Viaje::count();
        
        // Gasto Total en combustible (Histórico)
        $gastoCombustibleMes = Recarga_Combustible::sum('costo_total');
        
        // Estadísticas adicionales
        $totalEmpresas = Empresa::count();
        $rutasActivas = Ruta::whereIn('estado', ['1', 'activo', 'Activo'])->count();
        
        // Licencias vigentes (fecha de vencimiento mayor a hoy)
        $licenciasVigentes = Licencia::where('fecha_vencimiento', '>', Carbon::now())
                                      ->whereIn('estado', ['1', 'activo', 'Activo'])
                                      ->count();
        
        // Contratos activos
        $contratosActivos = Contrato::whereIn('estado', ['1', 'activo', 'Activo'])->count();
        
        // Licencias por vencer en los próximos 30 días
        $licenciasPorVencer = Licencia::where('fecha_vencimiento', '>', Carbon::now())
                                       ->where('fecha_vencimiento', '<=', Carbon::now()->addDays(30))
                                       ->whereIn('estado', ['1', 'activo', 'Activo'])
                                       ->limit(5)
                                       ->get();
        
        // Actividad reciente (últimos 5 viajes)
        $actividadReciente = Viaje::orderBy('created_at', 'desc')
                                   ->limit(5)
                                   ->get();
        
        // Vehículos con mayor kilometraje (top 5)
        $vehiculosMayorKilometraje = Vehiculo::orderBy('kilometraje', 'desc')
                                              ->with('marca')
                                              ->limit(5)
                                              ->get();
        
        // Datos para gráfico de viajes por mes (últimos 6 meses)
        $viajesMeses = [];
        $viajesData = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $fecha = Carbon::now()->subMonths($i);
            $viajesMeses[] = $fecha->format('M'); // Ene, Feb, Mar...
            $viajesData[] = Viaje::whereYear('created_at', $fecha->year)
                                 ->whereMonth('created_at', $fecha->month)
                                 ->count();
        }
        
        // Datos para gráfico de vehículos por tipo
        $tiposVehiculos = [];
        $tiposVehiculosData = [];
        
        $tiposAgrupados = Vehiculo::select('tipo_vehiculo_id', DB::raw('count(*) as total'))
                                  ->groupBy('tipo_vehiculo_id')
                                  ->with('tipo_vehiculo')
                                  ->get();
        
        foreach ($tiposAgrupados as $tipo) {
            $tiposVehiculos[] = $tipo->tipo_vehiculo->nombre ?? 'Sin tipo';
            $tiposVehiculosData[] = $tipo->total;
        }
        
        // Si no hay datos, poner valores por defecto
        if (empty($tiposVehiculos)) {
            $tiposVehiculos = ['Sin datos'];
            $tiposVehiculosData = [0];
        }
        
        return view('home', compact(
            'totalVehiculos',
            'conductoresActivos',
            'viajesDelMes',
            'gastoCombustibleMes',
            'totalEmpresas',
            'rutasActivas',
            'licenciasVigentes',
            'contratosActivos',
            'licenciasPorVencer',
            'actividadReciente',
            'vehiculosMayorKilometraje',
            'viajesMeses',
            'viajesData',
            'tiposVehiculos',
            'tiposVehiculosData'
        ));
    }
}
