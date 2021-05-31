@extends('adminlte::layouts.app')
@section('htmlheader_title')
Editar dirección IP
@endsection
@section('main-content')
@if(session('ip')=='ok')
<script src="{{ asset('/js/exito.js') }}" defer></script>
@endif
@if($errors->any())
<script src="{{ asset('/js/error.js') }}" defer></script>
@endif
<br>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="container-fluid spark-screen">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i> Editar Dirección IP</h3>
                </div>
                @foreach($edtip as $ipedt)
                <form method="POST" action="{{ route('direccion_ip.update',$ipedt->id) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="col-md-12">
                            <label for="new_pass">Dirección IP</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-institution"></i></span>
                                <input type="text" class="form-control" name="ip" id="ip"
                                    value="<?php echo $ipedt->ip?>">
                                @error('ip')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <label>Edificio</label>
                            <select class="form-control" id="consult_edificio" onchange="consultar_edificio()">
                                <option  value="" selected>Seleccionar Edificio</option>
                                <?php $build = DB::table('building')->get(); ?>
                                @foreach($build as $building)
                                <option value="<?php  echo $building->id ; ?>">
                                    <?php echo $building->descripcion; ?>
                                </option>
                                @endforeach
                            </select>
                            <input type="hidden" id="id_edificio" name="edificio">
                            @error('edificio')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            <label>Departamento</label>
                            <select class="form-control" id="consult_departamento" onchange="consultar_departamento()"
                                data-live-search="true">
                                <option value="" selected>Seleccionar Departamento
                                </option>
                                <?php $dep = DB::table('department')->get(); ?>
                                @foreach($dep as $departamento)
                                <option value="<?php  echo $departamento->id ;?>" >
                                    <?php echo $departamento->descripcion; ?> </option>
                                @endforeach
                            </select>
                            <input type="hidden" id="id_departamento" name="departamento">
                            @error('departamento')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            <br>
                            <label for="new_pass">Observación</label>
                            <small class="text-danger"> La información es opcional</small>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <textarea class="form-control" name="observacion"
                                    id="observacion"><?php echo $ipedt->observacion?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>
                        Guardar</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/select.js') }}" defer></script>
@endsection