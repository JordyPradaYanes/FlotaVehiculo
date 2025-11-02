import $ from "jquery"
import Swal from "sweetalert2"

$(document).ready(() => {
  // Interceptar el submit de formularios con clase delete-form
  $(document).on("submit", ".delete-form", function (e) {
    e.preventDefault()

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
        // Enviar el formulario usando el método nativo
        this.submit()
      }
    })

    return false // Asegurar que no se envíe el formulario
  })
})
