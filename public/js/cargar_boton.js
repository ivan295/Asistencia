$(document).ready(function(){
    cargar();
});

    function cargar(){
      
        $.get('asistencia_boton', function (data) {
                  
            $.each(data, function(i, item) {
                
                if(item.estado == 'Ingreso'){
                var nestado = 'Inicio de descanso';
                var estado = 'Descanso';
                var btntype ='btn-warning';
                document.getElementById("combo").hidden = true;
                }else if(item.estado == 'Descanso'){
                    
                var nestado = 'Reanudar jornada';
                var estado = 'Reanudar';
                var btntype ='btn-primary';

                }else if(item.estado == 'Reanudar'){
                var nestado = 'Finalizar Jornada';
                var estado = 'Finalizado';
                var btntype = 'btn-danger';
                document.getElementById("combo").hidden = true;

                }else if(item.estado == 'Finalizado'){
                    document.getElementById("boton").hidden = true;
                    document.getElementById("combo").hidden = true;
                }
                $("#boton").append(
                "<button type='submit' class='btn-lg btn "+btntype+"' id='btnregistro' name='btnregistro'>"+nestado+"   <i class='fa  fa-hourglass-3'></i></button>\
                <input type='hidden' name='btnregistro' value="+estado+">\
                <input type='hidden' name='id_reloj' value="+item.id+">"
                ); 
                
            });
            
            if( data.length == 0 ){ 
                var nestado='Iniciar Jornada';
                var estado = 'Ingreso';
                var btntype = 'btn-success';
                $("#boton").append(
                "<button type='submit' class='btn-lg btn "+btntype+"' id='btnregistro' name='btnregistro'>"+nestado+"  <i class='fa  fa-hourglass-3'></i></button>\
                <input type='hidden' name='btnregistro' value="+estado+">\
                "
                );
            }   

        });
        // funcion para llenar el select de modalidad
        $.get('modalidad_show',function (data){
            $("#combo").append(
                "<select class='form-control' id='modalidad' name='id_modalidad'>\
                <option>Seleccionar Modaldiad</option>\
                </select>"
            );
            $.each(data,function(i,item) {
                $("#modalidad").append(
                "<option value="+item.id+">"+item.descripcion+"</option>"
                );          
            });

        });
    // fin de funcion cargar
    }



    
    function alerta(){
        Swal.fire({
            title: 'Deseas Guardar los datos?',
            showDenyButton: true,
            // showCancelButton: true,
            confirmButtonText: 'Sí, guardar',
            denyButtonText: 'No guardar',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              Swal.fire('Guardado con éxito!', '', 'success')
            } else if (result.isDenied) {
              Swal.fire('Los datos no fueron guardados', '', 'info')
            }
          })
        }