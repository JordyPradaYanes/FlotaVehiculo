@extends('layouts.app')

@section('title','Listado De Tipos de Vehículos')

@section('content')

<div class="content-wrapper pb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0"><i class="fas fa-truck mr-2"></i>Tipos de Vehículos</h1>
                <a href="{{ route('tipo_vehiculos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Nuevo Tipo
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
                                    <i class="fas fa-list mr-2 text-primary"></i>Listado de Tipos de Vehículos
                                </h3>
                                <div class="search-box" style="width: 300px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0">
                                                <i class="fas fa-search text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="searchTable" class="form-control border-left-0" 
                                               placeholder="Buscar tipo...">
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
                                                <i class="fas fa-tag text-muted"></i> Nombre
                                            </th>
                                            <th>
                                                <i class="fas fa-align-left text-muted"></i> Descripción
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-users text-muted"></i> Cap. Pasajeros
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-box text-muted"></i> Cap. Carga
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-gas-pump text-muted"></i> Cap. Gasolina
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
                                        @foreach($tipo_vehiculos as $tipo)
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted">
                                                {{ $tipo->id }}
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-dark">{{ $tipo->nombre }}</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ Str::limit($tipo->descripcion, 40) }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-primary px-2 py-1">
                                                    {{ $tipo->capacidad_pasajero }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-warning px-2 py-1">
                                                    {{ $tipo->capacidad_carga }} kg
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-info px-2 py-1">
                                                    {{ $tipo->capacidad_gasolina }} L
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $tipo->registrado_por }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($tipo->estado)
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
                                                    <a href="{{ route('tipo_vehiculos.edit', $tipo->id) }}"
                                                        class="btn btn-sm btn-info" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form class="d-inline delete-form"
                                                        action="{{ route('tipo_vehiculos.destroy', $tipo->id) }}" method="POST">
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
                                    Mostrando {{ $tipo_vehiculos->firstItem() ?? 0 }} a {{ $tipo_vehiculos->lastItem() ?? 0 }}
                                    de {{ $tipo_vehiculos->total() }} registros
                                </div>
                                <div>
                                    {{ $tipo_vehiculos->links('pagination::bootstrap-4') }}
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
<link rel="stylesheet" href="{{ asset('backend/dist/css/tipo_vehiculos.css') }}">
@endpush

{{-- Scripts en el orden correcto --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('backend/dist/js/tipo_vehiculos.js') }}"></script>
<script src="{{ asset('backend/dist/js/statuschange.js') }}"></script>
<script src="{{ asset('backend/dist/js/delete-confirm.js') }}"></script>
@endpush