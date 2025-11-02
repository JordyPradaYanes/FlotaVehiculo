@extends('layouts.app')

@section('title','Crear Conductor')

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
                        <form method="POST" action="{{ route('conductores.store') }}">
                            @csrf
                            <div class="card-body">
                                {{-- Agregado mensaje de error si existe --}}
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

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                                <label class="control-label">Nombre <strong
                                                        style="color:red;">(*)</strong></label>
                                                <input type="text" class="form-control" name="nombre"
                                                    placeholder="Por ejemplo, Juan" autocomplete="off"
                                                    value="{{ old('nombre') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                                <label class="control-label">Apellido <strong
                                                        style="color:red;">(*)</strong></label>
                                                <input type="text" class="form-control" name="apellido"
                                                    placeholder="Por ejemplo, Pérez" autocomplete="off"
                                                    value="{{ old('apellido') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Documento<strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="documento"
                                                placeholder="Por ejemplo, 1094566924" autocomplete="off"
                                                value="{{ old('documento') }}" required>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fecha de nacimiento<strong
                                                    style="color:red;">(*)</strong></label>
                                            {{-- Cambiado de type="text" a type="date" para validación correcta --}}
                                            <input type="date" class="form-control" name="fecha_nacimiento"
                                                autocomplete="off"
                                                value="{{ old('fecha_nacimiento') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="estado" value="1">
                            </div>
                            <div class="card-footer">
                                {{-- Actualizado para coincidir con el estilo de marcas --}}
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Registrar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('conductores.index') }}"
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
