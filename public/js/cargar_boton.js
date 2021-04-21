$(document).ready(function(){
    cargar();
});

    function cargar(){
      
        $.get('asistencia_boton', function (data) {
            var fecha_hora =new Date();
            var hora = fecha_hora.getHours() + ':' + fecha_hora.getMinutes() + ':' + fecha_hora.getSeconds();
            var fecha = fecha_hora.getDate()+ '/' +(fecha_hora.getMonth()+1)+ '/' +fecha_hora.getFullYear();
            var disable;
            
            
            $.each(data, function(i, item) {
                
                if(item.estado == 'Ingreso'){
                var nestado = 'Inicio de descanso';
                var estado = 'Descanso';
                var btntype ='btn-warning';
                // var disable = 'document.getElementById("modalidad").hidden = true;';
                    
                }else if(item.estado == 'Descanso'){
                var nestado = 'Reanudar jornada';
                var estado = 'Reanudar';
                var btntype ='btn-primary';
                var disable = '';
                
                }else if(item.estado == 'Reanudar'){
                var nestado = 'Finalizar Jornada';
                var estado = 'Finalizado';
                var btntype = 'btn-danger';
                var disable = 'document.getElementById("modalidad").hidden = true;';
                
                }else if(item.estado == 'Finalizado'){
                    var nestado = 'Iniciar Jornada';
                    var estado = 'Ingreso';
                    var btntype = 'btn-success';
                }
                
                $("#cuadro").append(
                "<div class='col-md-3'>\
                <button type='submit' class='btn-lg btn "+btntype+"' id='btnregistro' name='btnregistro' value="+estado+">"+nestado+"</button>\
                <input type='hidden' name='hora' value="+hora+">\
                <input type='hidden' name='fecha' value="+fecha+">\
                <input type='hidden' name='id_reloj' value="+item.id+">\
                </div>"
                ); 
                
            });
            
            if( data.length == 0 ){ 
                var nestado='Iniciar Jornada';
                var estado = 'Ingreso';
                var btntype = 'btn-success';
                $("#cuadro").append(
                    "<div class='col-md-3'>\
                    <button type='submit' class='btn-lg btn "+btntype+"' id='btnregistro' name='btnregistro' value="+estado+">"+nestado+"</button>\
                    <input type='hidden' name='hora' value="+hora+">\
                    <input type='hidden' name='fecha' value="+fecha+">\
                    </div>"
                    );
            }   

        });
        // funcion para llenar el select de modalidad
        $.get('modalidad_show',function (data){
            $("#cuadro").append(
                "<div class='col-md-6' id='combo'>\
                <label>Modalidad de Trabajo</label>\
                <select class='form-control' id='modalidad' name='id_modalidad'>\
                <option>Seleccionar Modaldiad</option>\
                </select>\
                </div>"
            );
            $.each(data,function(i,item) {
                $("#modalidad").append(
                "<option value="+item.id+">"+item.descripcion+"</option>"
                );          
            });

        });
    // fin de funcion cargar
    }


    
