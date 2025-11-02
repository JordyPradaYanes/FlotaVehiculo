// Script para cambiar estado de registros (activo/inactivo)
document.addEventListener("DOMContentLoaded", () => {
  // Manejar clicks en los badges de estado
  document.querySelectorAll(".badge").forEach((badge) => {
    badge.addEventListener("click", function () {
      const row = this.closest("tr")
      const input = row.querySelector(".toggle-class")

      if (input) {
        const id = input.getAttribute("data-id")
        const type = input.getAttribute("data-type")
        const currentState = input.checked

        const Swal = window.Swal // Declare the Swal variable
        Swal.fire({
          title: "¿Cambiar estado?",
          text: currentState ? "¿Desactivar este registro?" : "¿Activar este registro?",
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#6c757d",
          confirmButtonText: "Sí, cambiar",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
            // Cambiar el estado
            cambiarEstado(id, type, currentState, badge, input)
          }
        })
      }
    })
  })

  // También manejar el input oculto por si acaso
  document.querySelectorAll(".toggle-class").forEach((toggle) => {
    toggle.addEventListener("change", function () {
      const id = this.getAttribute("data-id")
      const type = this.getAttribute("data-type")
      const currentState = this.checked
      const badge = this.closest("td").querySelector(".badge")

      const Swal = window.Swal // Declare the Swal variable
      Swal.fire({
        title: "¿Cambiar estado?",
        text: currentState ? "¿Desactivar este registro?" : "¿Activar este registro?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Sí, cambiar",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          cambiarEstado(id, type, currentState, badge, this)
        } else {
          // Revertir el cambio si se cancela
          this.checked = currentState
        }
      })
    })
  })
})

function cambiarEstado(id, type, currentState, badgeElement, inputElement) {
  // Construir la URL según el tipo
  let url = ""
  switch (type) {
    case "marcas":
      url = `/marcas/${id}/cambio-estado`
      break
    case "modelos":
      url = `/modelos/${id}/cambio-estado`
      break
    case "clientes":
      url = `/clientes/${id}/cambio-estado`
      break
    case "conductores":
      url = `/conductores/${id}/cambio-estado`
      break
    default:
      url = `/${type}/${id}/cambio-estado`
  }

  // Mostrar loader si SweetAlert2 está disponible
  const Swal = window.Swal // Declare the Swal variable
  if (typeof Swal !== "undefined") {
    Swal.fire({
      title: "Actualizando...",
      text: "Por favor espera",
      allowOutsideClick: false,
      allowEscapeKey: false,
      didOpen: () => {
        Swal.showLoading()
      },
    })
  }

  // Hacer la petición AJAX
  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
      Accept: "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        // Actualizar el badge
        actualizarBadge(badgeElement, data.nuevo_estado)

        // Actualizar el checkbox
        inputElement.checked = data.nuevo_estado

        // Mostrar mensaje de éxito
        if (typeof Swal !== "undefined") {
          Swal.fire({
            icon: "success",
            title: "¡Éxito!",
            text: data.message || "Estado actualizado correctamente",
            timer: 1500,
            showConfirmButton: false,
          })
        }
      } else {
        throw new Error(data.message || "Error al actualizar el estado")
      }
    })
    .catch((error) => {
      console.error("Error:", error)

      // Revertir el cambio visual
      inputElement.checked = currentState
      actualizarBadge(badgeElement, currentState)

      // Mostrar error
      if (typeof Swal !== "undefined") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: error.message || "No se pudo actualizar el estado",
          confirmButtonText: "Aceptar",
        })
      } else {
        alert("Error: " + (error.message || "No se pudo actualizar el estado"))
      }
    })
}

function actualizarBadge(badgeElement, nuevoEstado) {
  if (nuevoEstado) {
    // Estado activo
    badgeElement.className = "badge badge-success px-3 py-2"
    badgeElement.style.cursor = "pointer"
    badgeElement.title = "Clic para cambiar estado"
    badgeElement.innerHTML = '<i class="fas fa-check-circle mr-1"></i> Activo'
  } else {
    // Estado inactivo
    badgeElement.className = "badge badge-danger px-3 py-2"
    badgeElement.style.cursor = "pointer"
    badgeElement.title = "Clic para cambiar estado"
    badgeElement.innerHTML = '<i class="fas fa-times-circle mr-1"></i> Inactivo'
  }
}
