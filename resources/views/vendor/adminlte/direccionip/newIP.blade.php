@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Dirección IP
@endsection
@section('main-content')
<br>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newip"><span class="glyphicon glyphicon-plus"></span> Agregar Nueva Dirección IP</button>
<form method="post"  action="/direccion_ip_create">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="modal fade" id="newip" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title text-center">Agregar Nueva Dirección IP</h3>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <div class="col-md-12">
            <label for="new_pass">Dirección IP</label>
           <div class="input-group">
           	  <span class="input-group-addon"><i class="fa fa-institution"></i></span>
           	  <input type="text" class="form-control" name="ip" id="ip" placeholder="Dirección ip" required maxlength="15" size="15">
                 @error('ip')
      			<small class="text-danger">{{$message}}</small>
      			@enderror
            </div>
            <label>Edificio</label>
                <select class="form-control"  id="consult_edificio" onchange="consultar_edificio()">
                    <option value="0">Seleccionar Edificio</option>
                        <?php $build = DB::table('building')->get(); ?>
                        @foreach($build as $building)
                        <option value="<?php  echo $building->id ; ?>"> <?php echo $building->descripcion; ?> </option>
                        @endforeach
                </select>
                <input type="hidden" id="id_edificio" name="edificio">
				@error('edificio')
      			<small class="text-danger">{{$message}}</small>
      			@enderror
            <br>
            <label for="new_pass">Observación</label>
            <small class="text-danger"> La información es opcional</small>
            <div class="input-group">
           	  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
           	  <textarea class="form-control" name="observacion" id="observacion" placeholder="Dirección, ésta información es opcional"></textarea>
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
      		<i class="fa fa-desktop"></i>
      		<h3 class="box-title">Direcciones IP</h3>
    	</div> 
		<!-- bgcolor="#00a65a" -->
		<table id="datatable" class="table table-striped table-bordered">
    		<thead>
      			<tr>
        			<th class='text-center'>Dirección IP</th>
                    <th class='text-center'>Edificio</th>
                    <th class='text-center'>Observación</th>
                    <th class='text-center'>Opciones</th>
      			</tr>
    		</thead>
			<tbody>
				@foreach($ip as $dataip)
					<tr class='text-center'>
						<td>{{$dataip->ip}}</td>
                        <td>{{$dataip->edificio}}</td>
                        <td>{{$dataip->observacion}}</td>
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                  <form action="" method="post">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button type="submit" class="btn btn-warning btn-xs"data-toggle="modal" data-target="#editedificio">Editar <i class="fa fa-edit"></i></button></form>
                                </div>
                                <div class="col-md-6 text-left">
                                <form action="" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return borrar()" >Borrar <i class="fa fa-trash"></i></button>
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
<script src="{{ asset('/js/select.js') }}" defer></script>
@endsection