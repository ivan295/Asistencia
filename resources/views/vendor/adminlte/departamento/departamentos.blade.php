@extends('adminlte::layouts.app')
@section('htmlheader_title')
Departamento
@endsection
@section('main-content')
<br>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#newdepartment"><span
        class="glyphicon glyphicon-plus"></span> Crear nuevo Departamento</button>
<br>
<div class="col-md-14">
    <div class="box box-success">
        <div class="box-header with-border">
            <i class="fa fa-suitcase"></i>
            <h3 class="box-title">Departamentos</h3>
        </div>
        <!-- bgcolor="#00a65a" -->
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class='text-center'>Departamento</th>
                    <th class='text-center'>Dirección</th>
                    <th class='text-center'>Edificio</th>
                    <th class='text-center'>Ubicación</th>
                    <th class='text-center'>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alldepartment as $depart)
                <tr class='text-center'>
                    <td>{{$depart->descripcion}}</td>
                    <td>{{$depart->direccion_inst}}</td>
                    <td>{{$depart->edificio}}</td>
                    <td>{{$depart->direccion}}</td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                                <form action="departamento_edit/{{$depart->id}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-warning btn-xs" data-toggle="modal"
                                        data-target="#editedificio">Editar <i class="fa fa-edit"></i></button>
                                </form>
                            </div>
                            <div class="col-md-6 text-left">
                                <form action="departamento_remove/{{$depart->id}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return borrar()">Borrar
                                        <i class="fa fa-trash"></i></button>
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

@endsection