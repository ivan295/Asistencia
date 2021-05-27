@extends('adminlte::layouts.app')
@section('htmlheader_title')
Estado de Registro de Asistencia
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
<form method="post" class="form_marcar" action="/array_check">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-md-14">
    <div class="box box-success">
        <div class="box-header with-border">
            <i class="fa fa-clock-o"></i>
            <h3 class="box-title">Registros de Asistencia </h3>
        </div>
        <button type="submit" class="btn btn-danger"> Aprobar</button>

        <!-- bgcolor="#00a65a" -->
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr><th class='text-center'>Seleccionar</th>
                    <th class='text-center'>Fecha</th>
                    <th class='text-center'>Nombre</th>
                    <th class='text-center'>Apellido</th>
                    <th class='text-center'>Cédula</th>
                </tr>
            </thead>
            <tbody>
                @foreach($query2 as $regist)
                <tr class='text-center'>
                    <td><input type="checkbox" name="marcaciones[]" value="{{$regist->id}}" required></td>
                    <td>{{convertir($regist->fecha)}}</td>
                    <td>{{$regist->nombre}}</td>
                    <td>{{$regist->apellido}}</td>
                    <td>{{$regist->cedula}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<?php
    if (is_array(['marcaciones'])) {
        $selected = '';
        $num_marcaciones = count(['marcaciones']);
        $current = 0;
        foreach (['marcaciones'] as $key => $value) {
            if ($current != $num_marcaciones-1)
                $selected .= $value.', ';
            else
                $selected .= $value.'.';
            $current++;
        }
    }
?>

</form>

<script src="{{ asset('/js/datatables.js') }}" defer></script>
@endsection