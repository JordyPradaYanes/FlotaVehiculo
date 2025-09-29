@extends('layouts.applogin')

@section('content')
{{-- Usa la clase base del login para centrarlo en la página --}}
<body class="login-page">
<div class="login-container">
    {{-- Simulamos el ancho que ocuparía el formulario de login. Usamos un div simple en lugar de row/col --}}
    <div class="login-right" style="flex: 0 0 100%; max-width: 100%;"> 

        <div class="welcome-text">
            {{-- Icono de candado en el encabezado --}}
            <div class="mb-3 text-center">
                <i class="fas fa-lock fa-3x" style="color: #667eea;"></i> 
            </div>
            
            <h4 class="mb-0 fw-light">{{ __('Restablecer contraseña') }}</h4>
            <p class="subtitle">Establece tu nueva contraseña</p>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            
            {{-- Mensaje de éxito si existe (Laravel por defecto) --}}
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-group">
                <i class="fas fa-envelope input-icon"></i>
                <input id="email" 
                       type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" 
                       value="{{ $email ?? old('email') }}" 
                       required 
                       autocomplete="email" 
                       autofocus
                       placeholder="{{ __('Correo electrónico') }}">
                @error('email')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <i class="fas fa-lock input-icon"></i>
                <input id="password" 
                       type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       name="password" 
                       required 
                       autocomplete="new-password"
                       placeholder="{{ __('Contraseña') }}">
                @error('password')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <i class="fas fa-lock input-icon"></i>
                <input id="password-confirm" 
                       type="password" 
                       class="form-control" 
                       name="password_confirmation" 
                       required 
                       autocomplete="new-password"
                       placeholder="{{ __('Confirmar contraseña') }}">
            </div>

            <div class="d-grid mt-4 mb-3">
                <button type="submit" class="btn btn-primary btn-login btn-block">
                    <i class="fas fa-save me-2"></i>
                    {{ __('Restablecer Contraseña') }}
                </button>
            </div>
        </form>

        <div class="login-footer" style="border-top: none; padding-top: 0;">
            <p>
                <a href="{{ route('login') }}">
                    <i class="fas fa-arrow-left me-1"></i>Volver al login
                </a>
            </p>
            <p class="text-muted mt-2">&copy; {{ date('Y') }} AudySoft. Todos los derechos reservados.</p>
        </div>
    </div>
</div>
</body>
@push('styles')
<style>
    /* --------------------------------------------------------------------- */
    /* ESTILOS TOMADOS DIRECTAMENTE DE TU LOGIN */
    /* --------------------------------------------------------------------- */
    .login-page {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .login-container {
        /* Para el Reset, lo hacemos más pequeño (500px) y no dividido (ancho total). */
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        /* Reducimos el ancho máximo para el formulario de reset */
        max-width: 500px; 
        width: 100%;
        display: block; /* Cambiado de flex a block para centrado simple */
        min-height: 450px;
        max-height: 80vh;
        margin: 0 auto; /* Centrar el contenedor pequeño */
    }

    /* Ocultamos el 'login-left' si existe en la plantilla base */
    .login-left {
        display: none !important;
    }

    .login-right {
        /* Se adapta al 100% del ancho del login-container */
        flex: 0 0 100%; 
        padding: 2.5rem; /* Aumentamos el padding para más espacio */
        display: block;
    }
    
    .welcome-text {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .welcome-text h4 {
        color: #333;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }
    
    .welcome-text p {
        color: #6c757d;
        margin: 0;
        font-size: 0.9rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    /* ... (El resto de estilos de form-control, input-icon, btn-login, etc. se mantienen igual) ... */
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.6rem 0.8rem 0.6rem 2.5rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        height: auto;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.15rem rgba(102, 126, 234, 0.25);
    }
    
    .input-icon {
        position: absolute;
        left: 0.8rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        z-index: 3;
        font-size: 0.9rem;
    }

    .btn-login {
        background: linear-gradient(45deg, #667eea, #764ba2);
        border: none;
        border-radius: 8px;
        padding: 0.7rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }
    
    .btn-login:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .login-footer a {
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    .login-footer a:hover {
        color: #764ba2;
        text-decoration: none;
    }

    .invalid-feedback {
        display: block;
        font-size: 0.75rem;
        margin-top: 0.2rem;
        color: #dc3545;
    }


    /* --------------------------------------------------------------------- */
    /* MEDIA QUERIES (Ajuste para móviles) */
    /* --------------------------------------------------------------------- */

    @media (max-width: 768px) {
        .login-container {
            max-width: 90%; 
            min-height: auto;
            max-height: 90vh;
            padding: 0;
        }
        
        .login-right {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }
    }
</style>
@endpush
@endsection