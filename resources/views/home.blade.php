@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        <section class="content">
      <div class="container-fluid">
        <!-- Tarjetas de estadísticas principales con datos relevantes al sistema -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalVehiculos ?? 0 }}</h3>
                <p>Total Vehículos</p>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
              <a href="{{ route('vehiculos.index') }}" class="small-box-footer">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $conductoresActivos ?? 0 }}</h3>
                <p>Conductores Activos</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="{{ route('conductores.index') }}" class="small-box-footer">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $viajesDelMes ?? 0 }}</h3>
                <p>Viajes del Mes</p>
              </div>
              <div class="icon">
                <i class="fas fa-route"></i>
              </div>
              <a href="{{ route('viajes.index') }}" class="small-box-footer">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>${{ number_format($gastoCombustibleMes ?? 0, 2) }}</h3>
                <p>Gasto Combustible Mes</p>
              </div>
              <div class="icon">
                <i class="fas fa-gas-pump"></i>
              </div>
              <a href="{{ route('recarga_combustibles.index') }}" class="small-box-footer">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Segunda fila de estadísticas adicionales -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-building"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Empresas</span>
                <span class="info-box-number">{{ $totalEmpresas ?? 0 }}</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-map-marked-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Rutas Activas</span>
                <span class="info-box-number">{{ $rutasActivas ?? 0 }}</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-id-card"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Licencias Vigentes</span>
                <span class="info-box-number">{{ $licenciasVigentes ?? 0 }}</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-file-contract"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Contratos Activos</span>
                <span class="info-box-number">{{ $contratosActivos ?? 0 }}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección de alertas y notificaciones importantes -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-exclamation-triangle"></i>
                  Alertas Importantes
                </h3>
              </div>
              <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                  @forelse($licenciasPorVencer ?? [] as $licencia)
                  <li class="list-group-item">
                    <i class="fas fa-id-card text-warning"></i>
                    Licencia <strong>{{ $licencia->numero_licencia }}</strong> vence el 
                    {{ \Carbon\Carbon::parse($licencia->fecha_vencimiento)->format('d/m/Y') }}
                  </li>
                  @empty
                  <li class="list-group-item text-center text-muted">
                    <i class="fas fa-check-circle text-success"></i>
                    No hay alertas pendientes
                  </li>
                  @endforelse
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-clock"></i>
                  Actividad Reciente
                </h3>
              </div>
              <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                  @forelse($actividadReciente ?? [] as $actividad)
                  <li class="list-group-item">
                    <i class="fas fa-route text-info"></i>
                    <strong>{{ $actividad->descripcion ?? 'Viaje' }}</strong>
                    <span class="float-right text-muted text-sm">
                      {{ \Carbon\Carbon::parse($actividad->created_at)->diffForHumans() }}
                    </span>
                  </li>
                  @empty
                  <li class="list-group-item text-center text-muted">
                    <i class="fas fa-info-circle"></i>
                    No hay actividad reciente
                  </li>
                  @endforelse
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráficos y estadísticas visuales -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-chart-line"></i>
                  Viajes por Mes
                </h3>
              </div>
              <div class="card-body">
                <canvas id="viajesChart" style="height: 250px;"></canvas>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie"></i>
                  Vehículos por Tipo
                </h3>
              </div>
              <div class="card-body">
                <canvas id="vehiculosChart" style="height: 250px;"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Tabla de vehículos con mayor kilometraje -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-tachometer-alt"></i>
                  Vehículos con Mayor Kilometraje
                </h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Placa</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Kilometraje</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($vehiculosMayorKilometraje ?? [] as $vehiculo)
                    <tr>
                      <td><strong>{{ $vehiculo->placa }}</strong></td>
                      <td>{{ $vehiculo->marca->nombre ?? 'N/A' }}</td>
                      <td>{{ $vehiculo->modelo }}</td>
                      <td>
                        <span class="badge badge-info">
                          {{ number_format($vehiculo->kilometraje) }} km
                        </span>
                      </td>
                      <td>
                        @if($vehiculo->estado == 'activo')
                          <span class="badge badge-success">Activo</span>
                        @else
                          <span class="badge badge-secondary">Inactivo</span>
                        @endif
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center text-muted">No hay datos disponibles</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    </div>
</div>

<!-- Scripts para los gráficos con Chart.js -->
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Gráfico de Viajes por Mes
  const viajesCtx = document.getElementById('viajesChart');
  if (viajesCtx) {
    new Chart(viajesCtx, {
      type: 'line',
      data: {
        labels: {!! json_encode($viajesMeses ?? ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun']) !!},
        datasets: [{
          label: 'Viajes',
          data: {!! json_encode($viajesData ?? [12, 19, 15, 25, 22, 30]) !!},
          borderColor: 'rgb(75, 192, 192)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            position: 'top',
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }

  // Gráfico de Vehículos por Tipo
  const vehiculosCtx = document.getElementById('vehiculosChart');
  if (vehiculosCtx) {
    new Chart(vehiculosCtx, {
      type: 'doughnut',
      data: {
        labels: {!! json_encode($tiposVehiculos ?? ['Camión', 'Camioneta', 'Automóvil']) !!},
        datasets: [{
          data: {!! json_encode($tiposVehiculosData ?? [30, 45, 25]) !!},
          backgroundColor: [
            'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            position: 'bottom',
          }
        }
      }
    });
  }
</script>
@endpush

@endsection
