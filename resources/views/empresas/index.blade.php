@extends('layouts.app')

@section('title','Listado De Empresas')

@section('content')

<div class="content-wrapper pb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0"><i class="fas fa-building mr-2"></i>Empresas</h1>
                <a href="{{ route('empresas.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Nueva Empresa
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
                                    <i class="fas fa-list mr-2 text-primary"></i>Listado de Empresas
                                </h3>
                                <div class="search-box" style="width: 300px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0">
                                                <i class="fas fa-search text-muted"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="searchTable" class="form-control border-left-0"
                                            placeholder="Buscar empresa...">
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
                                                <i class="fas fa-building text-muted"></i> Nombre Empresa
                                            </th>
                                            <th>
                                                <i class="fas fa-map-marker-alt text-muted"></i> Dirección
                                            </th>
                                            <th>
                                                <i class="fas fa-phone text-muted"></i> Teléfono
                                            </th>
                                            <th>
                                                <i class="fas fa-envelope text-muted"></i> Email
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
                                        @foreach($empresas as $empresa)
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted">
                                                {{ $empresa->id }}
                                            </td>
                                            <td>
                                                <span
                                                    class="font-weight-bold text-dark">{{ $empresa->nombre_empresa }}</span>
                                            </td>
                                            <td>
                                                <i class="fas fa-location-arrow text-info mr-1"></i>
                                                <span class="text-secondary">{{ $empresa->direccion }}</span>
                                            </td>
                                            <td>
                                                <i class="fas fa-phone-alt text-success mr-1"></i>
                                                <span class="text-secondary">{{ $empresa->telefono }}</span>
                                            </td>
                                            <td>
                                                <i class="fas fa-at text-primary mr-1"></i>
                                                <span class="text-secondary">{{ $empresa->email }}</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary">{{ $empresa->registrado_por }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($empresa->estado)
                                                <span class="badge badge-success px-3 py-2 toggle-class" 
                                                      style="cursor: pointer;"
                                                      data-type="empresas" 
                                                      data-id="{{ $empresa->id }}">
                                                    <i class="fas fa-check-circle mr-1"></i> Activo
                                                </span>
                                                @else
                                                <span class="badge badge-danger px-3 py-2 toggle-class" 
                                                      style="cursor: pointer;"
                                                      data-type="empresas" 
                                                      data-id="{{ $empresa->id }}">
                                                    <i class="fas fa-times-circle mr-1"></i> Inactivo
                                                </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('empresas.edit', $empresa->id) }}"
                                                        class="btn btn-sm btn-info" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form class="d-inline delete-form"
                                                        action="{{ route('empresas.destroy', $empresa->id) }}"
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">
                                    Mostrando {{ $empresas->firstItem() ?? 0 }} a {{ $empresas->lastItem() ?? 0 }}
                                    de {{ $empresas->total() }} registros
                                </div>
                                <div>
                                    {{ $empresas->links('pagination::bootstrap-4') }}
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
<link rel="stylesheet" href="{{ asset('backend/dist/css/empresas.css') }}">
@endpush

@push('scripts')
{{-- Agregando scripts necesarios para SweetAlert2 y funcionalidad del buscador --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend/dist/js/delete-confirm.js') }}"></script>
<script src="{{ asset('backend/dist/js/statuschange.js') }}"></script>
<script src="{{ asset('backend/dist/js/empresas.js') }}"></script>
@endpush
