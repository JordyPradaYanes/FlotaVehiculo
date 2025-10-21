<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x: hidden">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/escudo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Mobi UFPSO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <!-- Charts -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                
                

                <!-- Examples Section -->
                
                <li class="nav-item">
                    <a href="{{route('conductores.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Conductores</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contratos.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-paste"></i>
                        <p>Contratos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('empresas.index')}}" class="nav-link">
                        <i class="nav-icon 	fas fa-building"></i>
                        <p>Empresas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('licencias.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>Licencias</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('marcas.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-delicious"></i>
                        <p>Marcas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('recarga_combustibles.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-gas-pump"></i>
                        <p>Recarga Combustible</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('rutas.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>Rutas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tipo_vehiculos.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Tipo Vehiculos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('vehiculos.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>Vehiculos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('viajes.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-passport"></i>
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