@extends('adminlte::layouts.app')
@section('htmlheader_title')
Departamento
@endsection
@section('main-content')
@if(session('departamento')=='ok')
<script src="{{ asset('/js/exito.js') }}" defer></script>
@endif
@if($errors->any())
<script src="{{ asset('/js/error.js') }}" defer></script>
@endif
<br>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#newdepart"><span class="glyphicon glyphicon-plus"></span> Crear nuevo departamento</button>
<form method="post" action="/departamento_create">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal fade" id="newdepart" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">
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
                                <input type="text" class="form-control" name="departamento" id="departamento"
                                    placeholder="Nombre del departamento" required>
                                @error('departamento')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <br>
                            <label>¿ El departamento pertenece a una Dirección ?</label>
                            <br>
                            <input type="radio" id="rsi" name="rbox" value="si">
                            <label>Si</label>
                            <input type="radio" id="rno" name="rbox" value="no">
                            <label>No</label>
                            @error('rbox')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            <br>
                            <div id="direccio">

                                @error('edificio')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <br>
                            <label>Edificio</label>
                            <select class="form-control" id="consult_edificio" onchange="consultar_edificio()">
                                <option value="0">Seleccionar Edificio</option>
                                <?php $build = DB::table('building')->get(); ?>
                                @foreach($build as $building)
                                <option value="<?php  echo $building->id; ?>"> <?php echo $building->descripcion; ?>
                                </option>
                                @endforeach
                            </select>
                            <input type="hidden" id="id_edificio" name="edificio">
                            @error('edificio')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            <br>
                            <label for="new_pass">Dirección </label>
                            <small class="text-danger"> La información es opcional</small>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <textarea class="form-control" name="direccion_calle" id="direccion_calle"
                                    placeholder="Dirección, ésta información es opcional"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>
                        Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove-sign"></span> Salir</button>
                </div>
            </div>
        </div>
    </div>
</form>
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
<script src="{{ asset('/js/select.js') }}" defer></script>
<script src="{{ asset('/js/radio.js') }}" defer></script>

@endsection