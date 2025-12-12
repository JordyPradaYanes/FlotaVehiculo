// Empresas - Funcionalidad de búsqueda, confirmación de eliminación y validación
document.addEventListener("DOMContentLoaded", function () {
    console.log("Empresas.js cargado correctamente");

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
        console.warn(
            "Search input o tabla no encontrados - probablemente no estamos en la vista index"
        );
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
                // Verificar que hay suficientes celdas antes de acceder
                if (cells.length < 7) {
                    console.warn("Fila sin suficientes celdas, saltando...");
                    return;
                }

                const id = cells[0].textContent.toLowerCase();
                const nit = cells[1].textContent.toLowerCase(); // NIT agregado
                const nombre = cells[2].textContent.toLowerCase(); // Cambió de nombre_empresa a nombre
                const direccion = cells[3].textContent.toLowerCase();
                const telefono = cells[4].textContent.toLowerCase();
                const email = cells[5].textContent.toLowerCase();
                const registradoPor = cells[6].textContent.toLowerCase();

                const matches =
                    id.includes(searchTerm) ||
                    nit.includes(searchTerm) ||
                    nombre.includes(searchTerm) ||
                    direccion.includes(searchTerm) ||
                    telefono.includes(searchTerm) ||
                    email.includes(searchTerm) ||
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
    if (event.filename.includes("empresas.js")) {
        console.error(
            "Error en empresas.js:",
            event.message,
            "en",
            event.filename,
            "línea",
            event.lineno
        );
    }
});
