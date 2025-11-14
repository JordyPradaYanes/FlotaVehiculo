$(document).on('submit', 'form.delete-form', function(e){
    e.preventDefault();
    var form = this;
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Este registro se eliminará definitivamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});
