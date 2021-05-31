$('.form_lote').submit(function(e){ //form_eliminar clase del formulario despues de hacer click toma el evento e
    e.preventDefault(); //esta linea detiene el envio del formulario

let timerInterval
Swal.fire({
  title: 'Estamos guardando tus datos!',
  html: 'Espera <b></b> segundos.',
  timer: 1000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getHtmlContainer()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
    this.submit(); //envio los datos
  }
}).then((result) => {
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
});