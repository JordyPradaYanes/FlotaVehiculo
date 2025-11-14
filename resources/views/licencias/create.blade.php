@extends('layouts.app')

@section('title','Crear Licencia')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3>@yield('title')</h3>
                        </div>

                        <form method="POST" action="{{ route('licencias.store') }}">
                            @csrf
                            <div class="card-body">

                                {{-- Mensajes de error --}}
                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                {{-- Número de licencia --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Número de Licencia <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="numero_licencia"
                                                placeholder="Ej: LIC-1234-5678" autocomplete="off"
                                                value="{{ old('numero_licencia') }}" required>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tipo de licencia --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Tipo de Licencia <strong
                                                    style="color:red;">(*)</strong></label>
                                            <select name="tipo_licencia" class="form-control" required>
                                                <option value="">Seleccione...</option>
                                                @foreach(['A1','A2','B1','B2','C1','C2'] as $tipo)
                                                <option value="{{ $tipo }}"
                                                    {{ old('tipo_licencia') == $tipo ? 'selected' : '' }}>
                                                    {{ $tipo }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- Fecha de expedición --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Fecha de Expedición <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="date" name="fecha_expedicion" class="form-control"
                                                value="{{ old('fecha_expedicion') }}" required>
                                        </div>
                                    </div>
                                </div>

                                {{-- Fecha de vencimiento --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Fecha de Vencimiento <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="date" name="fecha_vencimiento" class="form-control"
                                                value="{{ old('fecha_vencimiento') }}" required>
                                        </div>
                                    </div>
                                </div>

                                {{-- Entidad emisora --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Entidad Emisora <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" name="entidad_emisora" class="form-control"
                                                placeholder="Ej: Secretaría de Tránsito de Medellín" autocomplete="off"
                                                value="{{ old('entidad_emisora') }}" required>
                                        </div>
                                    </div>
                                </div>

                                {{-- Hidden fields --}}
                                <input type="hidden" name="estado" value="1">
                                <input type="hidden" name="registrado_por" value="{{ Auth::user()->name }}">

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Registrar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('licencias.index') }}"
                                            class="btn btn-danger btn-block btn-flat">Atrás</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection