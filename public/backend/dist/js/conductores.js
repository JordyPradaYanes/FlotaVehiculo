/**
 * Conductores.js
 * Maneja la funcionalidad de búsqueda en tiempo real para la tabla de conductores
 */

$(document).ready(function() {
    // Función de búsqueda en tiempo real
    $("#searchTable").on("keyup", function() {
        const searchValue = $(this).val().toLowerCase().trim();
        let visibleRows = 0;

        // Filtrar las filas de la tabla
        $("#example1 tbody tr").each(function() {
            // Ignorar la fila de "no results"
            if ($(this).attr('id') === 'no-results-message') {
                return;
            }

            const rowText = $(this).text().toLowerCase();
            const isVisible = rowText.indexOf(searchValue) > -1;

            $(this).toggle(isVisible);

            if (isVisible) {
                visibleRows++;
            }
        });

        // Mostrar mensaje si no hay resultados
        if (visibleRows === 0 && searchValue !== "") {
            if ($("#no-results-message").length === 0) {
                $("#example1 tbody").append(
                    '<tr id="no-results-message">' +
                        '<td colspan="7" class="text-center py-4">' +
                        '<i class="fas fa-search text-muted" style="font-size: 2rem;"></i>' +
                        '<p class="text-muted mt-2 mb-0">No se encontraron resultados para "' +
                        searchValue +
                        '"</p>' +
                        "</td>" +
                    "</tr>"
                );
            } else {
                $("#no-results-message td p").text('No se encontraron resultados para "' + searchValue + '"');
            }
        } else {
            $("#no-results-message").remove();
        }

        // Ocultar/mostrar paginación
        const paginationDiv = $(".card-footer");
        if (searchValue !== "") {
            paginationDiv.hide();
        } else {
            paginationDiv.show();
        }
    });

    // Limpiar búsqueda al hacer clic en la X (si el navegador lo soporta)
    $("#searchTable").on("search", function() {
        if ($(this).val() === "") {
            $("#example1 tbody tr").each(function() {
                if ($(this).attr('id') !== 'no-results-message') {
                    $(this).show();
                }
            });
            $("#no-results-message").remove();
            $(".card-footer").show();
        }
    });

    // Animación suave al mostrar/ocultar filas
    $("#example1 tbody tr").css("transition", "opacity 0.2s ease-in-out");

    // ===== CONFIRMACIÓN DE ELIMINACIÓN =====
    initializeDeleteConfirmation();
});

// Función para inicializar la confirmación de eliminación
function initializeDeleteConfirmation() {
    const deleteForms = document.querySelectorAll('.delete-form');

    if (!deleteForms.length) {
        console.warn('No se encontraron formularios de eliminación');
        return;
    }

    console.log(`${deleteForms.length} formularios de eliminación encontrados`);

    deleteForms.forEach(function(form, index) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            e.stopPropagation();

            console.log(`Intento de eliminación en formulario #${index}`);

            try {
                // Obtener el nombre del conductor desde la fila
                const row = form.closest('tr');
                if (!row) {
                    console.error('No se encontró la fila padre');
                    return;
                }

                const nombreCell = row.querySelector('td:nth-child(2) span');
                const nombreConductor = nombreCell ? nombreCell.textContent.trim() : 'este conductor';

                console.log(`Intentando eliminar: ${nombreConductor}`);

                // Verificar si SweetAlert2 está disponible
                if (typeof Swal === 'undefined') {
                    console.error('SweetAlert2 no está cargado');
                    // Usar confirm nativo como fallback
                    if (confirm(`¿Estás seguro de eliminar al conductor "${nombreConductor}"?\n\nEsta acción no se puede deshacer.`)) {
                        console.log('Confirmación nativa aceptada, enviando formulario');
                        form.submit();
                    }
                    return;
                }

                // Usar SweetAlert2
                Swal.fire({
                    title: '¿Estás seguro?',
                    html: `¿Deseas eliminar al conductor <strong>"${nombreConductor}"</strong>?<br>Esta acción no se puede deshacer.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: '<i class="fas fa-trash mr-1"></i> Sí, eliminar',
                    cancelButtonText: '<i class="fas fa-times mr-1"></i> Cancelar',
                    reverseButtons: true,
                    focusCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log('Confirmación aceptada, enviando formulario');

                        // Mostrar loading
                        Swal.fire({
                            title: 'Eliminando...',
                            text: 'Por favor espera',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // Enviar el formulario
                        form.submit();
                    } else {
                        console.log('Eliminación cancelada');
                    }
                });
            } catch (error) {
                console.error('Error en confirmación de eliminación:', error);
                // Si hay error, preguntar de todas formas
                if (confirm('¿Estás seguro de eliminar este registro?')) {
                    form.submit();
                }
            }
        });
    });
}