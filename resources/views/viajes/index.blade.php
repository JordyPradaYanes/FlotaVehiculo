@extends('layouts.app')

@section('title','Listado De Viajes')

@section('content')

<div class="content-wrapper pb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0"><i class="fas fa-route mr-2"></i>Viajes</h1>
                <a href="{{ route('viajes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Nuevo Viaje
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title font-weight-bold mb-0">
                                    <i class="fas fa-list mr-2 text-primary"></i>Listado de Viajes
                                </h3>
                                <div class="search-box" style="width: 300px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0">
                                                <i class="fas fa-search text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="searchTable" class="form-control border-left-0" 
                                               placeholder="Buscar viaje...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="example1" class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-center" style="width: 60px;">
                                                <i class="fas fa-hashtag text-muted"></i> ID
                                            </th>
                                            <th>
                                                <i class="fas fa-car text-muted"></i> Vehículo
                                            </th>
                                            <th>
                                                <i class="fas fa-road text-muted"></i> Ruta
                                            </th>
                                            <th>
                                                <i class="fas fa-align-left text-muted"></i> Descripción
                                            </th>
                                            <th>
                                                <i class="fas fa-clock text-muted"></i> Tiempo Estimado
                                            </th>
                                            <th>
                                                <i class="fas fa-dollar-sign text-muted"></i> Costo Total
                                            </th>
                                            <th>
                                                <i class="fas fa-user text-muted"></i> Registrado por
                                            </th>
                                            <th class="text-center" style="width: 120px;">
                                                <i class="fas fa-toggle-on text-muted"></i> Estado
                                            </th>
                                            <th class="text-center" style="width: 140px;">
                                                <i class="fas fa-cog text-muted"></i> Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($viajes as $viaje)
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted">
                                                {{ $viaje->id }}
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-dark">{{ $viaje->vehiculo->placa ?? 'N/A' }}</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $viaje->ruta->nombre_ruta ?? 'N/A' }}</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ Str::limit($viaje->descripcion, 30) }}</span>
                                            </td>
                                            <td>
                                                <i class="fas fa-hourglass-half text-info mr-1"></i>
                                                {{ $viaje->tiempo_estimado }}
                                            </td>
                                            <td>
                                                <span class="badge badge-info px-2 py-1">
                                                    ${{ number_format($viaje->costo_total, 2) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $viaje->registrado_por }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($viaje->estado)
                                                    <span class="badge badge-success px-3 py-2">
                                                        <i class="fas fa-check-circle mr-1"></i> Activo
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger px-3 py-2">
                                                        <i class="fas fa-times-circle mr-1"></i> Inactivo
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('viajes.edit', $viaje->id) }}"
                                                        class="btn btn-sm btn-info" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form class="d-inline delete-form"
                                                        action="{{ route('viajes.destroy', $viaje->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- Agregada sección de paginación en el footer de la card --}}
                        <div class="card-footer bg-white border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">
                                    Mostrando {{ $viajes->firstItem() ?? 0 }} a {{ $viajes->lastItem() ?? 0 }}
                                    de {{ $viajes->total() }} registros
                                </div>
                                <div>
                                    {{ $viajes->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .card-header {
        padding: 1.25rem;
    }
    
    .table thead th {
        border-bottom: 2px solid #dee2e6;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 1rem;
    }
    
    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
    }
    
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
    }
    
    .badge {
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.3px;
    }
    
    .btn-group .btn {
        padding: 0.375rem 0.75rem;
    }
    
    .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
    }
    
    .search-box .input-group-text {
        border: 1px solid #ced4da;
        border-right: 0;
    }
    
    .search-box .form-control {
        border: 1px solid #ced4da;
        border-left: 0;
    }
    
    .search-box .form-control:focus {
        box-shadow: none;
        border-color: #80bdff;
    }
    
    .search-box .input-group-text {
        background-color: #fff;
    }
    
    .search-box .form-control:focus + .input-group-prepend .input-group-text {
        border-color: #80bdff;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchTable');
    const table = document.getElementById('example1');
    const tbody = table.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');
    
    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        rows.forEach(function(row) {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
});
</script>

@endsection
