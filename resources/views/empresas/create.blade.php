@extends('layouts.app')

@section('title','Crear Empresa')

@section('content')

<div class="content-wrapper pb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0"><i class="fas fa-building mr-2"></i>Nueva Empresa</h1>
                <a href="{{ route('empresas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Volver
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 empresa-card">
                        <div class="card-header bg-gradient-primary text-white">
                            <h3 class="card-title mb-0">
                                <i class="fas fa-plus-circle mr-2"></i>Registrar Nueva Empresa
                            </h3>
                        </div>
                        <form action="{{ route('empresas.store') }}" method="POST" id="empresaForm">
                            @csrf
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombre_empresa" class="font-weight-bold">
                                                <i class="fas fa-building text-primary mr-1"></i>
                                                Nombre de la Empresa
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('nombre_empresa') is-invalid @enderror" 
                                                   id="nombre_empresa" 
                                                   name="nombre_empresa" 
                                                   value="{{ old('nombre_empresa') }}"
                                                   placeholder="Ingrese el nombre de la empresa"
                                                   required>
                                            @error('nombre_empresa')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="direccion" class="font-weight-bold">
                                                <i class="fas fa-map-marker-alt text-danger mr-1"></i>
                                                Dirección
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control @error('direccion') is-invalid @enderror" 
                                                      id="direccion" 
                                                      name="direccion" 
                                                      rows="3"
                                                      placeholder="Ingrese la dirección completa"
                                                      required>{{ old('direccion') }}</textarea>
                                            @error('direccion')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono" class="font-weight-bold">
                                                <i class="fas fa-phone text-success mr-1"></i>
                                                Teléfono
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="tel" 
                                                   class="form-control @error('telefono') is-invalid @enderror" 
                                                   id="telefono" 
                                                   name="telefono" 
                                                   value="{{ old('telefono') }}"
                                                   placeholder="Ej: +591 12345678"
                                                   required>
                                            @error('telefono')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="font-weight-bold">
                                                <i class="fas fa-envelope text-info mr-1"></i>
                                                Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" 
                                                   class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" 
                                                   name="email" 
                                                   value="{{ old('email') }}"
                                                   placeholder="ejemplo@empresa.com"
                                                   required>
                                            @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="estado" class="font-weight-bold">
                                                <i class="fas fa-toggle-on text-warning mr-1"></i>
                                                Estado
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control @error('estado') is-invalid @enderror" 
                                                    id="estado" 
                                                    name="estado"
                                                    required>
                                                <option value="">Seleccione un estado</option>
                                                <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                                <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                            </select>
                                            @error('estado')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info mt-3">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <strong>Nota:</strong> Todos los campos marcados con <span class="text-danger">*</span> son obligatorios.
                                </div>
                            </div>

                            <div class="card-footer bg-light">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times mr-1"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Guardar Empresa
                                    </button>
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

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/dist/css/empresas.css') }}">
@endpush

@push('scripts')
<script>
    // Validación adicional del formulario
    document.getElementById('empresaForm').addEventListener('submit', function(e) {
        const telefono = document.getElementById('telefono').value;
        const email = document.getElementById('email').value;
        
        // Validar formato de teléfono (números, espacios, guiones y +)
        const telefonoRegex = /^[\d\s\-\+$$$$]+$/;
        if (!telefonoRegex.test(telefono)) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Error en el teléfono',
                text: 'El teléfono solo puede contener números, espacios, guiones y el símbolo +',
                confirmButtonColor: '#3085d6'
            });
            return false;
        }
        
        // Validar formato de email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Error en el email',
                text: 'Por favor ingrese un email válido',
                confirmButtonColor: '#3085d6'
            });
            return false;
        }
    });
</script>
@endpush
