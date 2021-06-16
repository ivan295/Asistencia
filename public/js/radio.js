// $('#direccio').empty();

// if($("#rsi").attr('checked', true)){
     debugger
// if($('input[name="rbox"]:checked').val() == "si"){
        debugger


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
    
// } 



// else if($("#rno").attr('checked', true)){
//     else if($('input[name=rbox]:checked').val() == "no"){
//         debugger
//     $('#direccio').empty();

// }
