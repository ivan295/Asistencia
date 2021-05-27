@extends('adminlte::layouts.app')
@section('htmlheader_title')
Cambiar de Estado del Registro de Asistencia
@endsection
@section('main-content')
<?php 
function convertir ($fecha) {
    $fecha = substr($fecha, 0, 10);
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $anio = date('Y', strtotime($fecha));
    $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $nombredia = str_replace($dias_EN, $dias_ES, $dia);
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

    return $nombredia." ".$numeroDia." de ".$nombreMes." del ".$anio;
  }
?>
<br>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="container-fluid spark-screen">
            <div class="box">
                @foreach($edt as $data)
                <div class="user-header bg-blue">
                    <br>
                    <h3 class="profile-username text-center">{{$data->nombre}}</h3>
                    <h4 class="profile-username text-center">{{$data->apellido}}</h4>
                    <h5 class="profile-username text-center">CI: {{$data->cedula}}</h5>
                    <br>
                </div>
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item text-center">
                            <h4><strong>Registro correspondiente al día {{convertir($data->fecha)}}</strong></h4>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-clock-o"></i> Hora de ingreso
                            <p class="pull-right"><b>{{$data->hora_ingreso}}</b></p>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-users"></i> Modalidad de Trabajo
                            <p class="pull-right"><b>{{$data->modalidad_ingreso}}</b></p>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-clock-o "></i> Hora de inicio de Descanso
                            <p class="pull-right"><b>{{$data->hora_descanso}}</b></p>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-clock-o"></i> Hora de Reanudación de jornada
                            <p class="pull-right"><b>{{$data->hora_reanudacion}}</b></p>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-users"></i> Modalidad de Reanudación
                            <p class="pull-right"><b>{{$data->modalidad_reanudacion}}</b></p>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-clock-o"></i> Hora de Finalización de jornanda
                            <p class="pull-right"><b>{{$data->hora_salida}}</b></p>
                        </li>
                    </ul>
                    <div class="text-center">
                        <form method="post" action="/estado_registro_update/{{$data->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-success" name="estado"value="1"><span
                                    class="glyphicon glyphicon-thumbs-up"></span>
                                Aprobar</button>
                            <button type="submit" class="btn btn-danger" name="estado"value="3"><span
                                    class="glyphicon glyphicon-thumbs-down"></span>
                                No Aprobar</button>
                            <a href="{{ url('/estado_registro_view')}}"><button type="button"
                                    class="btn btn-warning"><span class="glyphicon glyphicon-remove-sign"></span>
                                    Salir</button></a>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection