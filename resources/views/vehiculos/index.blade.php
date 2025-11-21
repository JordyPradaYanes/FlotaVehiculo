@extends('layouts.app')

@section('title','Listado De Vehículos')

@section('content')

<div class="content-wrapper pb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0"><i class="fas fa-car mr-2"></i>Vehículos</h1>
                <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Nuevo Vehículo
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            {{-- Mensajes de éxito y error --}}
            @if(session('successMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('successMsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title font-weight-bold mb-0">
                                    <i class="fas fa-list mr-2 text-primary"></i>Listado de Vehículos
                                </h3>
                                <div class="search-box" style="width: 300px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0">
                                                <i class="fas fa-search text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="searchTable" class="form-control border-left-0" 
                                               placeholder="Buscar vehículo...">
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
                                            <th class="text-center" style="width: 80px;">
                                                <i class="fas fa-image text-muted"></i> Imagen
                                            </th>
                                            <th>
                                                <i class="fas fa-id-card text-muted"></i> Placa
                                            </th>
                                            <th>
                                                <i class="fas fa-copyright text-muted"></i> Marca
                                            </th>
                                            <th>
                                                <i class="fas fa-truck text-muted"></i> Tipo
                                            </th>
                                            <th>
                                                <i class="fas fa-car-side text-muted"></i> Modelo
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-calendar-alt text-muted"></i> Año
                                            </th>
                                            <th>
                                                <i class="fas fa-palette text-muted"></i> Color
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-tachometer-alt text-muted"></i> Kilometraje
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
                                        @php
                                        // Mapeo de colores en español a código hexadecimal
                                        $coloresMap = [
                                            'rojo' => '#DC3545',
                                            'azul' => '#007BFF',
                                            'verde' => '#28A745',
                                            'amarillo' => '#FFC107',
                                            'negro' => '#343A40',
                                            'blanco' => '#F8F9FA',
                                            'gris' => '#6C757D',
                                            'plateado' => '#C0C0C0',
                                            'dorado' => '#FFD700',
                                            'naranja' => '#FD7E14',
                                            'morado' => '#6F42C1',
                                            'rosa' => '#E83E8C',
                                            'café' => '#8B4513',
                                            'beige' => '#F5F5DC',
                                            'verde claro' => '#90EE90',
                                            'azul claro' => '#87CEEB',
                                            'gris oscuro' => '#4B4B4B',
                                            'rojo oscuro' => '#8B0000',
                                            'azul oscuro' => '#00008B',
                                            'verde oscuro' => '#006400',
                                        ];
                                        @endphp
                                        
                                        @foreach($vehiculos as $vehiculo)
                                        @php
                                            // Obtener el color en minúsculas para buscar en el mapa
                                            $colorNombre = strtolower(trim($vehiculo->color));
                                            $colorHex = $coloresMap[$colorNombre] ?? '#6C757D';
                                            
                                            // Si el color ya viene en formato hexadecimal (#), usarlo directamente
                                            if (str_starts_with($vehiculo->color, '#')) {
                                                $colorHex = $vehiculo->color;
                                            }
                                        @endphp
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted">
                                                {{ $vehiculo->id }}
                                            </td>
                                            <td class="text-center">
                                                @if($vehiculo->imagen && file_exists(public_path('uploads/vehiculos/'.$vehiculo->imagen)))
                                                    <img src="{{ asset('uploads/vehiculos/'.$vehiculo->imagen) }}" 
                                                         alt="Imagen de {{ $vehiculo->placa }}" 
                                                         class="img-thumbnail" 
                                                         style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;"
                                                         data-toggle="modal" 
                                                         data-target="#imageModal{{ $vehiculo->id }}">
                                                @else
                                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                                         style="width: 60px; height: 60px; border-radius: 4px;">
                                                        <i class="fas fa-car text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-dark">{{ $vehiculo->placa }}</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $vehiculo->marca->nombre ?? 'N/A' }}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary px-2 py-1">
                                                    {{ $vehiculo->tipoVehiculo->nombre ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $vehiculo->modelo }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-info px-2 py-1">
                                                    {{ $vehiculo->año }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="color-circle mr-2" 
                                                          style="display: inline-block; 
                                                                 width: 20px; 
                                                                 height: 20px; 
                                                                 border-radius: 50%; 
                                                                 background-color: {{ $colorHex }};
                                                                 border: 2px solid #dee2e6;
                                                                 box-shadow: 0 1px 3px rgba(0,0,0,0.12);"
                                                          title="{{ ucfirst($vehiculo->color) }}">
                                                    </span>
                                                    <span class="text-secondary">{{ ucfirst($vehiculo->color) }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-warning px-2 py-1">
                                                    {{ number_format($vehiculo->kilometraje) }} km
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $vehiculo->registrado_por ?? 'Sistema' }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($vehiculo->estado)
                                                    <span class="badge badge-success px-3 py-2" style="cursor: pointer;" title="Clic para cambiar estado">
                                                        <i class="fas fa-check-circle mr-1"></i> Activo
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger px-3 py-2" style="cursor: pointer;" title="Clic para cambiar estado">
                                                        <i class="fas fa-times-circle mr-1"></i> Inactivo
                                                    </span>
                                                @endif
                                                <input data-type="vehiculos" data-id="{{ $vehiculo->id }}"
                                                    class="toggle-class d-none" type="checkbox" 
                                                    data-onstyle="success"
                                                    data-offstyle="danger" data-toggle="toggle" 
                                                    data-on="Activo"
                                                    data-off="Inactivo" {{ $vehiculo->estado ? 'checked' : '' }}>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                                                        class="btn btn-sm btn-info" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form class="d-inline delete-form"
                                                        action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        {{-- Modal para ver imagen completa --}}
                                        @if($vehiculo->imagen && file_exists(public_path('uploads/vehiculos/'.$vehiculo->imagen)))
                                        <div class="modal fade" id="imageModal{{ $vehiculo->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $vehiculo->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="imageModalLabel{{ $vehiculo->id }}">
                                                            Imagen del Vehículo - {{ $vehiculo->placa }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('uploads/vehiculos/'.$vehiculo->imagen) }}" 
                                                             alt="Imagen de {{ $vehiculo->placa }}" 
                                                             class="img-fluid" 
                                                             style="max-height: 500px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- Agregada sección de paginación en el footer de la card --}}
                        <div class="card-footer bg-white border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">
                                    Mostrando {{ $vehiculos->firstItem() ?? 0 }} a {{ $vehiculos->lastItem() ?? 0 }}
                                    de {{ $vehiculos->total() }} registros
                                </div>
                                <div>
                                    {{ $vehiculos->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


@push('styles')
{{-- Agregando estilos personalizados de vehiculos --}}
<link rel="stylesheet" href="{{ asset('backend/dist/css/vehiculos.css') }}">
@endpush

{{-- Scripts en el orden correcto --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('backend/dist/js/vehiculos.js') }}"></script>
<script src="{{ asset('backend/dist/js/statuschange.js') }}"></script>
<script src="{{ asset('backend/dist/js/delete-confirm.js') }}"></script>
@endpush