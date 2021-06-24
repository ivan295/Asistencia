@extends('adminlte::layouts.app')
@section('htmlheader_title')
Registro de Funcionario
@endsection
@section('main-content')
<br></br>
<!-- tabla para presentar registros -->
<form method="post" action="{{ route('user.store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-14">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i> Datos del Funcionario</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-user"></i></span>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                placeholder="Nombres del funcionario" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="apellido">Apellido</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="apellido" id="apellido"
                                placeholder="Apellidos" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="cedula">Cédula de identidad</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                            <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cédula"
                                required>
                        </div>
                        @error('cedula')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Usuario">Dirección Domiciliaria</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map"></i></span>
                            <input type="text" class="form-control" name="direccion" id="direccion"
                                placeholder="Dirección">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Género</label>
                            <select class="form-control" name="genero" id="genero">
                                <option value="">Seleccionar Género</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-institution"></i> Datos Institucionales</h3>
                </div>
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-6">
                            <label>Tipo de Usuario</label>
                            <select class='form-control' id='seltipo' name='selectipouser'>
                                <option value=''>Seleccionar Tipo de Usuario</option>
                            </select>
                            @error('selectipouser')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6" id="selectedificio">
                            <label>Edificio</label>
                            <select class='form-control' id='seledificio' name='seledificio'>
                                <option value=''>Seleccionar Edificio</option>
                            </select>
                            @error('edificio')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="col-md-6" id="selectdep">
                        
                            @error('departamento')
                            <small class='text-danger'>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6" id="direccio">
                            @error('seldir')
                            <small class='text-danger'>{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
            <div class="col-md-14">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-at"></i> Datos de Cuenta</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="direccion">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email institucional" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="contraseña">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa fa-key"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Contraseña" required>
                                    @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br></br>
                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-save"></span>
                            Guardar</button>
                    </div>
                </div>
            </div>
</form>
<script src="{{ asset('/js/selnewuser.js') }}" defer></script>

@endsection