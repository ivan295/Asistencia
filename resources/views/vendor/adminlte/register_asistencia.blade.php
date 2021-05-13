@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Registro de Asistencia
@endsection
@section('main-content')
<br></br>
<form method="post"  action="/asistencia_create">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-14">
		<div class="box box-success">
			<div class="box-body">
				<div class="row">
					<div class="cuad" id="cuadro">
						<div class='col-md-3 btnregis' id="boton">
						</div>
							<div class='col-md-5 selectmod' id='combo'>
								<br>
								@error('id_modalidad')
      							<small class="text-danger">Se requiere seleccionar Modalidad</small>
      							@enderror
							</div>	
							<div class='col-md-4' >
								<!-- reloj-->
								<div class="contenedor ">
  									<div class="widget">
    									<div class="fecha">
      										<p id="diaSemana" class="diaSemana"></p>
      										<p id="dia" class="dia"></p>
      										<p>de</p>
      										<p id="mes" class="mes"></p>
      										<p>del</p>
      										<p id="anio" class="anio"></p>
    									</div>
    									<div class="reloj">
      										<p id="horas" class="horas"></p>
      										<p>:</p>
      										<p id="minutos" class="minutos"></p>
      										<p>:</p>
      				 						<div class="cajaSegundos">
        										<p id="ampm" class="ampm"></p>
        										<p id="segundos" class="segundos"></p>
      										</div>
    									</div>
  									</div>
								</div>
								<!-- fin de reloj -->
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- tabla para presentar registros -->
<div class="col-md-14">
	<div class="box box-success">
		<div class="box-header with-border">
      		<i class="fa fa-clock-o"></i>
      		<h3 class="box-title">Registros</h3>
    	</div> 
		<!-- bgcolor="#00a65a" -->
		<table id="datatable" class="table table-striped table-bordered">
    		<thead>
      			<tr>
        			<th class='text-center'>Fecha</th>
        			<th class='text-center'>Hora Ingreso</th>
        			<th class='text-center'>Modalidad Ingreso</th>
        			<th class="text-center">Hora de Descanso</th>
					<th class="text-center">Hora de Reanudación</th>
        			<th class="text-center">Modalidad Reanudación</th>
        			<th class="text-center">Hora Fin de Jornada</th>
      			</tr>
    		</thead>
			<tbody>
				@foreach($query as $reloj)
					<tr class='text-center'>
						<td>{{$reloj->fecha}}</td>
						@if($reloj->hora_ingreso > '08:10:00')
							<td><span class="label label-danger pull-right">{{$reloj->hora_ingreso}} Atraso</span></td>
							@elseif($reloj->hora_ingreso <= '08:10:00')
								<td><span class="label label-success pull-right">{{$reloj->hora_ingreso}} A tiempo</span></td>
						@endif
							<td>{{$reloj->modalidad_ingreso}}</td>
						@if($reloj->hora_descanso != '' && $reloj->hora_descanso > '14:00:00')
							<td class='text-center'><span class="label label-danger pull-right">{{$reloj->hora_descanso}} Marcación tardía</span></td>
							@elseif($reloj->hora_descanso != '' && $reloj->hora_descanso <= '12:15:00')
								<td class='text-center'><span class="label label-success pull-right">{{$reloj->hora_descanso}} A tiempo</span></td>
                        @else
                        <td style="hidden"></td>
                        @endif
						@if( $reloj->hora_reanudacion != '' && $reloj->hora_reanudacion > '13:45:00')
							<td><span class="label label-danger pull-right">{{$reloj->hora_reanudacion}} Atraso</span></td>
							@elseif( $reloj->hora_reanudacion != '' && $reloj->hora_reanudacion <= '13:45:00')
								<td><span class="label label-success pull-right">{{$reloj->hora_reanudacion}} A tiempo</span></td>
						@else
                        <td style="hidden"></td>
                        @endif
                        @if($reloj->modalidad_reanudacion != 'Sin registro')
							<td>{{$reloj->modalidad_reanudacion}}</td>
                        @else
                        <td style="hidden"></td>
                        @endif
                        @if( $reloj->hora_salida != '' && $reloj->hora_salida > '16:45:00')
							<td><span class="label label-warning pull-right">{{$reloj->hora_salida}} Marcación tardía</span></td>
							@elseif( $reloj->hora_salida != '' && $reloj->hora_salida <= '16:45:00' )
								<td><span class="label label-success pull-right">{{$reloj->hora_salida}} A tiempo</span></td>
                        @else
                        <td style="hidden"></td>
                        @endif
					</tr>
				@endforeach
			</tbody>
		</table>
	</div> 
</div>
<script src="{{ asset('/js/cargar_boton.js') }}" defer></script>
<script src="{{ asset('/js/reloj.js') }}" defer></script>
<script src="{{ asset('/js/datatables.js') }}" defer></script>
<script src="{{ asset('/js/sweet.js') }}" defer></script> 
@endsection