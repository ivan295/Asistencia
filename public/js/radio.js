// $('#direccio').empty();
// if($("#rsi").attr('checked', true)){
     debugger
    if($('input:radio[name="rbox"]:checked').val() = 'SI'){
        
        debugger
    $.get('getdir',function (data){
        
        $("#direccio").append(
            "<label>Dirección</label>\
            <select class='form-control' id='seldirec' name='sel_dir'>\
            <option value=''>Seleccionar Dirección</option>\
            </select>"
        );
        $.each(data,function(i,item) {
            $("#seldirec").append(
            "<option value="+item.id+">"+item.descripcion+"</option>"
            );          
        });

    });
}
// else if($("#rno").attr('checked', true)){
    else if($('input:radio[name=rbox]:checked').val() = 'NO'){
        debugger
    $('#direccio').empty();

}
