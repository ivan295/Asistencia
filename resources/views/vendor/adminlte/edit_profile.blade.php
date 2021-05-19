@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Editar Datos
@endsection
@section('main-content')
<br></br>
<form method="post"  action="/user_profile_update">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-14">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-user"></i> Datos del Funcionario</h3>
			</div>
			<div class="box-body">
				<div class="row">
                @foreach($perfil_edit as $profile)
          			<div class="col-md-6">
          				<label for="nombre">Nombre</label>
          				<div class="input-group">
            				<span class="input-group-addon"><i class="fa  fa-user"></i></span>
            				<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $profile->name; ?>" required>
          				</div>
					</div>
        			<div class="col-md-6">
          				<label for="apellido">Apellido</label>
          				<div class="input-group">
           			 		<span class="input-group-addon"><i class="fa fa-user"></i></span>
           			 		<input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $profile->apellido; ?>" required>
          				</div>
          			</div>
          			<div class="col-md-6">
          				<label for="cedula">Cédula de identidad</label>
          				<div class="input-group">
            				<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
            				<input type="text" class="form-control" name="cedula" id="cedula" value="<?php echo $profile->cedula; ?>" required>
          				</div>
          			</div>
          			<div class="col-md-6">
          				<label for="Usuario">Dirección Domiciliaria</label>
          				<div class="input-group">
            				<span class="input-group-addon"><i class="fa fa-map"></i></span>
            				<input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $profile->direccion; ?>">
          				</div>
          			</div>
					<div class="col-md-6">
          				<div class="form-group">
            				<label>Género</label>
            				<select class="form-control" name="genero" id="genero">                    
              					<option value="<?php echo $profile->sexo; ?>"><?php echo $profile->sexo; ?></option>
              					<option value="Femenino">Femenino</option>
								<option value="Masculino">Masculino</option>
            				</select>
          					</div>
					</div>
					<div class="col-md-6">
                        <div class="form-group">
                            <label>Edificio</label>
                                <select class="form-control"  id="consult_edificio" name="id_edificio"onchange="consultar_edificio()">
                                    <option value="<?php echo $profile->id_edificio; ?>"><?php echo $profile->edificio; ?></option>
                                    <?php $edi = DB::table('building')->get(); ?>
                                    @foreach($edi as $edificio)
                                    <option value="<?php  echo $edificio->id ; ?>"> <?php echo $edificio->descripcion; ?> </option>
                                    @endforeach
                                </select>
                        </div> 
                        <input type="hidden" id="id_edificio" name="edificio">
						@error('edificio')
      					<small class="text-danger">{{$message}}</small>
      					@enderror
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
                            <label>Departamento</label>
                                <select class="form-control"  id="consult_departamento" name="id_departamento"onchange="consultar_departamento()" data-live-search="true">
                                    <option value="<?php echo $profile->id_departamento; ?>"><?php echo $profile->departamento; ?></option>
                                    <?php $dep = DB::table('department')->get(); ?>
                                    @foreach($dep as $departamento)
                                    <option value="<?php  echo $departamento->id ; ?>"> <?php echo $departamento->descripcion; ?> </option>
                                    @endforeach
                                </select>
                        </div>
                        <input type="hidden" id="id_departamento" name="departamento">
						@error('departamento')
      					<small class="text-danger">{{$message}}</small>
      					@enderror
                    </div>
                @endforeach
				</div>
                <br></br>
          		<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>
		    </div>
		<div>
	</div>
</form>
	<!-- <div class="col-md-14">
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
            				<input type="input" class="form-control" name="email" id="email" value="" required>
          				</div>
          			</div>
          			 <div class="col-md-6">
          				<label for="contraseña">Contraseña</label>
          				<div class="input-group">
          					<span class="input-group-addon"><i class="fa fa fa-key"></i></span>
            				<input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña" required>
							@error('password')
      						<small class="text-danger">{{$message}}</small>
      						@enderror
						  </div>
          			</div> 
      			</div>
					<br></br>
          			<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>  
			</div>
		</div>
	</div> -->


<script src="{{ asset('/js/select.js') }}" defer></script>
@endsection