@extends('layouts.app')

@section('title','Listado De Conductores')

@section('content')

<div class="content-wrapper pb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0"><i class="fas fa-id-card mr-2"></i>Conductores</h1>
                <a href="{{ route('conductores.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Nuevo Conductor
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
                                    <i class="fas fa-list mr-2 text-primary"></i>Listado de Conductores
                                </h3>
                                <div class="search-box" style="width: 300px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0">
                                                <i class="fas fa-search text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="searchTable" class="form-control border-left-0" 
                                               placeholder="Buscar conductor...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="conductoresTable" class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-center" style="width: 60px;">
                                                <i class="fas fa-hashtag text-muted"></i> ID
                                            </th>
                                            <th>
                                                <i class="fas fa-user text-muted"></i> Nombre
                                            </th>
                                            <th>
                                                <i class="fas fa-user-tag text-muted"></i> Apellido
                                            </th>
                                            <th>
                                                <i class="fas fa-id-card text-muted"></i> Documento
                                            </th>
                                            <th>
                                                <i class="fas fa-calendar-alt text-muted"></i> Fecha Nacimiento
                                            </th>
                                            <th>
                                                <i class="fas fa-user-check text-muted"></i> Registrado por
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
                                        @foreach($conductores as $conductor)
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted">
                                                {{ $conductor->id }}
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-dark">{{ $conductor->nombre }}</span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-dark">{{ $conductor->apellido }}</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">
                                                    <i class="fas fa-fingerprint text-info mr-1"></i>
                                                    {{ $conductor->documento }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">
                                                    <i class="fas fa-birthday-cake text-warning mr-1"></i>
                                                    {{ \Carbon\Carbon::parse($conductor->fecha_nacimiento)->format('d/m/Y') }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $conductor->registrado_por }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($conductor->estado)
                                                    <span class="badge badge-success px-3 py-2">
                                                        <i class="fas fa-check-circle mr-1"></i> Activo
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger px-3 py-2">
                                                        <i class="fas fa-times-circle mr-1"></i> Inactivo
                                                    </span>
                                                @endif
                                                <input data-type="conductores" data-id="{{ $conductor->id }}"
                                                    class="toggle-class d-none" type="checkbox" 
                                                    data-onstyle="success"
                                                    data-offstyle="danger" data-toggle="toggle" 
                                                    data-on="Activo"
                                                    data-off="Inactivo" {{ $conductor->estado ? 'checked' : '' }}>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('conductores.edit', $conductor->id) }}"
                                                        class="btn btn-sm btn-info" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form class="d-inline delete-form"
                                                        action="{{ route('conductores.destroy', $conductor->id) }}" method="POST">
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
                            <!-- Agregada sección de paginación -->
                            <div class="pagination-wrapper">
                                <div class="pagination-info">
                                    Mostrando {{ $conductores->firstItem() ?? 0 }} a {{ $conductores->lastItem() ?? 0 }} de {{ $conductores->total() }} registros
                                </div>
                                <div>
                                    {{ $conductores->links('pagination::bootstrap-4') }}
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
    
    .table tbody tr.hidden {
        display: none;
    }
    
    /* Estilos para la paginación */
    .pagination-wrapper {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-top: 1px solid #dee2e6;
    }
    
    .pagination-info {
        color: #6c757d;
        font-size: 14px;
    }
    
    .pagination {
        margin: 0;
    }
    
    .pagination .page-link {
        color: #007bff;
        border: 1px solid #dee2e6;
        padding: 8px 12px;
        margin: 0 2px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }
    
    .pagination .page-link:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
    
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }
    
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchTable');
    const table = document.getElementById('conductoresTable');
    const tbody = table.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');
    const paginationWrapper = document.querySelector('.pagination-wrapper');
    
    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase().trim();
        let hasVisibleRows = false;
        
        rows.forEach(function(row) {
            const id = row.cells[0].textContent.toLowerCase();
            const nombre = row.cells[1].textContent.toLowerCase();
            const apellido = row.cells[2].textContent.toLowerCase();
            const documento = row.cells[3].textContent.toLowerCase();
            const fechaNacimiento = row.cells[4].textContent.toLowerCase();
            const registradoPor = row.cells[5].textContent.toLowerCase();
            
            // Buscar en todas las columnas relevantes
            if (id.includes(searchTerm) ||
                nombre.includes(searchTerm) || 
                apellido.includes(searchTerm) || 
                documento.includes(searchTerm) ||
                fechaNacimiento.includes(searchTerm) ||
                registradoPor.includes(searchTerm)) {
                row.style.display = '';
                hasVisibleRows = true;
            } else {
                row.style.display = 'none';
            }
        });
        
        // Ocultar paginación cuando hay búsqueda activa
        if (searchTerm.length > 0) {
            paginationWrapper.style.display = 'none';
        } else {
            paginationWrapper.style.display = 'flex';
        }
    });
});
</script>

@endsection
