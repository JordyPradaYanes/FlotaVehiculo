@extends('layouts.applogin')

@section('title', 'Register')

@push('styles')
<style>
  .register-page {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }
  
  .register-container {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    max-width: 1000px;
    width: 100%;
    display: flex;
    min-height: 550px;
    max-height: 85vh;
  }
  
  .register-left {
    background: linear-gradient(45deg, #667eea, #764ba2);
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
    flex: 1;
    text-align: center;
    position: relative;
  }
  
  .register-left::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
  }
  
  .register-left > * {
    position: relative;
    z-index: 2;
  }
  
  .register-left h2 {
    margin-bottom: 1rem;
    font-weight: 300;
    font-size: 2.5rem;
  }
  
  .register-left .subtitle {
    opacity: 0.9;
    font-size: 1.1rem;
    margin-bottom: 2rem;
  }
  
  .register-left .icon-truck {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.8;
  }
  
  .register-right {
    flex: 1.2;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    overflow-y: auto;
  }
  
  .welcome-text {
    text-align: center;
    margin-bottom: 1.5rem;
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
    margin-bottom: 0.8rem;
    position: relative;
  }
  
  .form-control {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 0.5rem 0.7rem 0.5rem 2.3rem;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    height: auto;
  }
  
  .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.15rem rgba(102, 126, 234, 0.25);
  }
  
  .input-icon {
    position: absolute;
    left: 0.7rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
    z-index: 3;
    font-size: 0.85rem;
  }
  
  .form-row .form-group {
    margin-bottom: 0.8rem;
  }
  
  .btn-register {
    background: linear-gradient(45deg, #667eea, #764ba2);
    border: none;
    border-radius: 8px;
    padding: 0.6rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    font-size: 0.85rem;
  }
  
  .btn-register:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
  }
  
  .terms-checkbox {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1rem;
    font-size: 0.8rem;
  }
  
  .custom-checkbox {
    position: relative;
    display: inline-block;
    margin-right: 0.5rem;
    margin-top: 0.1rem;
    flex-shrink: 0;
  }
  
  .custom-checkbox input {
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 16px;
    width: 16px;
    background-color: #eee;
    border-radius: 3px;
    transition: all 0.3s ease;
  }
  
  .custom-checkbox input:checked ~ .checkmark {
    background: linear-gradient(45deg, #667eea, #764ba2);
  }
  
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }
  
  .custom-checkbox input:checked ~ .checkmark:after {
    display: block;
  }
  
  .custom-checkbox .checkmark:after {
    left: 5px;
    top: 1px;
    width: 4px;
    height: 8px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
  }
  
  .terms-text a {
    color: #667eea;
    text-decoration: none;
  }
  
  .terms-text a:hover {
    color: #764ba2;
    text-decoration: underline;
  }
  
  .social-register {
    margin: 1rem 0;
  }
  
  .divider {
    position: relative;
    text-align: center;
    margin: 1rem 0;
  }
  
  .divider:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #dee2e6;
  }
  
  .divider span {
    background: white;
    padding: 0 0.8rem;
    color: #6c757d;
    font-size: 0.75rem;
  }
  
  .btn-social {
    border-radius: 8px;
    margin-bottom: 0.3rem;
    padding: 0.4rem;
    font-weight: 500;
    transition: all 0.3s ease;
    font-size: 0.8rem;
  }
  
  .btn-social:hover {
    transform: translateY(-1px);
  }
  
  .btn-facebook {
    background-color: #3b5998;
    border-color: #3b5998;
  }
  
  .btn-google {
    background-color: #dd4b39;
    border-color: #dd4b39;
  }
  
  .register-footer {
    text-align: center;
    padding-top: 0.8rem;
    border-top: 1px solid #dee2e6;
    font-size: 0.85rem;
  }
  
  .register-footer a {
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
  }
  
  .register-footer a:hover {
    color: #764ba2;
    text-decoration: none;
  }
  
  .invalid-feedback {
    display: block;
    font-size: 0.7rem;
    margin-top: 0.15rem;
    color: #dc3545;
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    .register-container {
      flex-direction: column;
      max-width: 450px;
      min-height: auto;
      max-height: 95vh;
    }
    
    .register-left {
      flex: none;
      padding: 1.2rem;
    }
    
    .register-left h2 {
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
    }
    
    .register-left .subtitle {
      font-size: 0.9rem;
      margin-bottom: 0.8rem;
    }
    
    .register-left .icon-truck {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }
    
    .register-right {
      padding: 1.2rem;
      flex: 1;
    }
    
    .welcome-text {
      margin-bottom: 1rem;
    }
    
    .social-register {
      margin: 0.8rem 0;
    }
    
    .form-row {
      margin: 0;
    }
    
    .form-row > [class*="col-"] {
      padding-left: 0;
      padding-right: 0;
    }
    
    .form-row > [class*="col-"]:not(:last-child) {
      margin-bottom: 0.8rem;
    }
  }
  
  @media (max-width: 480px) {
    .register-page {
      padding: 10px;
    }
    
    .register-container {
      border-radius: 15px;
      max-height: 98vh;
    }
    
    .register-left,
    .register-right {
      padding: 1rem;
    }
    
    .form-group {
      margin-bottom: 0.6rem;
    }
  }
  
  @media (max-height: 650px) {
    .register-left .icon-truck {
      font-size: 3rem;
      width: 70px;
      height: 70px;
      padding: 1rem;
      margin-bottom: 0.8rem;
    }
    
    .register-left h2 {
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
    }
    
    .register-left .subtitle {
      margin-bottom: 0;
    }
    
    .welcome-text {
      margin-bottom: 1rem;
    }
    
    .form-group {
      margin-bottom: 0.6rem;
    }
    
    .social-register {
      margin: 0.6rem 0;
    }
  }
</style>
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
        <input type="text" 
               name="name" 
               class="form-control @error('name') is-invalid @enderror" 
               placeholder="Nombre completo" 
               value="{{ old('name') }}" 
               required 
               autofocus>
        @error('name')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
        @enderror
      </div>

      <div class="form-group">
        <i class="fas fa-envelope input-icon"></i>
        <input type="email" 
               name="email" 
               class="form-control @error('email') is-invalid @enderror" 
               placeholder="Correo electrónico" 
               value="{{ old('email') }}" 
               required>
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
            <input type="password" 
                   name="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Contraseña" 
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
            <input type="password" 
                   name="password_confirmation" 
                   class="form-control" 
                   placeholder="Confirmar contraseña" 
                   required>
          </div>
        </div>
      </div>

      <div class="terms-checkbox d-flex align-items-start">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="terms" id="terms" value="agree" required>
          <label class="form-check-label text-muted ms-2" for="terms">
            Acepto los <a href="#">términos y condiciones</a> y la <a href="#">política de privacidad</a>
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