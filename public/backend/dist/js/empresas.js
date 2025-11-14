//marcas - funcionalidad de busqueda y confirmación de eliminación
document.addEventListener('DOMContentLoaded', function() {
    console.log('Empresas.js cargado correctamente');

    // ===== BÚSQUEDA EN TABLA =====
    initializeSearch();

    // ===== CONFIRMACIÓN DE ELIMINACIÓN =====
    initializeDeleteConfirmation();

    // ===== ANIMACIÓN AL CAMBIAR ESTADO =====
    initializeBadgeAnimations();
});

// Función para inicializar la búsqueda
function initializeSearch() {
    const searchInput = document.getElementById('searchTable');
    const table = document.getElementById('example1');
    if (!searchInput || !table) {
        console.warn('Search input o tabla no encontrados');
        return;
    }
    const tbody = table.querySelector('tbody');
    if (!tbody) {
        console.warn('Tbody no encontrado');
        return;
    }
    const rows = Array.from(tbody.querySelectorAll('tr'));
    console.log(`Búsqueda inicializada. ${rows.length} filas encontradas`);
    searchInput.addEventListener('keyup', function(e) {
        const searchTerm = this.value.toLowerCase().trim();
        rows.forEach(function(row) {
            try {
                const cells = row.querySelectorAll('td');
                if (cells.length < 4) return;
                const id = cells[0].textContent.toLowerCase();
                const nombre_empresa = cells[1].textContent.toLowerCase();
                const direccion = cells[2].textContent.toLowerCase();
                const telefono = cells[3].textContent.toLowerCase();
                const email = cells[4].textContent.toLowerCase();
                const registradoPor = cells[5].textContent.toLowerCase();
                const matches = nombre_empresa.includes(searchTerm) || 
                               direccion.includes(searchTerm) || 
                               telefono.includes(searchTerm) ||
                                email.includes(searchTerm) ||
                                registradoPor.includes(searchTerm) ||
                                id.includes(searchTerm);
                row.style.display = matches ? '' : 'none';

            }
            catch (error) {
                console.error('Error procesando fila:', error);
            }
        });
    });
}
// Función para inicializar la confirmación de eliminación
function initializeDeleteConfirmation() {
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Este registro se eliminará definitivamente',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
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
    const statusBadges = document.querySelectorAll('.status-badge');
    statusBadges.forEach(function(badge) {
        badge.addEventListener('click', function() {
            badge.classList.add('animate-badge');
            setTimeout(() => {
                badge.classList.remove('animate-badge');
            }, 1000);
        });
    });
}

// manejo de errores en consola
window.addEventListener('error', function(event) {
    if (event.filename.includes('empresas.js')) {
        console.error('Error en empresas.js:', event.message, 'en', event.filename, 'línea', event.lineno);
    }
});