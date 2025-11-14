@extends('layouts.app')

@section('title','Listado De Licencias')

@section('content')

<div class="content-wrapper pb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0"><i class="fas fa-id-card mr-2"></i>Licencias de Conducir</h1>
                <a href="{{ route('licencias.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Nueva Licencia
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
                                    <i class="fas fa-list mr-2 text-primary"></i>Listado de Licencias
                                </h3>
                                <div class="search-box" style="width: 300px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0">
                                                <i class="fas fa-search text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="searchTable" class="form-control border-left-0" 
                                               placeholder="Buscar licencia...">
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
                                                <i class="fas fa-barcode text-muted"></i> Número Licencia
                                            </th>
                                            <th>
                                                <i class="fas fa-certificate text-muted"></i> Tipo
                                            </th>
                                            <th>
                                                <i class="fas fa-calendar-plus text-muted"></i> Fecha Expedición
                                            </th>
                                            <th>
                                                <i class="fas fa-calendar-times text-muted"></i> Fecha Vencimiento
                                            </th>
                                            <th>
                                                <i class="fas fa-building text-muted"></i> Entidad Emisora
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
                                        @foreach($licencias as $licencia)
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted">
                                                {{ $licencia->id }}
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-dark">{{ $licencia->numero_licencia }}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary px-2 py-1">
                                                    {{ $licencia->tipo_licencia }}
                                                </span>
                                            </td>
                                            <td>
                                                <i class="fas fa-calendar text-success mr-1"></i>
                                                {{ \Carbon\Carbon::parse($licencia->fecha_expedicion)->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                <i class="fas fa-calendar text-danger mr-1"></i>
                                                {{ \Carbon\Carbon::parse($licencia->fecha_vencimiento)->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $licencia->entidad_emisora }}</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $licencia->registrado_por }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($licencia->estado)
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
                                                    <a href="{{ route('licencias.edit', $licencia->id) }}"
                                                        class="btn btn-sm btn-info" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form class="d-inline delete-form"
                                                        action="{{ route('licencias.destroy', $licencia->id) }}" method="POST">
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
                                    Mostrando {{ $licencias->firstItem() ?? 0 }} a {{ $licencias->lastItem() ?? 0 }}
                                    de {{ $licencias->total() }} registros
                                </div>
                                <div>
                                    {{ $licencias->links('pagination::bootstrap-4') }}
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
<link rel="stylesheet" href="{{ asset('backend/dist/css/licencias.css') }}">
@endpush

@push('scripts')
{{-- Agregando scripts necesarios para SweetAlert2 y funcionalidad del buscador --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend/dist/js/delete-confirm.js') }}"></script>
<script src="{{ asset('backend/dist/js/statuschange.js') }}"></script>
<script src="{{ asset('backend/dist/js/licencias.js') }}"></script>
@endpush