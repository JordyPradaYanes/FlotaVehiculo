/**
 * Empresas.js - Funcionalidad para el módulo de empresas
 * Incluye: Buscador en tiempo real
 */

const $ = require("jquery") // Declare the $ variable before using it

$(document).ready(() => {
  // ============================================
  // BUSCADOR EN TIEMPO REAL
  // ============================================
  $("#searchTable").on("keyup", function () {
    const searchValue = $(this).val().toLowerCase().trim()
    let visibleRows = 0

    // Filtrar filas de la tabla
    $("#example1 tbody tr").filter(function () {
      const rowText = $(this).text().toLowerCase()
      const matches = rowText.indexOf(searchValue) > -1

      $(this).toggle(matches)

      if (matches) {
        visibleRows++
      }
    })

    // Mostrar mensaje si no hay resultados
    if (visibleRows === 0 && searchValue !== "") {
      if ($("#no-results-message").length === 0) {
        $("#example1 tbody").append(
          '<tr id="no-results-message">' +
            '<td colspan="8" class="text-center py-4">' +
            '<i class="fas fa-search fa-3x text-muted mb-3"></i>' +
            '<p class="text-muted mb-0">No se encontraron resultados para "' +
            searchValue +
            '"</p>' +
            "</td>" +
            "</tr>",
        )
      }
    } else {
      $("#no-results-message").remove()
    }
  })

  // ============================================
  // ANIMACIÓN DE ENTRADA PARA LAS FILAS
  // ============================================
  $("#example1 tbody tr").each(function (index) {
    $(this).css({
      animation: "fadeInUp 0.5s ease-out " + index * 0.05 + "s both",
    })
  })

  // ============================================
  // TOOLTIP PARA BOTONES
  // ============================================
  $("[title]").tooltip()

  // ============================================
  // HIGHLIGHT EN HOVER DE FILAS
  // ============================================
  $("#example1 tbody tr").hover(
    function () {
      $(this).addClass("table-active")
    },
    function () {
      $(this).removeClass("table-active")
    },
  )

  // ============================================
  // LIMPIAR BÚSQUEDA
  // ============================================
  $("#searchTable").on("search", function () {
    if ($(this).val() === "") {
      $("#example1 tbody tr").show()
      $("#no-results-message").remove()
    }
  })
})
