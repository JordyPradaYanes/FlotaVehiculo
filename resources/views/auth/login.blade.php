@extends('layouts.applogin')

@section('title', 'Login')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/dist/css/login.css') }}">
@endpush

@section('content')

    <body class="login-page">
        <div class="login-container animate-fadeIn">
            <div class="login-left">
                <div class="icon-truck">
                    <i class="fas fa-truck"></i>
                </div>
                <h2>FlotaVehiculo</h2>
                <p class="subtitle">Sistema de Gestión de Flota Premium</p>
            </div>

            <div class="login-right" style="scroll">
                <div class="welcome-text">
                    <h4>¡Bienvenido!</h4>
                    <p>Ingresa tus credenciales para continuar</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Contraseña" required>
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="remember-me d-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label ms-2" for="remember">
                                Recordar mis datos
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-login btn-block w-100">
                        <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                    </button>
                </form>

                <div class="social-login">
                    <div class="divider">
                        <span>O continúa con</span>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-facebook btn-social btn-block text-white w-100">
                                <i class="fab fa-facebook-f mr-1"></i>Facebook
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-google btn-social btn-block text-white w-100">
                                <i class="fab fa-google mr-1"></i>Google
                            </a>
                        </div>
                    </div>
                </div>

                <div class="login-footer">
                    @if (Route::has('password.request'))
                        <p>
                            <a href="{{ route('password.request') }}">
                                <i class="fas fa-key"></i>¿Olvidaste tu contraseña?
                            </a>
                        </p>
                    @endif

                    @if (Route::has('register'))
                        <p>
                            <a href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i>Crear nueva cuenta
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </body>
@endsection
