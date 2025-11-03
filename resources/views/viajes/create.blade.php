@extends('layouts.app')

@section('title','Crear Viaje')

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
                        <form method="POST" action="{{ route('viajes.store') }}">
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
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ruta <strong
                                                    style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="ruta_id" required>
                                                <option value="">Seleccione una ruta</option>
                                                @foreach($rutas as $ruta)
                                                    <option value="{{ $ruta->id }}">{{ $ruta->nombre_ruta }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Vehículo <strong
                                                    style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="vehiculo_id" required>
                                                <option value="">Seleccione un vehículo</option>
                                                @foreach($vehiculos as $vehiculo)
                                                    <option value="{{ $vehiculo->id }}">{{ $vehiculo->placa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Conductor <strong
                                                    style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="conductor_id" required>
                                                <option value="">Seleccione un conductor</option>
                                                @foreach($conductores as $conductor)
                                                    <option value="{{ $conductor->id }}">{{ $conductor->nombre }} {{ $conductor->apellido }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descripción <strong
                                                    style="color:red;">(*)</strong></label>
                                            <textarea class="form-control" name="descripcion"
                                                placeholder="Por ejemplo, Viaje de entrega de mercancía"
                                                required>{{ old('descripcion') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Recorrido (en km)<strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="number" class="form-control" name="recorrido"
                                                placeholder="Por ejemplo, 100" autocomplete="off"
                                                value="{{ old('recorrido') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tiempo Estimado (en horas)<strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="number" class="form-control" name="tiempo_estimado"
                                                placeholder="Por ejemplo, 2.5" autocomplete="off"
                                                value="{{ old('tiempo_estimado') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Costo Total <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="number" class="form-control" name="costo_total"
                                                placeholder="Por ejemplo, 100.50" autocomplete="off"
                                                value="{{ old('costo_total') }}" required>
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
                                        <a href="{{ route('viajes.index') }}"
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
