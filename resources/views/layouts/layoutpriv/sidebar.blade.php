<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/escudo.png') }}" alt="Logo" class="brand-image">
        <span class="brand-text">Mobi UFPSO</span>
        <small class="brand-subtitle">Sistema de Flota</small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Search Form -->
        <!-- Sidebar Search Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Buscar..."
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Gestión Principal -->
                <li class="nav-header">
                    <i class="fas fa-circle"></i>
                    <span>Gestión Principal</span>
                </li>

                <li class="nav-item">
                    <a href="{{ route('conductores.index') }}"
                        class="nav-link {{ Request::is('conductores*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Conductores</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contratos.index') }}"
                        class="nav-link {{ Request::is('contratos*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-contract"></i>
                        <p>Contratos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('empresas.index') }}"
                        class="nav-link {{ Request::is('empresas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Empresas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('licencias.index') }}"
                        class="nav-link {{ Request::is('licencias*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Licencias</p>
                    </a>
                </li>

                <!-- Vehículos -->
                <li class="nav-header">
                    <i class="fas fa-circle"></i>
                    <span>Vehículos</span>
                </li>

                <li class="nav-item">
                    <a href="{{ route('marcas.index') }}"
                        class="nav-link {{ Request::is('marcas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Marcas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('tipo_vehiculos.index') }}"
                        class="nav-link {{ Request::is('tipo_vehiculos*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Tipo Vehículos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('vehiculos.index') }}"
                        class="nav-link {{ Request::is('vehiculos*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bus"></i>
                        <p>Vehículos</p>
                    </a>
                </li>

                <!-- Operaciones -->
                <li class="nav-header">
                    <i class="fas fa-circle"></i>
                    <span>Operaciones</span>
                </li>

                <li class="nav-item">
                    <a href="{{ route('recarga_combustibles.index') }}"
                        class="nav-link {{ Request::is('recarga_combustibles*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-gas-pump"></i>
                        <p>Combustible</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('rutas.index') }}" class="nav-link {{ Request::is('rutas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-route"></i>
                        <p>Rutas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('viajes.index') }}"
                        class="nav-link {{ Request::is('viajes*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>Viajes</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
