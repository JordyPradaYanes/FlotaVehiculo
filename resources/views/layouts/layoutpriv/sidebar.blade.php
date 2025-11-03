<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="overflow-x: hidden;">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center" style="border-bottom: 1px solid rgba(255,255,255,0.1); padding: 1.2rem 0.5rem;">
        <img src="{{ asset('backend/dist/img/escudo.png')}}" alt="Logo" class="brand-image elevation-3" style="opacity: 1; width: 50px; height: 50px; max-height: 50px; border-radius: 50%; border: 3px solid #fff; box-shadow: 0 0 20px rgba(102, 126, 234, 0.5);">
        <span class="brand-text" style="display: block; margin-top: 8px; font-weight: 700; font-size: 1.1rem; color: #fff;">Mobi UFPSO</span>
        <small style="display: block; color: rgba(255,255,255,0.6); font-size: 0.75rem; margin-top: 2px;">Sistema de Flota</small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="padding-top: 1rem;">
        <!-- SidebarSearch Form -->
        <div class="form-inline" style="margin-bottom: 1.5rem; padding: 0 1rem;">
            <div class="input-group sidebar-search-modern" data-widget="sidebar-search">
                <input class="form-control" type="search" placeholder="Buscar..." aria-label="Search" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff; border-radius: 25px; padding: 0.5rem 1rem; font-size: 0.9rem;">
                <div class="input-group-append" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); z-index: 10;">
                    <button class="btn" style="background: transparent; border: none; color: rgba(255,255,255,0.6); padding: 0;">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <!-- Charts Section -->
                <li class="nav-item menu-section {{ Request::is('charts*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link nav-link-modern {{ Request::is('charts*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Gráficos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-link-sub {{ Request::is('charts/chartjs') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-link-sub {{ Request::is('charts/flot') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Divider -->
                <li class="nav-header" style="color: rgba(255,255,255,0.5); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; padding: 1rem 1rem 0.5rem; margin-top: 0.5rem;">
                    Gestión Principal
                </li>
                
                <!-- Conductores -->
                <li class="nav-item">
                    <a href="{{route('conductores.index')}}" class="nav-link nav-link-modern {{ Request::is('conductores*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Conductores</p>
                    </a>
                </li>

                <!-- Contratos -->
                <li class="nav-item">
                    <a href="{{route('contratos.index')}}" class="nav-link nav-link-modern {{ Request::is('contratos*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-contract"></i>
                        <p>Contratos</p>
                    </a>
                </li>

                <!-- Empresas -->
                <li class="nav-item">
                    <a href="{{route('empresas.index')}}" class="nav-link nav-link-modern {{ Request::is('empresas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Empresas</p>
                    </a>
                </li>

                <!-- Licencias -->
                <li class="nav-item">
                    <a href="{{route('licencias.index')}}" class="nav-link nav-link-modern {{ Request::is('licencias*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Licencias</p>
                    </a>
                </li>

                <!-- Divider -->
                <li class="nav-header" style="color: rgba(255,255,255,0.5); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; padding: 1rem 1rem 0.5rem; margin-top: 0.5rem;">
                    Vehículos
                </li>

                <!-- Marcas -->
                <li class="nav-item">
                    <a href="{{route('marcas.index')}}" class="nav-link nav-link-modern {{ Request::is('marcas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Marcas</p>
                    </a>
                </li>

                <!-- Tipo Vehículos -->
                <li class="nav-item">
                    <a href="{{route('tipo_vehiculos.index')}}" class="nav-link nav-link-modern {{ Request::is('tipo_vehiculos*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Tipo Vehículos</p>
                    </a>
                </li>

                <!-- Vehículos -->
                <li class="nav-item">
                    <a href="{{route('vehiculos.index')}}" class="nav-link nav-link-modern {{ Request::is('vehiculos*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bus"></i>
                        <p>Vehículos</p>
                    </a>
                </li>

                <!-- Divider -->
                <li class="nav-header" style="color: rgba(255,255,255,0.5); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; padding: 1rem 1rem 0.5rem; margin-top: 0.5rem;">
                    Operaciones
                </li>

                <!-- Recarga Combustible -->
                <li class="nav-item">
                    <a href="{{route('recarga_combustibles.index')}}" class="nav-link nav-link-modern {{ Request::is('recarga_combustibles*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-gas-pump"></i>
                        <p>Combustible</p>
                    </a>
                </li>

                <!-- Rutas -->
                <li class="nav-item">
                    <a href="{{route('rutas.index')}}" class="nav-link nav-link-modern {{ Request::is('rutas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-route"></i>
                        <p>Rutas</p>
                    </a>
                </li>

                <!-- Viajes -->
                <li class="nav-item">
                    <a href="{{route('viajes.index')}}" class="nav-link nav-link-modern {{ Request::is('viajes*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>Viajes</p>
                    </a>
                </li>

                <!-- Spacer -->
                <li style="height: 2rem;"></li>
            </ul>
        </nav>
    </div>
