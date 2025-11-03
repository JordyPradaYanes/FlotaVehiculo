@extends ('layouts.app')

@section('title','Crear Contrato')

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
                        <form method="POST" action="{{ route('contratos.store') }}">
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
                                                <label class="control-label">Fecha de Inicio <strong
                                                        style="color:red;">(*)</strong></label>
                                                <input type="date" class="form-control" name="fecha_inicio"
                                                    value="{{ old('fecha_inicio') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                                <label class="control-label">Fecha de Final <strong
                                                        style="color:red;">(*)</strong></label>
                                                <input type="date" class="form-control" name="fecha_final"
                                                    value="{{ old('fecha_final') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                                <label class="control-label">Salario <strong
                                                        style="color:red;">(*)</strong></label>
                                                <input type="number" step="0.01" class="form-control" name="salario"
                                                    placeholder="Por ejemplo, 1500.00" autocomplete="off"
                                                    value="{{ old('salario') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="estado" value="1">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('contratos.index') }}" class="btn btn-default float-right">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection