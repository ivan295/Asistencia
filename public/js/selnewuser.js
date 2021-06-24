// --------------- se selecciona el radio de director-------------

// $('#selectedificio').empty();
// $.get('getedificio',function (data){

//     $.each(data,function(i,item) {
//         $("#seledificio").append(
//         "<option value="+item.id+">"+item.descripcion+"</option>"
//         );
//     });
// });
$('#rdirector').click(function(){

   $('#selectdep').remove();
    $.get('getedificio',function (data){

         $.each(data,function(i,item) {
             $("#seledificio").append(
             "<option value="+item.id+">"+item.descripcion+"</option>"
             );
         });
     });

    $('#seledificio').change(function(){
        $('#direccio').empty();

    var varia = $('#seledificio').val();
    $.get('getdied/'+varia+'',function (data){
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
});

// ------------------- fin de radio director----------------------

// --------------- se selecciona el radio de jefe -------------

$('#rjefe').click(function(){

    $('#direccio').remove();

     $('#seledificio').empty();
     $.get('getedificio',function (data){
         $.each(data,function(i,item) {
             $("#seledificio").append(
             "<option value="+item.id+">"+item.descripcion+"</option>"
             );
         });
     });

    $('#seledificio').change(function(){

    $('#selectdep').empty();

    var varia = $('#seledificio').val();

    // $('#selectdep').empty();

    $.get('getdep/'+varia+'',function (data){
        $("#selectdep").append(
            "<label>Departamento</label>\
            <select class='form-control' id='selderp' name='selder'>\
            <option value=''>Seleccionar Departamento</option>\
            </select>"
        );
        $.each(data,function(i,item) {
            $("#selderp").append(
            "<option value="+item.id+">"+item.descripcion+"</option>"
            );
        });
    });
    });
});
// ------------------- fin de radio jefe----------------------