
  $('.form_eliminar').submit(function(e){ //form_eliminar clase del formulario despues de hacer click toma el evento e
    e.preventDefault(); //esta linea detiene el envio del formulario

    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Estás seguro que deseas eliminar ésta información?',
      text: "No podrás recuperar tus datos, una vez eliminados!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, Eliminar!',
      cancelButtonText: 'No, Cancelar!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {

        this.submit(); //despues de mostrar los botones, ejecuto el formulario

      } else if (result.dismiss === Swal.DismissReason.cancel) {
        swalWithBootstrapButtons.fire(
          'Proceso cancelado',
          'Los datos están a salvo',
          'error'
        )
      }
    })
  });