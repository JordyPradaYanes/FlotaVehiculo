@extends('layouts.app')

@section('title','Listado De Contratos')

@section('content')

<div class="content-wrapper pb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0"><i class="fas fa-file-contract mr-2"></i>Contratos</h1>
                <a href="{{ route('contratos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Nuevo Contrato
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
                                    <i class="fas fa-list mr-2 text-primary"></i>Listado de Contratos
                                </h3>
                                <div class="search-box" style="width: 300px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0">
                                                <i class="fas fa-search text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="searchTable" class="form-control border-left-0" 
                                               placeholder="Buscar contrato...">
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
                                                <i class="fas fa-calendar-alt text-muted"></i> Fecha Inicio
                                            </th>
                                            <th>
                                                <i class="fas fa-calendar-check text-muted"></i> Fecha Final
                                            </th>
                                            <th>
                                                <i class="fas fa-dollar-sign text-muted"></i> Salario
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
                                        @foreach($contratos as $contrato)
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted">
                                                {{ $contrato->id }}
                                            </td>
                                            <td>
                                                <i class="fas fa-calendar text-primary mr-1"></i>
                                                <span class="font-weight-bold text-dark">
                                                    {{ \Carbon\Carbon::parse($contrato->fecha_inicio)->format('d/m/Y') }}
                                                </span>
                                            </td>
                                            <td>
                                                <i class="fas fa-calendar text-success mr-1"></i>
                                                <span class="font-weight-bold text-dark">
                                                    {{ \Carbon\Carbon::parse($contrato->fecha_final)->format('d/m/Y') }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-success">
                                                    ${{ number_format($contrato->salario, 2, ',', '.') }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $contrato->registrado_por }}</span>
                                            </td>
                                            <td class="text-center">
                                                {{-- Badge ahora es clickeable para cambiar estado --}}
                                                @if($contrato->estado)
                                                    <span class="badge badge-success px-3 py-2" style="cursor: pointer;" title="Clic para cambiar estado">
                                                        <i class="fas fa-check-circle mr-1"></i> Activo
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger px-3 py-2" style="cursor: pointer;" title="Clic para cambiar estado">
                                                        <i class="fas fa-times-circle mr-1"></i> Inactivo
                                                    </span>
                                                @endif
                                                <input data-type="contratos" data-id="{{ $contrato->id }}"
                                                    class="toggle-class d-none" type="checkbox" 
                                                    data-onstyle="success"
                                                    data-offstyle="danger" data-toggle="toggle" 
                                                    data-on="Activo"
                                                    data-off="Inactivo" {{ $contrato->estado ? 'checked' : '' }}>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('contratos.edit', $contrato->id) }}"
                                                        class="btn btn-sm btn-info" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    {{-- Formulario de eliminación corregido --}}
                                                    <form class="delete-form d-inline" 
                                                          action="{{ route('contratos.destroy', $contrato->id) }}" 
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
                                    Mostrando {{ $contratos->firstItem() ?? 0 }} a {{ $contratos->lastItem() ?? 0 }} 
                                    de {{ $contratos->total() }} registros
                                </div>
                                <div>
                                    {{ $contratos->links('pagination::bootstrap-4') }}
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

{{-- Importar estilos de conductores --}}
@push('styles')
<link rel="stylesheet" href="{{ asset('css/contratos.css') }}">
@endpush

{{-- Scripts en el orden correcto --}}
@push('scripts')
<!-- IMPORTANTE: jQuery PRIMERO (si no está en el layout) -->
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Scripts personalizados -->
<script src="{{ asset('backend/dist/js/contratos.js') }}"></script>
<script src="{{ asset('backend/dist/js/statuschange.js') }}"></script>
<script src="{{ asset('backend/dist/js/delete-confirm.js') }}"></script>
@endpush
