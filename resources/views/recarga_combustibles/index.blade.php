@extends('layouts.app')

@section('title','Listado De Recargas de Combustible')

@section('content')

<div class="content-wrapper pb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0"><i class="fas fa-gas-pump mr-2"></i>Recargas de Combustible</h1>
                <a href="{{ route('recarga_combustibles.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Nueva Recarga
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            {{-- Agregando mensajes de éxito y error --}}
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
                                    <i class="fas fa-list mr-2 text-primary"></i>Listado de Recargas
                                </h3>
                                <div class="search-box" style="width: 300px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0">
                                                <i class="fas fa-search text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="searchTable" class="form-control border-left-0" 
                                               placeholder="Buscar recarga...">
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
                                            <th class="text-center">
                                                <i class="fas fa-tint text-muted"></i> Cantidad (L)
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-dollar-sign text-muted"></i> Precio/Litro
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-money-bill-wave text-muted"></i> Costo Total
                                            </th>
                                            <th>
                                                <i class="fas fa-map-marker-alt text-muted"></i> Estación
                                            </th>
                                            <th>
                                                <i class="fas fa-user text-muted"></i> Registrado por
                                            </th>
                                            <th>
                                                <i class="fas fa-calendar text-muted"></i> Fecha
                                            </th>
                                            <th class="text-center" style="width: 140px;">
                                                <i class="fas fa-cog text-muted"></i> Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recarga_combustibles as $recarga)
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted">
                                                {{ $recarga->id }}
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-dark">
                                                    {{ $recarga->vehiculo->placa ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-primary px-2 py-1">
                                                    {{ $recarga->cantidad_litros }} L
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-info px-2 py-1">
                                                    ${{ number_format($recarga->precio_litro, 2) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-success px-2 py-1">
                                                    ${{ number_format($recarga->costo_total, 2) }}
                                                </span>
                                            </td>
                                            <td>
                                                <i class="fas fa-building text-warning mr-1"></i>
                                                <span class="text-secondary">{{ $recarga->estacion_servicio }}</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $recarga->registrado_por }}</span>
                                            </td>
                                            <td>
                                                <i class="fas fa-clock text-muted mr-1"></i>
                                                {{ $recarga->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('recarga_combustibles.edit', $recarga->id) }}"
                                                        class="btn btn-sm btn-info" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    {{-- Formulario de eliminación corregido --}}
                                                    <form class="delete-form d-inline" 
                                                          action="{{ route('recarga_combustibles.destroy', $recarga->id) }}" 
                                                          method="POST">
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
                                    Mostrando {{ $recarga_combustibles->firstItem() ?? 0 }} a {{ $recarga_combustibles->lastItem() ?? 0 }}
                                    de {{ $recarga_combustibles->total() }} registros
                                </div>
                                <div>
                                    {{ $recarga_combustibles->links('pagination::bootstrap-4') }}
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
{{-- Agregando estilos personalizados de empresas --}}
<link rel="stylesheet" href="{{ asset('backend/dist/css/recarga.css') }}">
@endpush

{{-- Scripts en el orden correcto --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('backend/dist/js/recarga_combustibles.js') }}"></script>
<script src="{{ asset('backend/dist/js/statuschange.js') }}"></script>
<script src="{{ asset('backend/dist/js/delete-confirm.js') }}"></script>
@endpush