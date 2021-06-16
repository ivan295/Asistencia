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
<form method="post" action="/departamento_create">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-14">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i> Datos del Funcionario</h3>
            </div>
            <div class="box-body">
                <div class="row">
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
                        <input type="radio" id="rsi" name="rbox" value="SI">
                        <label for="contactChoice1">Si</label>

                        <input type="radio" id="rno" name="rbox" value="NO">
                        <label for="contactChoice2">No</label>
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
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>
                Guardar</button>

        </div>
    </div>
    </div>
</form>
<script src="{{ asset('/js/select.js') }}" defer></script>
<script src="{{ asset('/js/radio.js') }}" defer></script>

@endsection