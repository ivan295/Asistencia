@extends('adminlte::layouts.app')
@section('htmlheader_title')
Dirección IP
@endsection
@section('main-content')

@if(session('ip')=='ok')
<script src="{{ asset('/js/exito.js') }}" defer></script>
@endif
@if($errors->any())
<script src="{{ asset('/js/error.js') }}" defer></script>
@endif

@include('adminlte::alerts.exito')
<br>
<form method="post" action="{{ route('newequipo.store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-14">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-desktop"></i> Nuevo Equipo</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    <input type="hidden"  name="tipoequipo" value="Computador">
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
                    <div class="col-md-6" id="sel-modelo-equipo">

                    </div>
                    <div class="col-md-6" id="sel-procesador-equipo">

                    </div>
                    <div class="col-md-6" id="sel-memoriaRam-equipo">

                    </div>
                    <div class="col-md-6">
                        <label>Almacenamiento</label>
                        <select class="form-control" name="selalmacenamiento">
                            <option value="">Seleccionar Almacenamiento</option>
                            <option value="SDD">Unidad de estado sólido</option>
                            <option value="HDD">Disco Duro</option>
                            <option value="M.2">M.2</option>
                        </select>
                        @error('sel-almacenamiento1')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="new_pass">Espacio de Almacenamiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-institution"></i></span>
                            <input type="text" class="form-control" name="espacioalm" id="espacio-alm"
                                placeholder="Espacio de Almacenamiento">
                            @error('espacio-alm')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6" id="so-equipo">

                    </div>
                    <div class="col-md-6" id="selresponsable">
                        <label>Usuario responsable del equipo</label>
                        <select class='form-control' id='selec-responsable' name='selresponsable'>
                            <option>Seleccionar Responsable</option>
                        </select>
                        @error('sel-responsable')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
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
                        <label for="new_pass">Código CPU</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
                            <input type="text" class="form-control" name="codcpu" id="cod-cpu"
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

<!-- --------------------------- modal modelo del equipo --------------------------- -->
<form method="post" action="{{ route('modelo.store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal fade" id="newmodelo" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center">Crear Modelo</h3>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-md-12">
                            <label for="new_pass">Nuevo Modelo</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="modelo" id="modelo"
                                    placeholder="Nombre del modelo" required>
                            </div>
                            @error('modelo')
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
<!-- -------------------------- fin modelo del equipo -------------------- -->

<!-- --------------------------- modal procesador --------------------------- -->
<form method="post" action="{{ route('procesador.store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal fade" id="newprocesador" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center">Crear Procesador</h3>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-md-12">
                            <label>Nombre del Procesador</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="nameprocesador" id="nameprocesador"
                                    placeholder="Procesador, ejemplo corei3, corei5 " required>
                            </div>
                            @error('nameprocesador')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label>Frecuencia del procesador</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="frecuencia" id="frecuencia"
                                    placeholder="Frecuencia del procesador, ejemplo 3Ghz, 3.2Ghz" required>
                            </div>
                            @error('frecuencia')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label>Generación del procesador</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="generacion" id="generacion"
                                    placeholder="Generación del procesador, ejemplo 10700, " required>
                            </div>
                            @error('generacion')
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
<!-- -------------------------- fin  -------------------- -->

<!-- --------------------------- modal memoria ram --------------------------- -->
<form method="post" action="{{ route('memoria_ram.store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal fade" id="newram" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center">Crear Memoria RAM</h3>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-md-12">
                            <label>Capacidad de la memoria</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="capacidadmemor" id="capacidadmemor"
                                    placeholder="Capacidad de memoria, ejemplo 4GB, 8GB " required>
                            </div>
                            @error('capacidadmemor')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label>Tecnología de la memoria</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="tecnologia" id="tecnologia"
                                    placeholder="Tecnología, ejemplo DDR4, DDR3" required>
                            </div>
                            @error('tecnologia')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label>Velocidad</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="velocidadRAM" id="velocidadRAM"
                                    placeholder="Velocidad de la memoria, ejemplo 3000Ghz, " required>
                            </div>
                            @error('velocidadRAM')
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
<!-- -------------------------- fin  -------------------- -->

<!-- --------------------------- modal crear sistema operativo --------------------------- -->
<form method="post" action="{{ route('sistema_operativo.store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal fade" id="new-so" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center">Crear Sistema Operativo</h3>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-md-12">
                            <label for="new_pass">Nuevo sistema operativo</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="sistemaO" id="sistemaO"
                                    placeholder="Nombre del sistema operativo" required>
                            </div>
                            @error('sistemaO')
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
<!-- -------------------------- fin sistema operativo -------------------- -->


<script src="{{ asset('/js/select.js') }}" defer></script>
<script src="{{ asset('/js/advertencia.js') }}" defer></script>
<script src="{{ asset('/js/sel-newequipo.js') }}" defer></script>

@endsection