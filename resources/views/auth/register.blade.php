@extends('layouts.applogin')

@section('title', 'Register')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/dist/css/register.css') }}">
@endpush

@section('content')

    <body class="register-page">
        <div class="register-container">
            <div class="register-left">
                <div class="icon-truck">
                    <i class="fas fa-truck"></i>
                </div>
                <h2>Flota Vehicular</h2>
                <p class="subtitle">Sistema de Gestión de Flota</p>
            </div>

            <div class="register-right">
                <div class="welcome-text">
                    <h4>¡Únete a nosotros!</h4>
                    <p>Crea tu cuenta para comenzar</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nombre completo" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Correo electrónico" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña"
                                    required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirmar contraseña" required>
                            </div>
                        </div>
                    </div>

                    <div class="terms-checkbox d-flex align-items-start">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terms" id="terms" value="agree"
                                required>
                            <label class="form-check-label text-muted ms-2" for="terms">
                                Acepto los <a href="#">términos y condiciones</a> y la <a href="#">política de
                                    privacidad</a>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-register btn-block">
                        <i class="fas fa-user-plus mr-1"></i>Crear Cuenta
                    </button>
                </form>

                <div class="social-register">
                    <div class="divider">
                        <span>O regístrate con</span>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-facebook btn-social btn-block text-white">
                                <i class="fab fa-facebook-f mr-1"></i>Facebook
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-google btn-social btn-block text-white">
                                <i class="fab fa-google mr-1"></i>Google
                            </a>
                        </div>
                    </div>
                </div>

                <div class="register-footer">
                    <p>
                        <a href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt mr-1"></i>¿Ya tienes una cuenta? Inicia sesión
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </body>
@endsection
