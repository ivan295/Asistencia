@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Registro de Asistencia
@endsection
@section('main-content')
<br>
<form method="post"  action="/asistencia_create">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-body">
				<div class="row">
					<div id="cuadro">
					
					<input type="hidden" name="user"value="{{ Auth::user()->id}}">
					
					@error('id_modalidad')
      				<small class="text-danger">Seleccionar Modalidad</small>
      				@enderror
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- tabla para presentar registros -->
<div class="col-md-12">
	<div class="box box-success">
		<div class="box-header with-border">
      		<i class="fa fa-clock-o"></i>
      		<h3 class="box-title">Registros</h3>
      		<div class="box-tools pull-right">
      		</div>
    	</div> 
		<table class="table table-striped table-hover" id="datatable">
    		<thead>
      			<tr>
        			<th class='text-center'>Fecha</th>
        			<th class='text-center'>Hora Ingreso</th>
        			<th class='text-center'>Modalidad Ingreso</th>
        			<th class="text-center">Hora de Descanso</th>
        			<th class="text-center">Modalidad Reanudación</th>
        			<th class="text-center">Hora de Reanudación</th>
        			<th class="text-center">Hora Fin de Jornada</th>
      			</tr>
    		</thead>
			<tbody>
				@foreach($datos as $reloj)
				<tr class='text-center'>
					<td>{{$reloj->fecha}}</td>
					<td>{{$reloj->hora_ingreso}}</td>
					<td>{{$reloj->modalidad_ingreso}}</td>
					<td>{{$reloj->hora_descanso}}</td>
					<td>{{$reloj->id_modalidad_reanudacion}}</td>
					<td>{{$reloj->hora_reanudacion}}</td>
					<td>{{$reloj->hora_salida}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div> 
</div>
<script src="{{ asset('/js/cargar_boton.js') }}" defer></script>
@endsection