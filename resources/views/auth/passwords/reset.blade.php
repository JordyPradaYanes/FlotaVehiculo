@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <!-- Header -->
                <div class="card-header bg-primary text-white text-center py-4">
                    <div class="mb-3">
                        <i class="fas fa-lock fa-3x"></i>
                    </div>
                    <h4 class="mb-0 fw-light">{{ __('Reset Password') }}</h4>
                    <small class="opacity-75">Establece tu nueva contraseña</small>
                </div>

                <!-- Body -->
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- Campo Email -->
                        <div class="form-floating mb-3">
                            <input id="email" 
                                   type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ $email ?? old('email') }}" 
                                   required 
                                   autocomplete="email" 
                                   autofocus
                                   placeholder="{{ __('Email Address') }}">
                            <label for="email">
                                <i class="fas fa-envelope me-2"></i>{{ __('Email Address') }}
                            </label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo Password -->
                        <div class="form-floating mb-3">
                            <input id="password" 
                                   type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" 
                                   required 
                                   autocomplete="new-password"
                                   placeholder="{{ __('Password') }}">
                            <label for="password">
                                <i class="fas fa-lock me-2"></i>{{ __('Password') }}
                            </label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo Confirm Password -->
                        <div class="form-floating mb-4">
                            <input id="password-confirm" 
                                   type="password" 
                                   class="form-control" 
                                   name="password_confirmation" 
                                   required 
                                   autocomplete="new-password"
                                   placeholder="{{ __('Confirm Password') }}">
                            <label for="password-confirm">
                                <i class="fas fa-lock me-2"></i>{{ __('Confirm Password') }}
                            </label>
                        </div>

                        <!-- Botón Submit -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>

                    <!-- Enlaces -->
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <i class="fas fa-arrow-left me-1"></i>Volver al login
                        </a>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer bg-light text-center text-muted py-3">
                    <small>&copy; {{ date('Y') }} AudySoft. Todos los derechos reservados.</small>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
body.login-page {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.card {
    border-radius: 15px;
    overflow: hidden;
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.95);
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
}

.form-floating > label {
    color: #6c757d;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.btn-primary {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
}
</style>
@endpush
@endsection