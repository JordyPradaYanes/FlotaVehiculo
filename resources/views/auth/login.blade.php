@extends('layouts.applogin')

@section('title', 'Login')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/dist/css/login.css') }}">
@endpush

@section('content')

    <div class="login-page">
        <div class="login-container animate-fadeIn">
            <div class="login-left">
                <div class="icon-truck">
                    <i class="fas fa-truck"></i>
                </div>
                <h2>FlotaVehiculo</h2>
                <p class="subtitle">Sistema de Gestión de Flota Premium</p>
            </div>

            <div class="login-right">
                <div class="welcome-text">
                    <h4>¡Bienvenido!</h4>
                    <p>Ingresa tus credenciales para continuar</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-4">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Contraseña" required>
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="remember-me d-flex align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label ms-2" for="remember">
                                Recordar mis datos
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-login btn-block w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                    </button>
                </form>

                <div class="social-login">
                    <div class="divider">
                        <span>O continúa con</span>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <a href="#" class="btn btn-facebook btn-social w-100 text-dark">
                                <i class="fab fa-facebook-f me-2"></i>Facebook
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-google btn-social w-100 text-dark">
                                <i class="fab fa-google me-2"></i>Google
                            </a>
                        </div>
                    </div>
                </div>

                <div class="login-footer d-flex justify-content-between">
                    @if (Route::has('password.request'))
                        <p class="mb-0">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">
                                <i class="fas fa-key me-1"></i>¿Contraseña?
                            </a>
                        </p>
                    @endif

                    @if (Route::has('register'))
                        <p class="mb-0">
                            <a href="{{ route('register') }}" class="text-decoration-none">
                                <i class="fas fa-user-plus me-1"></i>Crear cuenta
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
