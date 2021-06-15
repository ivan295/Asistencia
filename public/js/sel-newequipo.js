$(document).ready(function(){
    
    recargardep();
    // recargaruser();
    $('#consult_edificio').change(function(){
        recargardep();
    });
    $('#consult_departamento').change(function(){
        recargaruser();
    });
})

function recargardep(){
var vard = $('#consult_edificio').val();

$.get('funselect_dep/'+vard+'',function (data){
    
    // $('#selectdep').empty();
    $("#selectdep").append(
        "<label>Departamento</label>\
            <select class='form-control' id='consult_departamento' name='sel-dep'>\
            <option>Seleccionar Departamento</option>\
            </select>"
    );
    $.each(data,function(i,item) {
        debugger
        $("#consult_departamento").append(
        "<option value="+item.id+">"+item.departamento+"</option>"
        );
    });
});
}




$.get('getmarca',function (data){

    $("#sel-marca-equipo").append(
        "<label>Marca del equipo</label>\
        <div class='input-group'>\
            <select class='form-control' id='sel-marca' name='sel-marca'>\
                <option>Seleccionar Marca</option>\
            </select>\
            <span class='input-group-btn'>\
                <button type='button' class='btn btn-info' data-toggle='modal'\
                data-target='#newmarca'><span class='glyphicon glyphicon-plus'></span> add</button>\
        </div>"
    );
    $.each(data,function(i,item) {
        $("#sel-marca").append(
        "<option value="+item.id+">"+item.descripcion+"</option>"
        );
    });
});


$.get('getmodelo',function (data){

    $("#sel-modelo-equipo").append(
        " <label>Modelo del equipo</label>\
        <div class='input-group '>\
            <select class='form-control' id='sel-modelo' name='sel-modelo'>\
                <option >Seleccionar Modelo</option>\
            </select>\
            <span class='input-group-btn'>\
                <button type='button' class='btn btn-info' data-toggle='modal'\
                    data-target='#newmodelo'><span class='glyphicon glyphicon-plus'></span> add</button>\
        </div>"
    );
    $.each(data,function(i,item) {
        $("#sel-modelo").append(
        "<option value="+item.id+">"+item.descripcion+"</option>"
        );
    });
});


$.get('getprocesador',function (data){

    $("#sel-procesador-equipo").append(
        " <label>Procesador</label>\
        <div class='input-group'>\
            <select class='form-control' id='sel-proce' name='sel-procesador'>\
                <option>Seleccionar Procesador</option>\
            </select>\
            <span class='input-group-btn'>\
                <button type='button' class='btn btn-info' data-toggle='modal'\
                    data-target='#newprocesador'><span class='glyphicon glyphicon-plus'></span>\
                    add</button>\
        </div>"
    );
    $.each(data,function(i,item) {
        $("#sel-proce").append(
        "<option value="+item.id+">"+item.nombre+" / "+item.frecuencia+" / "+item.generacion+"</option>"
        );
    });
});


$.get('getram',function (data){

    $("#sel-memoriaRam-equipo").append(
        " <label>Memoria RAM</label>\
        <div class='input-group'>\
        <select class='form-control' id='sel-ram' name='sel-ram'>\
                <option >Seleccionar RAM</option>\
            </select>\
            <span class='input-group-btn'>\
                <button type='button' class='btn btn-info' data-toggle='modal'\
                    data-target='#newram'><span class='glyphicon glyphicon-plus'></span> add</button>\
        </div>"
    );
    $.each(data,function(i,item) {
        $("#sel-ram").append(
        "<option value="+item.id+">"+item.capacidad+" / "+item.tecnologia+" / "+item.velocidad+"</option>"
        );
    });
});


$.get('getso',function (data){

    $("#so-equipo").append(
        "  <label>Sistema Operativo</label>\
        <div class='input-group'>\
            <select class='form-control' id='sel-so' name='sel-so'>\
                <option >Seleccionar Sistema Operativo</option>\
            </select>\
            <span class='input-group-btn'>\
                <button type='button' class='btn btn-info' data-toggle='modal'\
                    data-target='#new-so'><span class='glyphicon glyphicon-plus'></span> add</button>\
        </div>"
    );
    $.each(data,function(i,item) {
        $("#sel-so").append(
        "<option value="+item.id+">"+item.nombre+"</option>"
        );
    });
});

function recargaruser(){
    var varia = $('#consult_departamento').val();
    // varia=1;    

    $.get('getuser/'+varia+'',function (data){
        // $('#responsable').empty();
        $("#responsable").append(
            "<label>Usuario responsable del equipo</label>\
            <select class='form-control' id='selec-responsable' name='sel-responsable'>\
                <option>Seleccionar Responsable</option>\
            </select>"
        );
        $.each(data,function(i,item) {
            $("#selec-responsable").append(
            "<option value="+item.id+">"+item.name+" / "+item.apellido+"</option>"
            );
        });
    });
}