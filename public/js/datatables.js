 
 $('#datatable').DataTable({
	 	responsive:true,
	 	autoWidth:false,
	 	"language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encotraron datos",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de  _MAX_ total records)",
            "search":'Buscar',
            "paginate":{
            	'next':"Siguiente",
            	'previous':"Anterior"
            }
        }
	 });