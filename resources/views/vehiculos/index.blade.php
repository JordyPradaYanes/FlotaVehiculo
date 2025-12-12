@extends('layouts.app')

@section('title', 'Listado De Vehículos')

@section('content')

    <div class="content-wrapper" style="background: var(--gray-50);">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="m-0"
                        style="font-family: var(--font-display); color: var(--primary-blue-dark); font-weight: 700;">
                        <i class="fas fa-car mr-2"></i>Vehículos
                    </h1>
                    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-1"></i> Nuevo Vehículo
                    </a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                {{-- Mensajes de éxito y error --}}
                @if (session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('successMsg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm"
                            style="background: var(--white); border: 1px solid var(--gray-200) !important; border-radius: 12px;">
                            <div class="card-header"
                                style="background: var(--gradient-light); border-bottom: 2px solid var(--primary-blue);">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="card-title font-weight-bold mb-0"
                                        style="color: var(--primary-blue-dark); font-family: var(--font-body);">
                                        <i class="fas fa-list mr-2"></i>Listado de Vehículos
                                    </h3>
                                    <div class="search-box" style="width: 300px;">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    style="background: var(--white); border: 1px solid var(--gray-300); border-right: none;">
                                                    <i class="fas fa-search" style="color: var(--primary-blue);"></i>
                                                </span>
                                            </div>
                                            <input type="text" id="searchTable" class="form-control"
                                                placeholder="Buscar vehículo..."
                                                style="background: var(--white); border: 1px solid var(--gray-300); border-left: none; color: var(--text-primary);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0" style="background: var(--white);">
                                <div>
                                    <table id="example1" class="table table-hover align-middle mb-0"
                                        style="width:100%; color: var(--text-secondary);">
                                        <thead style="background: var(--gradient-blue);">
                                            <tr>
                                                <th class="text-center" style="width: 50px; color: white;">
                                                    <i class="fas fa-hashtag" style="color: white;"></i>
                                                </th>
                                                <th class="text-center" style="width: 70px; color: white;">
                                                    <i class="fas fa-image" style="color: white;"></i>
                                                </th>
                                                <th style="width: 100px; color: white;">
                                                    <i class="fas fa-id-card" style="color: white;"></i> Placa
                                                </th>
                                                <th style="width: 110px; color: white;">
                                                    <i class="fas fa-copyright" style="color: white;"></i> Marca
                                                </th>
                                                <th style="width: 90px; color: white;">
                                                    <i class="fas fa-truck" style="color: white;"></i> Tipo
                                                </th>
                                                <th style="width: 80px; color: white;">
                                                    <i class="fas fa-car-side" style="color: white;"></i> Modelo
                                                </th>
                                                <th class="text-center" style="width: 60px; color: white;">
                                                    <i class="fas fa-calendar-alt" style="color: white;"></i> Año
                                                </th>
                                                <th style="width: 100px; color: white;">
                                                    <i class="fas fa-palette" style="color: white;"></i> Color
                                                </th>
                                                <th class="text-center" style="width: 100px; color: white;">
                                                    <i class="fas fa-tachometer-alt" style="color: white;"></i> Km
                                                </th>
                                                <th class="text-center" style="width: 90px; color: white;">
                                                    <i class="fas fa-toggle-on" style="color: white;"></i> Estado
                                                </th>
                                                <th class="text-center" style="width: 100px; color: white;">
                                                    <i class="fas fa-cog" style="color: white;"></i> Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                // Mapeo de colores en español a código hexadecimal
                                                $coloresMap = [
                                                    'rojo' => '#DC3545',
                                                    'azul' => '#007BFF',
                                                    'azul marino' => '#000080',
                                                    'azul claro' => '#87CEEB',
                                                    'azul oscuro' => '#00008B',
                                                    'verde' => '#28A745',
                                                    'verde claro' => '#90EE90',
                                                    'verde oscuro' => '#006400',
                                                    'verde oliva' => '#808000',
                                                    'amarillo' => '#FFC107',
                                                    'negro' => '#343A40',
                                                    'blanco' => '#F8F9FA',
                                                    'gris' => '#6C757D',
                                                    'gris oscuro' => '#4B4B4B',
                                                    'plateado' => '#C0C0C0',
                                                    'dorado' => '#FFD700',
                                                    'naranja' => '#FD7E14',
                                                    'morado' => '#6F42C1',
                                                    'rosa' => '#E83E8C',
                                                    'café' => '#8B4513',
                                                    'marrón' => '#8B4513',
                                                    'beige' => '#F5F5DC',
                                                    'rojo oscuro' => '#8B0000',
                                                    'celeste' => '#87CEEB',
                                                    'lima' => '#00FF00',
                                                    'magenta' => '#FF00FF',
                                                    'turquesa' => '#40E0D0',
                                                ];
                                            @endphp

                                            @foreach ($vehiculos as $vehiculo)
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
                                                        @if ($vehiculo->imagen && file_exists(public_path('uploads/vehiculos/' . $vehiculo->imagen)))
                                                            <img src="{{ asset('uploads/vehiculos/' . $vehiculo->imagen) }}"
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
                                                        <span
                                                            class="font-weight-bold text-dark">{{ $vehiculo->placa }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-secondary">{{ $vehiculo->marca->nombre ?? 'N/A' }}</span>
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
                                                            <span
                                                                class="text-secondary">{{ ucfirst($vehiculo->color) }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-warning px-2 py-1"
                                                            style="font-size: 0.75rem;">
                                                            {{ number_format($vehiculo->kilometraje / 1000, 0) }}k
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($vehiculo->estado)
                                                            <span class="badge badge-success px-3 py-2"
                                                                style="cursor: pointer;" title="Clic para cambiar estado">
                                                                <i class="fas fa-check-circle mr-1"></i> Activo
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger px-3 py-2"
                                                                style="cursor: pointer;" title="Clic para cambiar estado">
                                                                <i class="fas fa-times-circle mr-1"></i> Inactivo
                                                            </span>
                                                        @endif
                                                        <input data-type="vehiculos" data-id="{{ $vehiculo->id }}"
                                                            class="toggle-class d-none" type="checkbox"
                                                            data-onstyle="success" data-offstyle="danger"
                                                            data-toggle="toggle" data-on="Activo" data-off="Inactivo"
                                                            {{ $vehiculo->estado ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group" role="group">
                                                            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                                                                class="btn btn-sm btn-info" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <form class="d-inline delete-form"
                                                                action="{{ route('vehiculos.destroy', $vehiculo->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    title="Eliminar">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>

                                                {{-- Modal para ver imagen completa --}}
                                                @if ($vehiculo->imagen && file_exists(public_path('uploads/vehiculos/' . $vehiculo->imagen)))
                                                    <div class="modal fade" id="imageModal{{ $vehiculo->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="imageModalLabel{{ $vehiculo->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="imageModalLabel{{ $vehiculo->id }}">
                                                                        Imagen del Vehículo - {{ $vehiculo->placa }}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <img src="{{ asset('uploads/vehiculos/' . $vehiculo->imagen) }}"
                                                                        alt="Imagen de {{ $vehiculo->placa }}"
                                                                        class="img-fluid" style="max-height: 500px;">
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
    <link rel="stylesheet" href="{{ asset('backend/dist/css/vehiculos.css') }}">
@endpush

{{-- Scripts en el orden correcto --}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('backend/dist/js/vehiculos.js') }}"></script>
    <script src="{{ asset('backend/dist/js/statuschange.js') }}"></script>
    <script src="{{ asset('backend/dist/js/delete-confirm.js') }}"></script>
@endpush
