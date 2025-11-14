<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="fas fa-home mr-1"></i>Inicio
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">
                <i class="fas fa-envelope mr-1"></i>Contacto
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Agregada barra de búsqueda rápida -->
        <li class="nav-item d-none d-md-block">
            <form class="form-inline">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Buscar..." aria-label="Buscar">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </li>

        <!-- Agregado dropdown de notificaciones -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" title="Notificaciones">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">3 Notificaciones</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-car mr-2"></i> Nuevo vehículo registrado
                    <span class="float-right text-muted text-sm">hace 3 min</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-gas-pump mr-2"></i> Recarga de combustible pendiente
                    <span class="float-right text-muted text-sm">hace 2 horas</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-route mr-2"></i> Viaje completado
                    <span class="float-right text-muted text-sm">hace 1 día</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
            </div>
        </li>

        <!-- Mejorado dropdown de perfil de usuario con mejor estructura -->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('backend/dist/img/yo.jpg') }}" class="user-image img-circle elevation-2" alt="Usuario">
                <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Usuario Invitado' }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ asset('backend/dist/img/yo.jpg') }}" class="img-circle elevation-2" alt="Usuario">
                    <p>
                        {{-- CAMBIO 2: Aplicado Nullsafe --}}
                        {{ Auth::user()?->name ?? 'Usuario Invitado' }}
                        {{-- CAMBIO 3: Aplicado Nullsafe --}}
                        <small>{{ Auth::user()?->email ?? 'usuario@ejemplo.com' }}</small>
                        {{-- CAMBIO 4: Uso de @auth o Nullsafe para created_at --}}
                        @auth
                            <small>Miembro desde {{ Auth::user()->created_at?->format('M. Y') }}</small>
                        @else
                            <small>Miembro desde Ene. 2024</small>
                        @endauth
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-12 text-center mb-2">
                            <a href="#" class="btn btn-default btn-flat">
                                <i class="fas fa-user mr-2"></i>Mi Perfil
                            </a>
                        </div>
                        <div class="col-12 text-center">
                            <a href="#" class="btn btn-default btn-flat">
                                <i class="fas fa-cog mr-2"></i>Configuración
                            </a>
                        </div>
                    </div>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat btn-block"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>

    </ul>
</nav>

<!-- Agregados estilos personalizados para mejorar la apariencia -->
<style>
    /* Mejoras visuales para el navbar */
    .navbar-nav .nav-link {
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .navbar-nav .nav-link:hover {
        background-color: rgba(0,0,0,0.05);
        border-radius: 4px;
    }
    
    /* Estilos para la imagen de usuario en el navbar */
    .user-image {
        width: 30px;
        height: 30px;
        margin-right: 8px;
    }
    
    /* Mejora del dropdown de usuario */
    .user-menu .dropdown-menu {
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border: none;
    }
    
    .user-header {
        padding: 20px;
        text-align: center;
        border-radius: 8px 8px 0 0;
    }
    
    .user-header img {
        width: 90px;
        height: 90px;
        border: 3px solid rgba(255,255,255,0.3);
        margin-bottom: 10px;
    }
    
    .user-header p {
        color: white;
        margin: 0;
        font-size: 16px;
        font-weight: 500;
    }
    
    .user-header small {
        display: block;
        font-size: 12px;
        margin-top: 5px;
        opacity: 0.9;
    }
    
    .user-body {
        padding: 15px;
        background-color: #f8f9fa;
    }
    
    .user-body .btn {
        margin: 5px 0;
        width: 100%;
    }
    
    .user-footer {
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 0 0 8px 8px;
    }
    
    /* Mejora de notificaciones */
    .navbar-badge {
        font-size: 10px;
        font-weight: 700;
        padding: 2px 5px;
        position: absolute;
        right: 5px;
        top: 8px;
    }
    
    /* Animación para el badge de notificaciones */
    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }
    
    .navbar-badge {
        animation: pulse 2s infinite;
    }
    
    /* Mejora del buscador */
    .form-control-navbar {
        border-radius: 20px 0 0 20px;
        border: 1px solid #dee2e6;
    }
    
    .btn-navbar {
        border-radius: 0 20px 20px 0;
        border: 1px solid #dee2e6;
        border-left: none;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .user-image {
            margin-right: 0;
        }
    }
</style>
