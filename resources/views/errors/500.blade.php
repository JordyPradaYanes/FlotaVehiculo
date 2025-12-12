@extends('layouts.applogin')

@section('title', '500 - Error del Servidor')

@push('styles')
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-container {
            text-align: center;
            padding: 2rem;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 900;
            color: #dc3545;
            line-height: 1;
            margin-bottom: 1rem;
        }

        .error-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1.1rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-home {
            background: var(--primary-blue);
            border: none;
            border-radius: 10px;
            padding: 0.85rem 2rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            margin: 0.5rem;
        }

        .btn-home:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 6rem;
            }

            .error-title {
                font-size: 1.5rem;
            }

            .error-message {
                font-size: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="error-container">
        <div class="error-code">500</div>
        <h1 class="error-title">Error del Servidor</h1>
        <p class="error-message">
            Oops! Algo salió mal en nuestro servidor. Estamos trabajando para resolver el problema.
        </p>
        <div>
            <a href="{{ route('home') }}" class="btn-home">
                <i class="fas fa-home mr-2"></i>Volver al Inicio
            </a>
            <a href="javascript:window.location.reload()" class="btn-home">
                <i class="fas fa-redo mr-2"></i>Reintentar
            </a>
        </div>
    </div>
@endsection
