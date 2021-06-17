@extends('adminlte::layouts.app')
@section('htmlheader_title')
Dirección IP
@endsection
@section('main-content')

@if(session('equipo')=='ok')
<script src="{{ asset('/js/exito.js') }}" defer></script>
@endif
@if($errors->any())
<script src="{{ asset('/js/error.js') }}" defer></script>
@endif

<br>
<form method="post" action="/equipo_red_create">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-14">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-desktop"></i> Nuevo Equipo</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    <input type="hidden"  name="tipoequipo" value="equipo de red">
                        <label for="new_pass">Dirección IP</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-institution"></i></span>
                            <input type="text" class="form-control" name="ip" id="ip" placeholder="Dirección ip"
                                required maxlength="15" size="15">
                            @error('ip')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Edificio</label>
                        <select class="form-control" id="consult_edificio" onchange="consultar_edificio()">
                            <option value="0">Seleccionar Edificio</option>
                            <?php $build = DB::table('building')->get(); ?>
                            @foreach($build as $buildin)
                            <option value="<?php  echo $buildin->id ; ?>"> <?php echo $buildin->descripcion; ?>
                            </option>
                            @endforeach
                        </select>
                        <input type="hidden" id="id_edificio" name="edificio">
                        @error('edificio')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-6" id="selectdep">
                        
                        <label>Departamento</label>
                        <select class='form-control' id='consult_departamento' name='seldep'>
                            <option>Seleccionar Departamento</option>
                        </select>
                       
                    </div>
                    <div class="col-md-6" id="sel-marca-equipo">

                    </div>
                    <div class="col-md-6">
                        <label for="new_pass">Nombre del equipo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
                            <input type="text" class="form-control" name="nombreequipo" id="nombre-equipo"
                                placeholder="Nombre del equipo">
                            @error('nombre-equipo')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Estado del equipo</label>
                        <select class="form-control" name="selestado">
                            <option value="">Seleccionar Estado del equipo</option>
                            <option value="bueno">Bueno</option>
                            <option value="regular">Regular</option>
                            <option value="obsoleto">Obsoleto</option>
                        </select>
                        @error('sel-estado')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="new_pass">Observación</label>
                        <small class="text-danger"> La información es opcional</small>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <textarea class="form-control" name="observacion" id="observacion"
                                placeholder="Dirección, ésta información es opcional"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>
            Guardar</button>
    </div>
</form>
<!-- --------------------------- modal marca del equipo --------------------------- -->
<form method="post" action="{{ route('marca.store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal fade" id="newmarca" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center">Crear Marca</h3>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-md-12">
                            <label for="new_pass">Nueva Marca</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="marca" id="marca"
                                    placeholder="Nombre de la marca" required>
                            </div>
                            @error('marca')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
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
<!-- -------------------------- fin marca del equipo -------------------- -->


<script src="{{ asset('/js/select.js') }}" defer></script>
<script src="{{ asset('/js/advertencia.js') }}" defer></script>
<script src="{{ asset('/js/sel-newequipo.js') }}" defer></script>

@endsection