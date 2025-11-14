// Licencias - funcionalidad de busqueda, confirmacion y validacion
document.addEventListener("DOMContentLoaded", function () {
    console.log("licencias.js cargado correctamente");

    // ===== BÚSQUEDA EN TABLA =====
    initializeSearch();

    // ===== CONFIRMACIÓN DE ELIMINACIÓN =====
    initializeDeleteConfirmation();

    // ===== ANIMACIÓN AL CAMBIAR ESTADO =====
    initializeBadgeAnimations();

    // ===== VALIDACIÓN DEL FORMULARIO CREATE =====
    initializeFormValidation();
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
                if (cells.length < 5) return;
                const id = cells[0].textContent.toLowerCase();
                const numero_licencia = cells[1].textContent.toLowerCase(); // NÚMERO DE LICENCIA agregado
                const tipo_licencia = cells[2].textContent.toLowerCase(); // TIPO DE LICENCIA agregado
                const fecha_expedicion = cells[3].textContent.toLowerCase();
                const fecha_vencimiento = cells[4].textContent.toLowerCase();
                const entidad_emisora = cells[5].textContent.toLowerCase();
                const registradoPor = cells[6].textContent.toLowerCase();
                const matches =
                    id.includes(searchTerm) ||
                    numero_licencia.includes(searchTerm) ||
                    tipo_licencia.includes(searchTerm) ||
                    fecha_expedicion.includes(searchTerm) ||
                    fecha_vencimiento.includes(searchTerm) ||
                    entidad_emisora.includes(searchTerm) ||
                    registradoPor.includes(searchTerm);
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
    deleteForms.forEach(function (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Este registro se eliminará definitivamente",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
            return false;
        });
    });
}

// Función para inicializar animaciones en badges al cambiar estado
function initializeBadgeAnimations() {
    const statusBadges = document.querySelectorAll(".status-badge");
    statusBadges.forEach(function (badge) {
        badge.addEventListener("click", function () {
            badge.classList.add("animate-badge");
            setTimeout(() => {
                badge.classList.remove("animate-badge");
            }, 1000);
        });
    });
}

function initializeFormValidation() {
    const empresaForm = document.getElementById("empresaForm");
    if (!empresaForm) {
        console.warn("Formulario empresaForm no encontrado");
        return;
    }

    empresaForm.addEventListener("submit", function (e) {
        const telefono = document.getElementById("telefono").value;
        const email = document.getElementById("email").value;

        // Validar formato de teléfono (números, espacios, guiones y +)
        const telefonoRegex = /^[\d\s\-\+()]+$/;
        if (!telefonoRegex.test(telefono)) {
            e.preventDefault();
            Swal.fire({
                icon: "error",
                title: "Error en el teléfono",
                text: "El teléfono solo puede contener números, espacios, guiones y el símbolo +",
                confirmButtonColor: "#3085d6",
            });
            return false;
        }

        // Validar formato de email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e.preventDefault();
            Swal.fire({
                icon: "error",
                title: "Error en el email",
                text: "Por favor ingrese un email válido",
                confirmButtonColor: "#3085d6",
            });
            return false;
        }
    });
}

// Manejo de errores en consola
window.addEventListener("error", function (event) {
    if (event.filename.includes("licencias.js")) {
        console.error(
            "Error en licencias.js:",
            event.message,
            "en",
            event.filename,
            "línea",
            event.lineno
        );
    }
});
