document.addEventListener('DOMContentLoaded', function() {
    console.log('Conductores.js cargado correctamente');
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
                if (cells.length < 5) return;
                const id = cells[0].textContent.toLowerCase();
                const nombre = cells[1].textContent.toLowerCase();
                const apellido = cells[2].textContent.toLowerCase();
                const documento = cells[3].textContent.toLowerCase();
                const fecha_nacimiento = cells[4].textContent.toLowerCase();
                const registradoPor = cells[5].textContent.toLowerCase();
                const matches = nombre.includes(searchTerm) || 
                               apellido.includes(searchTerm) || 
                               documento.includes(searchTerm) ||
                               fecha_nacimiento.includes(searchTerm) ||
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
    }
    );
}

// Manejo global de errores para depuración

window.addEventListener('error', function(event) {
    if (event.filename.includes('conductores.js')) {
        console.error('Error en conductores.js:', event.message, 'en', event.filename, 'línea', event.lineno);
    }
}); 