$('.form_marcar').submit(function(e){ //form_marcar clase del formulario despues de hacer click toma el evento e
  e.preventDefault(); //esta linea detiene el envio del formulario

Swal.fire({
    title: 'Deseas Guardar los datos?',
    showDenyButton: true,
    // showCancelButton: true,
    icon: 'warning',
    confirmButtonText: 'Sí, guardar',
    denyButtonText: 'No guardar',
  }).then((result) => {
    if (result.isConfirmed) {

      this.submit();
      // Swal.fire('Guardado con éxito!', '', 'success')
    } else if (result.isDenied) {
      Swal.fire('Los datos no fueron guardados', '', 'info')
    }
  }) 

});