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
});