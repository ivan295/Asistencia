	$(document).ready(function(){
		recargarlista();
		$('#consult_edificio').change(function(){
			recargarlista();
		});
	})

	function recargarlista(){


        var vard = $('#consult_edificio').val();
        $.get('funselect_dep/'+vard+'',function (data){

            $('#selectdep').empty() 
            $("#selectdep").append(
                "<div class='form-group'>\
                <label>Departamento</label>\
                <select class='form-control' id='consult_departamento' onchange='consultar_departamento()'>\
                <option>Seleccionar Departamento</option>\
                </select>\
                </div>\
                <input type='hidden' id='id_departamento' name='departamento'>"
            );
            // $('#dep option').remove();
            $.each(data,function(i,item) {
                $("#consult_departamento").append(
                "<option value="+item.id+">"+item.departamento+"</option>"
                );   
                       
            });
        });
        // var vard = $('#consult_edificio').val();
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

		// $.ajax({
		// 	type:"POST",
		// 	url: './funselect_dep',
        //     dataType: 'json',
		// 	data:{vard},
			
		// });
        
	}



    