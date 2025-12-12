<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-luxury elevation-3">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link nav-link-luxury-topbar" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Barra de búsqueda rápida mejorada -->
        <li class="nav-item d-none d-md-block">
            <form class="form-inline" action="#" method="GET">
                <div class="input-group input-group-sm search-luxury">
                    <input class="form-control form-control-navbar search-input-topbar" type="search" name="search"
                        placeholder="Buscar vehículos, conductores..." aria-label="Buscar">
                    <div class="input-group-append">
                        <button class="btn btn-navbar search-btn-luxury" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </li>

        <!-- Notificaciones dinámicas -->
        <li class="nav-item dropdown">
            <a class="nav-link nav-link-luxury-topbar" data-toggle="dropdown" href="#" title="Notificaciones">
                <i class="far fa-bell" style="font-size: 1.2rem;"></i>
                @php
                    $notificaciones = $licenciasPorVencer ?? collect();
                    $totalNotificaciones = $notificaciones->count();
                @endphp
                @if ($totalNotificaciones > 0)
                    <span class="badge badge-luxury-gold navbar-badge-luxury">{{ $totalNotificaciones }}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-luxury">
                <span class="dropdown-header-luxury">
                    <i class="fas fa-bell mr-1"></i> {{ $totalNotificaciones }} Notificaciones
                </span>
                <div class="dropdown-divider"></div>

                @forelse($notificaciones as $licencia)
                    <a href="{{ route('licencias.index') }}" class="dropdown-item notification-item-luxury">
                        <i class="fas fa-exclamation-circle text-warning mr-2"></i>
                        Licencia <strong>{{ $licencia->numero_licencia }}</strong> vence pronto
                        <span class="float-right text-muted text-sm">
                            {{ \Carbon\Carbon::parse($licencia->fecha_vencimiento)->diffForHumans() }}
                        </span>
                    </a>
                    <div class="dropdown-divider"></div>
                @empty
                    <div class="dropdown-item text-center text-muted py-3">
                        <i class="fas fa-check-circle text-success mr-2"></i>
                        No hay notificaciones pendientes
                    </div>
                @endforelse

                <a href="{{ route('licencias.index') }}" class="dropdown-footer-luxury">
                    Ver todas las licencias
                </a>
            </div>
        </li>

        <!-- Dropdown de perfil de usuario mejorado -->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center nav-link-luxury-topbar"
                data-toggle="dropdown">
                <img src="{{ asset('backend/dist/img/yo.jpg') }}" class="user-image-luxury img-circle elevation-2"
                    alt="Usuario">
                <span class="d-none d-md-inline ml-2 user-name-luxury">{{ Auth::user()->name ?? 'Usuario' }}</span>
                <i class="fas fa-chevron-down ml-2" style="font-size: 0.8rem;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-luxury">
                <!-- User header -->
                <li class="user-header-luxury">
                    <img src="{{ asset('backend/dist/img/yo.jpg') }}" class="img-circle elevation-3" alt="Usuario">
                    <p class="mb-1">
                        {{ Auth::user()->name ?? 'Usuario Invitado' }}
                    </p>
                    <small class="text-muted">{{ Auth::user()->email ?? 'usuario@ejemplo.com' }}</small>
                    @auth
                        <small class="d-block mt-1" style="opacity: 0.9;">
                            <i class="fas fa-calendar-alt mr-1"></i>
                            Miembro desde {{ Auth::user()->created_at?->format('M Y') }}
                        </small>
                    @endauth
                </li>

                <!-- Menu Body -->
                <li class="user-body-luxury">
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-luxury-outline btn-sm btn-block mb-2">
                                <i class="fas fa-user mr-2"></i>Mi Perfil
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="#" class="btn btn-luxury-outline btn-sm btn-block">
                                <i class="fas fa-cog mr-2"></i>Configuración
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Menu Footer -->
                <li class="user-footer-luxury">
                    <a href="{{ route('logout') }}" class="btn btn-luxury-danger btn-sm btn-block"
                        onclick="event.preventDefault(); if(confirm('¿Estás seguro de cerrar sesión?')) { document.getElementById('logout-form').submit(); }">
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
