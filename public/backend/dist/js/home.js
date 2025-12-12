/**
 * ============================================
 * HOME/DASHBOARD PAGE CHARTS
 * ============================================
 */

// Gráfico de Viajes por Mes
const viajesCtx = document.getElementById("viajesChart");
if (viajesCtx) {
    new Chart(viajesCtx, {
        type: "line",
        data: {
            labels: window.viajesMeses || [
                "Ene",
                "Feb",
                "Mar",
                "Abr",
                "May",
                "Jun",
            ],
            datasets: [
                {
                    label: "Viajes",
                    data: window.viajesData || [12, 19, 15, 25, 22, 30],
                    borderColor: "rgb(75, 192, 192)",
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    tension: 0.4,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: "top",
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}

// Gráfico de Vehículos por Tipo
const vehiculosCtx = document.getElementById("vehiculosChart");
if (vehiculosCtx) {
    new Chart(vehiculosCtx, {
        type: "doughnut",
        data: {
            labels: window.tiposVehiculos || [
                "Camión",
                "Camioneta",
                "Automóvil",
            ],
            datasets: [
                {
                    data: window.tiposVehiculosData || [30, 45, 25],
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.8)",
                        "rgba(54, 162, 235, 0.8)",
                        "rgba(255, 206, 86, 0.8)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: "bottom",
                },
            },
        },
    });
}
