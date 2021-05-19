@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Registro de Funcionario
@endsection
@section('main-content')
<br>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#newedificio"><span class="glyphicon glyphicon-plus"></span> Crear nuevo Edificio</button>
<form method="post"  action="/edificio_create">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="modal fade" id="newedificio" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title text-center">Crear nuevo Edifico</h3>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <div class="col-md-12">
            <label for="new_pass">Nombre</label>
           <div class="input-group">
           	  <span class="input-group-addon"><i class="fa fa-institution"></i></span>
           	  <input type="text" class="form-control" name="edificio" id="edificio" placeholder="Nombre del edificio" required>
            </div>
            <br></br>
            <label for="new_pass">Dirección</label>
            <small class="text-danger"> La información es opcional</small>
            <div class="input-group">
           	  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
           	  <textarea class="form-control" name="direccion" id="direccion" placeholder="Dirección, ésta información es opcional"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Salir</button>
      </div>
    </div>
  </div>
</div>
</form>
<br>
<div class="col-md-14">
	<div class="box box-success">
		<div class="box-header with-border">
      		<i class="fa fa-institution"></i>
      		<h3 class="box-title">Edificios Institucionales</h3>
    	</div> 
		<!-- bgcolor="#00a65a" -->
		<table id="datatable" class="table table-striped table-bordered">
    		<thead>
      			<tr>
        			<th class='text-center'>Edificio</th>
                    <th class='text-center'>Dirección</th>
                    <th class='text-center'>Fecha y hora de creación</th>
                    <th class='text-center'>Opciones
                    </th>
      			</tr>
    		</thead>
			<tbody>
				@foreach($edif as $build)
					<tr class='text-center'>
						<td>{{$build->descripcion}}</td>
                        <td>{{$build->direccion}}</td>
                        <td>{{$build->created_at}}</td>
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                  <form action="edificio_edit/{{$build->id}}" method="post">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button type="submit" class="btn btn-warning btn-xs"data-toggle="modal" data-target="#editedificio">Editar <i class="fa fa-edit"></i></button></form>
                                </div>
                                <div class="col-md-6 text-left">
                                <form id="borra" action="edificio_remove/{{$build->id}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return borrar('borra')" >Borrar <i class="fa fa-trash"></i></button>
                                </form>
                                </div>
                            </div>
                        </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div> 
</div>
<script src="{{ asset('/js/datatables.js') }}" defer></script>
<script src="{{ asset('/js/advertencia.js') }}" defer></script>

@endsection