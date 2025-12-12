<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sistema de Flota Municipal') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700" rel="stylesheet">

    {{-- Cargar Bootstrap y scripts compilados con Vite --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Welcome page styles --}}
    <link rel="stylesheet" href="{{ asset('backend/dist/css/welcome.css') }}">

</head>

<body>
    <!-- Fondo con imagen animada -->
    <div class="background-image"></div>
    <div class="overlay"></div>

    <div class="hero-section">
        <div class="main-container">
            <!-- Sección Izquierda -->
            <div class="left-section">
                <div class="logo-container">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M17 5H3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zM3 17V7h14v10H3z" />
                        <path d="M6 10h2v2H6zm4 0h2v2h-2zm4 0h2v2h-2z" />
                        <circle cx="5" cy="18.5" r="1.5" />
                        <circle cx="15" cy="18.5" r="1.5" />
                    </svg>
                </div>

                <span class="location-badge">
                    📍 Ocaña, Norte de Santander
                </span>

                <h1 class="main-title">
                    Sistema de Gestión<br>Flota Municipal
                </h1>

                <p class="subtitle">
                    Plataforma integral para la administración y control de la flota de busetas del municipio. Control
                    en tiempo real, gestión de rutas y análisis completo.
                </p>
            </div>

            <!-- Sección Derecha -->
            <div class="right-section">
                <div class="auth-buttons">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-primary-custom">
                            Iniciar Sesión
                        </a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-custom">
                            Crear Cuenta
                        </a>
                    @endif
                </div>

                <div class="features-grid">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </div>
                        <h6>Control de Rutas</h6>
                        <p>Gestión completa de rutas y horarios</p>
                    </div>

                    <div class="feature-box">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                        </div>
                        <h6>Personal</h6>
                        <p>Administración de conductores y empleados</p>
                    </div>

                    <div class="feature-box">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" />
                            </svg>
                        </div>
                        <h6>Reportes</h6>
                        <p>Estadísticas y análisis en tiempo real</p>
                    </div>
                </div>

                <p class="footer-text">
                    © 2024 Alcaldía Municipal de Ocaña
                </p>
            </div>
        </div>
    </div>
</body>

</html>
