// viajes - Funcionalidad de búsqueda y eliminación
document.addEventListener("DOMContentLoaded", function () {
    console.log("viajes.js cargado correctamente");

    // ===== BÚSQUEDA EN TABLA =====
    initializeSearch();

    // ===== CONFIRMACIÓN DE ELIMINACIÓN =====
    initializeDeleteConfirmation();

    // ===== ANIMACIÓN AL CAMBIAR ESTADO =====
    initializeBadgeAnimations();
});

// Función para inicializar la búsqueda
function initializeSearch() {
    const searchInput = document.getElementById("searchTable");
    const table = document.getElementById("example1");

    if (!searchInput || !table) {
        console.warn("Search input o tabla no encontrados");
        return;
    }

    const tbody = table.querySelector("tbody");
    if (!tbody) {
        console.warn("Tbody no encontrado");
        return;
    }

    const rows = Array.from(tbody.querySelectorAll("tr"));
    console.log(`Búsqueda inicializada. ${rows.length} filas encontradas`);

    searchInput.addEventListener("keyup", function (e) {
        const searchTerm = this.value.toLowerCase().trim();

        rows.forEach(function (row) {
            try {
                const cells = row.querySelectorAll("td");
                if (cells.length < 4) return;

                const vehiculo_id = cells[0].textContent.toLowerCase();
                const conductor_id = cells[1].textContent.toLowerCase();
                const ruta_id = cells[2].textContent.toLowerCase();
                const descripcion = cells[3].textContent.toLowerCase();
                const recorrido = cells[4].textContent.toLowerCase();
                const tiempoEstimado = cells[5].textContent.toLowerCase();
                const costo_total = cells[6].textContent.toLowerCase();
                const matches =
                    vehiculo.includes(searchTerm) ||
                    conductor.includes(searchTerm) ||
                    ruta.includes(searchTerm) ||
                    descripcion.includes(searchTerm) ||
                    recorrido.includes(searchTerm) ||
                    tiempoEstimado.includes(searchTerm) ||
                    costo_total.includes(searchTerm);

                row.style.display = matches ? "" : "none";
            } catch (error) {
                console.error("Error procesando fila:", error);
            }
        });
    });
}

// Función para inicializar la confirmación de eliminación
function initializeDeleteConfirmation() {
    const deleteForms = document.querySelectorAll(".delete-form");

    if (!deleteForms.length) {
        console.warn("No se encontraron formularios de eliminación");
        return;
    }

    console.log(`${deleteForms.length} formularios de eliminación encontrados`);

    deleteForms.forEach(function (form, index) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            e.stopPropagation();

            console.log(`Intento de eliminación en formulario #${index}`);

            try {
                // Obtener el nombre de la marca desde la fila
                const row = form.closest("tr");
                if (!row) {
                    console.error("No se encontró la fila padre");
                    return;
                }

                const nombreCell = row.querySelector("td:nth-child(2) span");
                const nombreMarca = nombreCell
                    ? nombreCell.textContent.trim()
                    : "esta marca";

                console.log(`Intentando eliminar: ${nombreMarca}`);

                // Verificar si SweetAlert2 está disponible
                if (typeof Swal === "undefined") {
                    console.error("SweetAlert2 no está cargado");
                    // Usar confirm nativo como fallback
                    if (
                        confirm(
                            `¿Estás seguro de eliminar la marca "${nombreMarca}"?\n\nEsta acción no se puede deshacer.`
                        )
                    ) {
                        console.log(
                            "Confirmación nativa aceptada, enviando formulario"
                        );
                        form.submit();
                    }
                    return;
                }

                // Usar SweetAlert2
                Swal.fire({
                    title: "¿Estás seguro?",
                    html: `¿Deseas eliminar la marca <strong>"${nombreMarca}"</strong>?<br>Esta acción no se puede deshacer.`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText:
                        '<i class="fas fa-trash mr-1"></i> Sí, eliminar',
                    cancelButtonText:
                        '<i class="fas fa-times mr-1"></i> Cancelar',
                    reverseButtons: true,
                    focusCancel: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(
                            "Confirmación aceptada, enviando formulario"
                        );

                        // Mostrar loading
                        Swal.fire({
                            title: "Eliminando...",
                            text: "Por favor espera",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                        });

                        // Enviar el formulario
                        form.submit();
                    } else {
                        console.log("Eliminación cancelada");
                    }
                });
            } catch (error) {
                console.error("Error en confirmación de eliminación:", error);
                // Si hay error, preguntar de todas formas
                if (confirm("¿Estás seguro de eliminar este registro?")) {
                    form.submit();
                }
            }
        });
    });
}

// Función para inicializar animaciones de badges
function initializeBadgeAnimations() {
    const badges = document.querySelectorAll(
        '.badge[style*="cursor: pointer"]'
    );

    console.log(`${badges.length} badges con animación encontrados`);

    badges.forEach(function (badge) {
        badge.addEventListener("click", function () {
            // Agregar animación de pulso
            this.classList.add("pulse-animation");

            setTimeout(() => {
                this.classList.remove("pulse-animation");
            }, 600);
        });
    });
}

// Manejo de errores global para este módulo
window.addEventListener("error", function (e) {
    if (e.filename && e.filename.includes("viajes.js")) {
        console.error("Error en viajes.js:", e.message, e.lineno, e.colno);
    }
});

console.log("Archivo viajes.js completamente cargado");
