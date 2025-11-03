@extends('layouts.app')

@section('title','Crear Tipo de Vehículo')

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
                        <form method="POST" action="{{ route('tipo_vehiculos.store') }}">
                            @csrf
                            <div class="card-body">
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
                                                placeholder="Por ejemplo, Sedán" autocomplete="off"
                                                value="{{ old('nombre') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descripción <strong
                                                    style="color:red;">(*)</strong></label>
                                            <textarea class="form-control" name="descripcion"
                                                placeholder="Por ejemplo, Vehículo de 4 puertas"
                                                required>{{ old('descripcion') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Capacidad de Pasajeros <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="number" class="form-control" name="capacidad_pasajero"
                                                placeholder="Por ejemplo, 5" autocomplete="off"
                                                value="{{ old('capacidad_pasajero') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Capacidad de Carga (en kg)<strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="number" class="form-control" name="capacidad_carga"
                                                placeholder="Por ejemplo, 500" autocomplete="off"
                                                value="{{ old('capacidad_carga') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Capacidad de Gasolina (en litros)<strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="number" class="form-control" name="capacidad_gasolina"
                                                placeholder="Por ejemplo, 50" autocomplete="off"
                                                value="{{ old('capacidad_gasolina') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="estado" value="1">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Registrar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('tipo_vehiculos.index') }}"
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