</aside>

<!-- Custom Sidebar Styles -->
<style>
    /* Sidebar Background */
    .main-sidebar {
        background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%) !important;
        box-shadow: 2px 0 20px rgba(0,0,0,0.1) !important;
    }

    /* Brand Link Hover */
    .brand-link:hover {
        background: rgba(255,255,255,0.05) !important;
        transition: all 0.3s ease;
    }

    /* Modern Nav Links */
    .nav-link-modern {
        border-radius: 10px !important;
        margin: 0.25rem 0.75rem !important;
        padding: 0.75rem 1rem !important;
        transition: all 0.3s ease !important;
        color: rgba(255,255,255,0.8) !important;
        position: relative;
        overflow: hidden;
    }

    .nav-link-modern::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .nav-link-modern:hover {
        background: rgba(102, 126, 234, 0.15) !important;
        color: #fff !important;
        transform: translateX(5px);
    }

    .nav-link-modern:hover::before {
        transform: scaleY(1);
    }

    .nav-link-modern.active {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.3) 0%, rgba(118, 75, 162, 0.3) 100%) !important;
        color: #fff !important;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
    }

    .nav-link-modern.active::before {
        transform: scaleY(1);
    }

    /* Icons */
    .nav-link-modern i.nav-icon {
        font-size: 1rem;
        width: 30px;
        text-align: center;
        margin-right: 0.5rem;
    }

    /* Sub Menu Links */
    .nav-link-sub {
        padding-left: 3rem !important;
        color: rgba(255,255,255,0.7) !important;
        font-size: 0.9rem;
        border-radius: 8px !important;
        margin: 0.2rem 0.75rem !important;
        transition: all 0.2s ease !important;
    }

    .nav-link-sub:hover {
        background: rgba(255,255,255,0.1) !important;
        color: #fff !important;
        padding-left: 3.3rem !important;
    }

    .nav-link-sub i {
        font-size: 0.5rem;
        margin-right: 0.75rem;
    }

    /* TreeView Arrow */
    .nav-link-modern .right {
        transition: transform 0.3s ease;
    }

    .nav-item.menu-open > .nav-link-modern .right {
        transform: rotate(-90deg);
    }

    /* Search Input */
    .sidebar-search-modern input::placeholder {
        color: rgba(255,255,255,0.5);
    }

    .sidebar-search-modern input:focus {
        background: rgba(255,255,255,0.15) !important;
        border-color: rgba(102, 126, 234, 0.5) !important;
        box-shadow: 0 0 15px rgba(102, 126, 234, 0.3);
        outline: none;
    }

    /* Nav Headers */
    .nav-header {
        border-bottom: 1px solid rgba(255,255,255,0.1);
        padding-bottom: 0.5rem !important;
    }

    /* Scrollbar */
    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: rgba(255,255,255,0.05);
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(102, 126, 234, 0.5);
        border-radius: 10px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(102, 126, 234, 0.7);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .brand-text {
            font-size: 0.95rem !important;
        }
        
        .nav-link-modern {
            font-size: 0.9rem;
            padding: 0.6rem 0.8rem !important;
        }
    }
</style>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>