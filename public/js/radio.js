        $('#rsi').click(function(){
            $.get('getdir',function (data){
                $("#direccio").append(
                    "<label>Dirección</label>\
                    <select class='form-control' id='seldirec' name='seldir'>\
                    <option value=''>Seleccionar Dirección</option>\
                    </select>"
                );
                $.each(data,function(i,item) {
                    $("#seldirec").append(
                    "<option value="+item.id+">"+item.descripcion+"</option>"
                    );
                });
            });
        });

        $('#rno').click(function(){
            $('#direccio').empty();
        });